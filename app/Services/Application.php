<?php


namespace App\Services;


use App\Services\Forms\BaseGroup;
use App\Services\Forms\BasePage;
use App\Services\Forms\BaseTask;
use Illuminate\Http\Client\HttpClientException;

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
     * @param $namespace
     * @return BaseGroup|null
     */
    public function getGroupByNamespace($namespace)
    {
        foreach ($this->_form->groups() as $group) {
            // $group->namespace = (new \ReflectionObject($this))->getNamespaceName();
            if ($group->namespace == $namespace) {
                return $group;
            }
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
     * @param $namespace
     * @return mixed|null
     */
    public function getTaskForPageByNamespace($namespace)
    {
        foreach ($this->_form->groups() as $group) {
            foreach ($group->tasks as $task) {
                foreach ($task->pages as $page) {
                    if ($page['page']->namespace == $namespace) {
                        return $task;
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
                    foreach ($task->pages as $page) {
                        foreach ($page['page']->questions as $question) {
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
        if ($value === 'form') {
            return $this->_form;
        }
    }
}
