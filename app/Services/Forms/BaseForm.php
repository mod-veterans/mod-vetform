<?php


namespace App\Services\Forms;


use Illuminate\Support\Str;

abstract class BaseForm
{
    protected $_id = null;

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
     * @var string
     */
    protected $name = '';

    /**
     * @var array
     */
    protected $groups = [];


    /**
     * BaseForm constructor.
     */
    public function __construct()
    {
    }

    protected function init($name)
    {
        ksort($this->groups);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function groups(): array
    {
        return $this->groups;
    }

    /**
     * @return int
     */
    public function countCompletedGroups(): int
    {
        $completed = 0;

        return $completed;
    }

    /**
     * @param $namespace
     * @return mixed|null
     */
    public function getStackClass($namespace)
    {
        foreach ($this->groups() as $group) {
            if ($group->namesapce == $namespace) {
                return $group;
            }

            foreach ($group->tasks ?? [] as $task) {
                if ($task->namespace == $namespace) {
                    return $task;
                }
            }
        }

        return null;
    }
}
