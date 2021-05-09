<?php


namespace App\Services\Forms;


use App\Services\Application;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

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
    protected $hasSummary = false;

    /**
     * @var string
     */
    protected string $name = '';

    /**
     * @var string
     */
    private $_namespace;

    /**
     * BaseTask constructor.
     */
    public function __construct($namespace)
    {
        $this->_namespace = $namespace . '/' . $this->getId();
        $this->setPages();

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
                if ($page['page']->getId() == $pageName) {
                    return $index;
                }
            }
        }

        return 0;
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

                    if ($nextPage instanceof \Closure) {
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

                    if ($nextPage instanceof \Closure) {
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


        if ($this->isStackable()) {
            $pages = [];
        } else {
            if (sizeof($pages) === 0) {
                return self::STATUS_CANNOT_START;
            }

            $pageIndex = 0;
            do {
                $page = $this->pages[$pageIndex];
                $questions = $page['page']->questions;

                if (sizeof($questions) > 0) {
                    foreach ($questions as $question) {
                        $options = $question['options'];
                        $field = $options['field'];
                        $validation = explode('|', $options['validation'] ?? '');
                        $isRequired = in_array('required', $validation);

                        if ($isRequired) {
                            $value = session($field, null);
                            if (is_null($value)) {
                                if ($pageIndex === 0) {
                                    return self::STATUS_NOT_STARTED;
                                } else {
                                    return self::STATUS_IN_PROGRESS;
                                }
                            }
                        }
                    }
                }

                $pageIndex = $this->nextPageIndex($pageIndex);
            } while (!is_null($pageIndex));
        }

        return self::STATUS_COMPLETED;

//        foreach ($pages as $page) {
//            $page = $page['page'] ?? [];
//            foreach ($page->questions ?? [] as $question) {
//                $options = $question['options'];
//                $field = $options['field'];
//                $validation = $options['validation'] ?? [];
//                $isRequired = false;
//
//                if (is_string($validation)) $validation = array_flip(explode('|', $validation));
//
//                if (key_exists('required', $validation)) {
//                    $requiredFields++;
//                    $isRequired = true;
//                }
//
//                if (!is_null(session($field, null))) {
//                    $completedFields++;
//
//                    if ($isRequired) {
//                        $completedRequiredFields++;
//                    }
//                }
//            }
//        }
//
//        if ($completedRequiredFields > 0) {
//            if ($completedRequiredFields === $requiredFields) {
//                return self::STATUS_COMPLETED;
//            } else {
//                return self::STATUS_IN_PROGRESS;
//            }
//        }
//
//        if ($completedFields > 0) {
//            return self::STATUS_IN_PROGRESS;
//        }
//
//        return self::STATUS_NOT_STARTED;
    }

    protected function getResponses()
    {
        $this->setPages();

        $responses = [];
        foreach ($this->pages as $page) {
            $page = $page['page'] ?? [];

            foreach ($page->questions ?? [] as $question) {
                $component = $question['component'];
                $options = $question['options'];
                $field = $options['field'];

                $response = session($field, null);
                if (!is_null($response)) {
                    if ($component == 'date-field') {
                        $response = Carbon::createFromFormat('Y-m-d', $response)->format('j F Y');
                    }

                    list($form, $group, $task, $page, $field) = explode('/', $field);
                    array_push($responses, [
                        'label' => $options['label'],
                        'value' => $response,
                        'change' => $options['label'],
                        'route' => route('update.form', [
                            'group' => $group,
                            'task' => $task,
                            'page' => $page,
                            'question' => $question['options']['field']
                        ])
                    ]);
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
        $group = (new \ReflectionObject($this))->getNamespaceName();
        Application::getInstance()->form->getGroupByNameSpace($group);
    }

    /**
     * @return bool
     */
    public function isStackable()
    {
        return key_exists('App\Services\Traits\Stackable', class_uses($this));
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
            default:
                if (property_exists($this, '_' . $value)) {
                    $value = '_' . $value;
                    return $this->$value;
                }
        }
    }
}
