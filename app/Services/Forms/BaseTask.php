<?php


namespace App\Services\Forms;


use App\Services\Application;
use App\Services\Constant;
use Closure;
use DateTime;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use ReflectionObject;

/**
 * Class BaseTask
 * @package App\Services\Forms
 *
 * @property $namespace string
 * @property $status int
 */
abstract class BaseTask
{
    const STATUS_NOT_STARTED = 0;
    const STATUS_IN_PROGRESS = 1;
    const STATUS_COMPLETED = 2;
    const STATUS_CANNOT_START = 4;

    abstract protected function setPages();

    /**
     * @var null
     */
    protected $_id = null;

    /**
     * @var array
     */
    protected $_pages = [];

    /**
     * @var bool
     */
    protected $_hasSummary = true;

    /**
     * @var string
     */
    protected string $name = '';

    /**
     * @var string
     */
    private string $_namespace;

    /**
     * List of tasks that must be complete before this task can be accessed
     * @var array
     */
    protected array $_requiredTasks = [];

    /**
     * BaseTask constructor.
     */
    public function __construct($namespace)
    {
        $this->_namespace = $namespace . '/' . $this->getId();
        $this->setPages();
        $this->cleanPages();

//        echo($this->_namespace  . '<br>');

        if (method_exists($this, 'initStack')) {
            $this->initStack();
        }
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getId()
    {
        if (isset($this->_id))
            return $this->_id;

        $path = explode('\\', get_called_class());
        return Str::kebab(end($path));
    }

    /**
     * @param $pageName
     * @return int|string
     */
    public function getPageIndex($pageName)
    {
        foreach ($this->pages as $index => $page) {
            if (isset($page['page'])) {
                if (is_object($page['page'])) {
                    if ($page['page']->getId() == $pageName) {
                        return $index;
                    }
                }
            }
        }

        return array_key_first($this->pages);
    }

    /**
     * @param $fromIndex
     */
    public function nextPage($fromIndex)
    {
        if (is_string($fromIndex) || is_int($fromIndex)) {
            if (key_exists($fromIndex, $this->pages)) {
                if ($this->pages[$fromIndex]) {
                    $nextPage = $this->pages[$fromIndex]['next'] ?? null;

                    if ($nextPage instanceof Closure) {
                        $nextPage = $nextPage();
                        if (!is_null($nextPage)) {
                            return $this->pages[$nextPage];
                        }
                    }

                    if (isset($nextPage)) {
                        return $this->pages[$nextPage];
                    }

                    if ($nextPage === BasePage::SUMMARY_PAGE) {
                        return BasePage::SUMMARY_PAGE;
                    }
                }
            }
        }

        return null;
    }

    /**
     * @param $fromIndex
     */
    public function nextPageIndex($fromIndex)
    {
        if (is_string($fromIndex) || is_int($fromIndex)) {
            if (key_exists($fromIndex, $this->pages)) {
                if ($this->pages[$fromIndex]) {
                    $nextPage = $this->pages[$fromIndex]['next'] ?? null;

                    if ($nextPage instanceof Closure) {
                        $nextPage = $nextPage();
                    }

                    if (isset($nextPage)) {
                        return $nextPage;
                    }

                    if ($nextPage === BasePage::SUMMARY_PAGE) {
                        return BasePage::SUMMARY_PAGE;
                    }
                }
            }
        }

        return null;
    }

    /**
     * @return int
     */
    protected function getStatus()
    {
        $this->setPages();
        $requiredFields = 0;
        $completedRequiredFields = 0;
        $completedFields = 0;
        $completedSections = 0;
        $pages = $this->pages;

        if (count($this->_requiredTasks) > 0) {
            foreach ($this->_requiredTasks as $blockingTask) {
                $task = Application::getInstance()->getTaskByClassName($blockingTask);
                if ($task->getStatus() != self::STATUS_COMPLETED) {
                    return self::STATUS_CANNOT_START;
                }
            }
        }

        if ($this->isStackable()) {
            $pages = [];

            if ($skip = session('skip_stack', false)) {
                if (in_array($this->_namespace, $skip)) {
                    return self::STATUS_COMPLETED;
                }
            }

            if (sizeof($this->stack) === 0) {
                if ($this->_namespace === '/other-medical-treatment') {
                    if (session('/treatment-status/treatment-status', Constant::NO) === Constant::YES) {
                        return self::STATUS_COMPLETED;
                    }
                }

                return self::STATUS_NOT_STARTED;
            } else {
                foreach ($this->stack as $stackID => $stackItem) {
                    Application::getInstance()->trackStackId($stackID);

                    if (!empty($stackItem)) {
                        $pageIndex = 0;
                        do {
                            $page = $this->pages[$pageIndex];
                            $questions = $page['page']->questions;

                            if (sizeof($questions) > 0) {

                                foreach ($questions as $question) {
                                    $options = $question['options'];
                                    $field = $options['field'];
                                    $validation = is_array($options['validation'] ?? []) ?
                                        $options['validation'] ?? [] :
                                        explode('|', $options['validation'] ?? '');
                                    $isRequired = in_array('required', $validation);


//                                    if ($this->_namespace === '/other-medical-treatment') {
//                                        dd($this->isStackable(), $this->stack, $questions, $stackItem, $field);
//                                    }
                                    if ($isRequired) {


                                        $value = $stackItem[$field] ?? null;
                                        if (is_null($value)) {
                                            if ($pageIndex === 0) {
//                                                if ($this->_namespace === '/other-medical-treatment') {
//                                                    dd(__LINE__, $validation, $questions, $stackItem, $stackID, $this->stack);
//                                                }

                                                if ($this->_namespace !== '/other-medical-treatment') {
                                                    return self::STATUS_NOT_STARTED;
                                                } elseif ($field == '/treatment-status/treatment-status' && session($field) === Constant::NO) {
                                                    return self::STATUS_COMPLETED;
                                                }
                                            } else {
                                                return self::STATUS_IN_PROGRESS;
                                            }
                                        }
                                    }
                                }
                            }


                            $pageIndex = $this->nextPageIndex($pageIndex);
                        } while (!is_null($pageIndex));
                    } else {
                        unset($this->_stack[$stackID]);
                    }
                }
            }
        } else {
            if (sizeof($pages) === 0) {
                return self::STATUS_CANNOT_START;
            }

            $pageIndex = 0;
            $hasProvidedAnswers = false;

            do {
                $page = $this->pages[$pageIndex];

                $questions = $page['page']->questions;

                if (sizeof($questions) > 0) {
                    foreach ($questions as $question) {
                        $options = $question['options'];
                        $field = $options['field'];
                        $validation = is_array($options['validation'] ?? []) ?
                            $options['validation'] ?? [] :
                            explode('|', $options['validation'] ?? '');
                        $isRequired = in_array('required', $validation);

                        if ($isRequired) {
                            $value = session($field, null);
                            if (is_null($value)) {
                                if ($pageIndex === 0) {
                                    return self::STATUS_NOT_STARTED;
                                } else {
                                    if ($hasProvidedAnswers) {
                                        return self::STATUS_IN_PROGRESS;
                                    } else {
                                        return self::STATUS_NOT_STARTED;
                                    }
                                }
                            } else {
                                $hasProvidedAnswers = true;
                            }
                        }
                    }
                }

                $pageIndex = $this->nextPageIndex($pageIndex);
            } while (!is_null($pageIndex));
        }

        return self::STATUS_COMPLETED;
    }

    /**
     * @return array
     */
    protected function getResponses()
    {
        $this->setPages();

        if ($this->isStackable()) {
            Application::getInstance()->trackStackId;
        }

        $responses = [];
        foreach ($this->pages as $page) {
            $page = $page['page'] ?? [];

            foreach ($page->questions ?? [] as $question) {
                $component = $question['component'];
                $options = $question['options'];
                $field = $options['field'];

                if ($this->isStackable()) {
                    $answers = $this->getStackBranch(request('stack', Application::getInstance()->trackStackId));
                    if (array_key_exists($field, $answers)) {
                        $response = $answers[$field];
                    } else {
                        $response = null;
                    }
                } else {
                    $response = session($field, null);
                }

                if (!is_null($response)) {
                    if ($component !== 'hidden-field') {
                        if ($component == 'date-field') {
                            $response = Application::getInstance()->formatDateResponse($response);
                        }

                        $group = Application::getInstance()->getGroupFromField($field);
                        $task = Application::getInstance()->getTaskFromField($field);
                        $page = Application::getInstance()->getPageFromField($field);

                        try {
                            array_push($responses, [
                                'label' => $options['label'] ?? '',
                                'value' => $response,
                                'change' => $options['label'] ?? '',
                                'route' => route('update.form', [
                                    'group' => $group->getId(),
                                    'task' => $task->getId(),
                                    'page' => $page->getId(),
                                    'question' => $question['options']['field'],
                                    'stack' => Application::getInstance()->trackStackId ?? '',
                                ])
                            ]);

                        } catch (Exception $e) {
                            dd(__LINE__, $e->getMessage());

                            dd([
                                'group' => $group->namespace,
                                'task' => $task->namespace,
                                'page' => $page->namespace,
                                'question' => $question['options']['field'],
                                'stack' => Application::getInstance()->trackStackId,
                            ]);
                        }
                    }
                }
            }
        }

        return $responses;
    }

    /**
     * @return BaseGroup
     */
    public function getGroup()
    {
        $group = (new ReflectionObject($this))->getNamespaceName();
        // dd(__LINE__ , $group, Application::getInstance()->getGroupByNamespace($group));
        return 'thing';
        return Application::getInstance()->getGroupByNamespace($group);
    }

    /**
     * @return bool
     */
    public function isStackable()
    {
        $usesStackable = key_exists('App\Services\Traits\Stackable', class_uses($this));

        if ($usesStackable) {
            if (is_null($this->_stackTriggerPage) || !array_key_exists($this->_stackTriggerPage, $this->_pages)) {
                return true;
            }

            $field = $this->_pages[$this->_stackTriggerPage]['page']
                ->questions[$this->_stackTriggerQuestion]['options']['field'];

            return (session($field, null) == $this->_stackTriggerAnswer);
        }

        return false;
    }


    private function cleanPages()
    {
        $usesStackable = key_exists('App\Services\Traits\Stackable', class_uses($this));

        if ($usesStackable && !is_null($this->_stackTriggerPage)) {
            $field = $this->_pages[$this->_stackTriggerPage]['page']
                ->questions[$this->_stackTriggerQuestion]['options']['field'];

            if (session($field, null) == $this->_stackTriggerAnswer) {
                array_shift($this->_pages);
            }
        }
    }

    /**
     * @param $value
     * @return string|array
     */
    public function __get($value)
    {
        switch ($value) {
            case 'status':
                return $this->getStatus();
            case 'responses';
                return $this->getResponses();
            case 'preTask';
                return $this->_preTask;
            case 'pages':
                return $this->_pages;
            case 'name':
                return $this->name ?? get_class($this);
            default:
                if (property_exists($this, '_' . $value)) {
                    $value = '_' . $value;
                    return $this->$value;
                }
        }
    }
}
