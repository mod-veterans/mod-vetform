<?php


namespace App\Services;


use App\Services\Forms\BaseGroup;
use App\Services\Forms\BasePage;
use App\Services\Forms\BaseTask;
use DateTime;
use Exception;
use Illuminate\Http\Client\HttpClientException;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Class Application
 * @package App\Services
 *
 * @property $form BaseForm
 */
class Application
{
    /**
     * @var Application
     */
    private static $instance = null;

    /**
     * @var Application
     */
    private $_form;

    /**
     * @var string
     */
    private $_trackStackId;

    /**
     * Application constructor.
     * @throws HttpClientException
     */
    private function __construct()
    {
        $class = session('form', null);

        if (!is_null($class)) {
            $this->_form = new $class;
        } else {
            throw new HttpClientException('No form selected', 419);
        }
    }

    /**
     * @return Application|null
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Application();
        }

        return self::$instance;
    }

    /**
     * @return string
     */
    public function getReference()
    {
        $formName = session('form');
        $formParts = explode('\\', $formName);

        $reference = 'WPS/' . strtoupper(end($formParts)) . '/' . time();
        session(['application-reference' => $reference]);
        return 'WPS/' . strtoupper(end($formParts)) . '/' . time();
    }

    /**
     * @param $stackId
     */
    public function trackStackId($stackId)
    {
        $this->_trackStackId = $stackId;
    }

    /**
     * @return string|null
     */
    public function getTrackStackId()
    {
        return $this->_trackStackId ?? null;
    }

    /**
     * return array
     */
    public function collateResponses()
    {
        $responses = [];
        $groups = $this->_form->groups();

        foreach ($groups as $group) {
            foreach ($group->tasks as $task) {
                foreach ($task->pages as $page) {
                    $page = $page['page'];
                    $questions = $page->questions ?? [];

                    try {
                        if (!$task->isStackable()) {
                            foreach ($questions as $question) {
                                if ($question['component'] !== 'hidden-field') {
                                    $reply = session($question['options']['field'], null);
                                    $label = $question['options']['label'] ?? '';
                                    $component = $question['component'];

                                    if ($component !== 'hidden-field') {
                                        if (session($question['options']['field'], null)) {
                                            if ($component == 'date-field') {
                                                $reply = $this->formatDateResponse($reply);
                                            }

                                            if ($component !== 'file-upload') {
                                                if ($component === 'checkbox-group') {
                                                    $responses[$task->name][$page->name][$label] = join(', ', $reply);
                                                } else {
                                                    if (sizeof($questions) === 1) {
                                                        $responses[$task->name][$page->name] = $reply;
                                                    } else {
                                                        $responses[$task->name][$page->name][$label] = $reply;
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        } else {
                            if (sizeof($task->stack) > 0) {
                                foreach ($task->stack as $stackId => $stackItem) {
                                    $mnemonic = $task->renderMnemonic($stackItem);
                                    $mnemonic .= ' ' . $stackId;

                                    foreach ($stackItem as $fieldname => $response) {
                                        $question = $this->getQuestionByFieldname($fieldname);
                                        $label = $question['options']['label'] ?? 'PIFFLE';
                                        $component = $question['component'];

                                        if ($component === 'fileUpload') {
                                            $responses[$task->name][$page->name][] = Storage::url('uploads/' . $response['filename']);
                                        } else {
                                            if ($component == 'date-field') {
                                                $response = $this->formatDateResponse($response);
                                            }

                                            if ($component != 'hidden-field') {
                                                $responses[$task->name][$mnemonic][$label] = (is_array($response)) ? join(', ', $response) : $response;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    } catch (Exception $e) {
                        dd(__FILE__, $task, $page, $e);
                    }
                }
            }
        }

        return $responses;
    }

    /**
     * @return array
     */
    public function collateFileUploads()
    {
        $responses = [];

        /** @var BaseTask $task */
        foreach ($this->_form->tasks as $task) {

            /** @var BasePage $page */
            foreach ($task->pages as $page) {

                $page = $page['page'];

                foreach ($page->questions as $question) {

                    if ($question['component'] == 'file-upload') {
                        array_push($responses, $question['options']['label'] . ': ' . session($question['options']['field']));
                    }

                }

            }
        }

        return $responses;
    }

    /**
     * @param $namespaces
     * @return BaseTask|null
     */
    public function getGroupByNamespace($namespace)
    {
        $names = [];

        foreach ($this->_form->groups() as $group) {
            array_push($names, $group->namespace);
        }

        return null;
    }

    /**
     * Pass the namespace for a task and get the Group it belongs to
     * @param $namespace
     * @return BaseGroup|null
     */
    public function getGroupForTaskByNamespace($namespace)
    {
        foreach ($this->_form->groups() as $group) {
            foreach ($group->tasks as $task) {
                if ($task->namespace == $namespace) {
                    return $group;
                }
            }
        }

        return null;
    }

    /**
     * Pass the namespace for a task and get the Group it belongs to
     * @param $namespace
     * @return BaseGroup|null
     */
    public function getGroupForPageByNamespace($namespace)
    {
        $task = $this->getTaskForPageByNamespace($namespace);

        if ($task) {
            return $this->getGroupForTaskByNamespace($task->namespace);
        }

        return null;
    }

    /**
     * @param $namespaces
     * @return BaseTask|null
     */
    public function getTaskByNamespace($namespace)
    {
        foreach ($this->_form->groups() as $group) {
            foreach ($group->tasks as $task) {
                if ($task->namespace == $namespace) {
                    return $task;
                }
            }
        }

        return null;
    }

    /**
     * @param $fieldname
     * @return mixed
     */
    public function getQuestionByFieldname($fieldname)
    {
        foreach ($this->_form->groups() as $group) {
            foreach ($group->tasks as $task) {
                foreach ($task->pages as $page) {

                    if (is_object($page['page'])) {
                        foreach ($page['page']->questions as $question) {
                            if ($question['options']['field'] == $fieldname) {
                                return $question;
                            }
                        }
                    }

                }
            }
        }
    }

    /**
     * @param $field
     * @return mixed|null
     */
    public function getGroupFromField($field)
    {
        foreach ($this->_form->groups() as $group) {
            foreach ($group->tasks as $task) {
                foreach ($task->pages as $page) {
                    try {
                        if (key_exists('page', $page) && $page['page'] instanceof BasePage) {
                            foreach ($page['page']->questions as $question) {
                                if ($question['options']['field'] == $field) {
                                    return $group;
                                }
                            }
                        }
                    } catch (\Exception $e) {
                        dd($e->getTraceAsString(), $page);
                    }
                }
            }
        }

        return null;
    }

    /**
     * @param $field
     * @return mixed|null
     */
    public function getTaskFromField($field)
    {
        foreach ($this->_form->groups() as $group) {
            foreach ($group->tasks as $task) {
                foreach ($task->pages as $page) {
                    try {
                        if (key_exists('page', $page) && $page['page'] instanceof BasePage) {
                            foreach ($page['page']->questions as $question) {
                                if ($question['options']['field'] == $field) {
                                    return $task;
                                }
                            }
                        }
                    } catch (\Exception $e) {
                        dd($e->getTraceAsString(), $page);
                    }
                }
            }
        }

        return null;
    }

    /**
     * @param $field
     * @return BasePage|null
     */
    public function getPageFromField($field)
    {
        foreach ($this->_form->groups() as $group) {
            foreach ($group->tasks as $task) {
                foreach ($task->pages as $page) {
                    try {
                        if (key_exists('page', $page) && $page['page'] instanceof BasePage) {
                            foreach ($page['page']->questions as $question) {
                                if ($question['options']['field'] == $field) {
                                    return $page['page'];
                                }
                            }
                        }
                    } catch (\Exception $e) {
                        dd($e->getTraceAsString(), $page);
                    }
                }
            }
        }

        return null;
    }

    /**
     * @param $namespaces
     * @return BaseTask|null
     */
    public function getTaskByClassName($classname)
    {
        foreach ($this->_form->groups() as $group) {
            foreach ($group->tasks as $task) {
                if (get_class($task) == $classname) {
                    return $task;
                }
            }
        }

        return null;
    }

    /**
     * @param $namespace
     * @return mixed|null
     */
    public function getTaskForPageByNamespace($namespace)
    {
        foreach ($this->_form->groups() as $group) {
            foreach ($group->tasks as $task) {
                foreach ($task->pages as $page) {
                    if (key_exists('page', $page)) {
                        try {
                            if ($page['page']->namespace == $namespace) {
                                return $task;
                            }
                        } catch (Exception $e) {
                        }
                    }
                }
            }
        }

        return null;
    }

    /**
     * @param $namespace
     * @return array
     */
    public function getBreadcrumbTrail($namespace)
    {
        $crumbs = [];

        foreach ($this->_form->groups() as $group) {
            foreach ($group->tasks as $task) {
                $crumbs = [];
                foreach ($task->pages as $page) {
                    if (key_exists('page', $page)) {
                        if ($page['page']->namespace == $namespace) {
                            return $crumbs;
                        }

                        $crumbs[route('load.form', [
                            'group' => $group->getId(),
                            'task' => $task->getId(),
                            'page' => $page['page']->getId(),
                        ])] = $page['page']->title;
                    }
                }
            }
        }

        return $crumbs;
    }

    /**
     * @param $field
     * @return mixed
     */
    public function questionValue($field)
    {
        // If there is a value directly attributed to this field clearly it
        // is not from a stack so we return and short-circuit the method here
        if (session($field, null)) {
            return session($field, null);
        }

        foreach ($this->_form->groups() as $group) {
            /** @var BaseTask $task */
            foreach ($group->tasks as $task) {
                if ($task->isStackable()) {
                    foreach ($task->stack as $stackID => $stack) {
                        if ($stack) {
                            foreach ($stack as $fieldName => $fieldValue) {
                                if ($fieldName == $field && request('stack') == $stackID) {
                                    return $fieldValue;
                                }
                            }
                        }
                    }
                } else {
                    /** @var BasePage $page */
                    foreach ($task->pages ?? [] as $page) {
                        foreach ($page['page']->questions ?? [] as $question) {
                            //  dump($question['options']['field'] . ' :: ' . $field);
                        }
                    }
                }
            }
        }

        return null;
    }

    /**
     * @param $response
     * @return string
     */
    public function formatDateResponse($response)
    {
        list($year, $month, $day) = explode('-', $response);
        $dateResponse = [];
        if ($year == '0000' || $month == '00' || $day == '00') {
            if ($day !== '00') array_push($dateResponse, $day);

            array_push($dateResponse,
                ($month !== '00') ? (DateTime::createFromFormat('!m', $month))->format('F')
                    : (($day !== '00') ? 'Unknown month' : false));

            if ($year !== '0000') array_push($dateResponse, $year);
        }

        return (sizeof($dateResponse) > 0) ? trim(join(' ', $dateResponse)) : 'Not answered';
    }


    /**
     * @param $value
     * @return Application|mixed
     */
    public function __get($value)
    {
        switch ($value) {
            case 'form':
                return $this->_form;

            case 'trackStackId':
                return $this->_trackStackId;
        }
    }
}
