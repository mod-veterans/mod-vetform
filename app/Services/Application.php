<?php


namespace App\Services;


use App\Services\Forms\BaseGroup;
use App\Services\Forms\BasePage;
use App\Services\Forms\BaseTask;
use Exception;
use Illuminate\Http\Client\HttpClientException;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

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

        $reference = strtoupper(end($formParts)) . '/' . time();
        session(['application-reference' => $reference]);
        return strtoupper(end($formParts)) . '/' . time();
    }

    public function trackStackId($stackId)
    {
        $this->_trackStackId = $stackId;
    }

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
                                    $label = $question['options']['label'];
                                    $component = $question['component'];

//                                    if($question['options']['field'] === 'afcs/about-you/personal-details/pension-scheme/pension-scheme') {
//                                        ;
//                                    }

                                    if (session($question['options']['field'], null)) {
                                        if ($component == 'date-field') {
                                            $reply = Carbon::createFromFormat('Y-m-d', $reply)->format('j F Y');
                                        }

                                        if ($component !== 'file-upload') {
                                            if($component === 'checkbox-group') {
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
                        } else {
                            if (sizeof($task->stack) > 0) {
                                foreach ($task->stack as $stackId => $stackItem) {
                                    $mnemonic = $task->renderMnemonic($stackItem);

                                    foreach ($stackItem as $fieldname => $response) {
                                        // dd($fieldname);

                                        $question = $this->getQuestionByFieldname($fieldname);
                                        $label = $question['options']['label'];
                                        $component = $question['component'];

                                        if ($component === 'fileUpload') {
                                            $responses[$task->name][$page->name][] = Storage::url('uploads/' . $response['filename']);
                                        } else {
                                            if ($component == 'date-field') {
                                                $response = Carbon::createFromFormat('Y-m-d', $response)->format('j F Y');
                                            }

                                            $responses[$task->name][$mnemonic][$label] = (is_array($response)) ? join(', ', $response) : $response;
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

        /** @var BaseGroup $group */
        foreach ($this->_form->groups() as $group) {
            foreach ($group->tasks as $task) {
                if (!key_exists($task->name, $responses)) {
                    $responses[$task->name] = [];
                }

                if ($task->isStackable()) {
                    if (sizeof($task->stack) > 0) {
                        foreach ($task->stack as $stack) {
                            foreach ($task->pages as $page) {
                                if (isset($page['page'])) {
                                    $page = $page['page'];
                                    if ($page instanceof BasePage) {
                                        foreach ($page->questions as $question) {
                                            if ($question['component'] !== 'file-upload') {
                                                if ($question['component'] !== 'hidden-field') {
                                                    if (array_key_exists('label', $question['options'])) {
                                                        $responses[$task->name][$task->renderMnemonic($stack)][$page->name][$question['options']['label']] = $stack[$question['options']['field']] ?? 'Unanswered';
                                                    } else {
                                                        $responses[$task->name][$task->renderMnemonic($stack)][$page->name][$question['options']['label']] = $stack[$question['options']['field']] ?? 'Unanswered';
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                } else {
                    /** @var BasePage $page */
                    foreach ($task->pages as $page) {
                        if (isset($page['page'])) {
                            $page = $page['page'];
                            if ($page instanceof BasePage) {
                                if (sizeof($page->questions) > 1) {
                                    foreach ($page->questions as $question) {
                                        if ($question['component'] !== 'file-upload') {
                                            if ($question['component'] !== 'hidden-field') {
                                                $responses[$task->name][$page->name][$question['options']['label']] = session($question['options']['field'], 'Not answered');
                                            }
                                        }
                                    }
                                } else {
                                    $question = $page->questions[array_key_first($page->questions)];
                                    if ($question['component'] !== 'file-upload') {
                                        if ($question['component'] !== 'hidden-field') {
                                            $responses[$task->name][$page->name] = session($question['options']['field'], 'Not answered');
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        array_shift($responses);

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
        //  dd($this->_form->groups());
        $names = [];

        foreach ($this->_form->groups() as $group) {
            array_push($names, $group->namespace);
        }
        //dd($names);
//            if ($group->namespace == $namespace) {
//                return $group;
//            }
//        }

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
                            // dd($page);
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
                        // dd($page);
                    }
                }
            }
        }

        return null;
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
