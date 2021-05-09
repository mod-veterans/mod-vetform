<?php


namespace App\Services\Forms;


use App\Services\Constant;
use Illuminate\Support\Str;

abstract class BaseGroup
{
    const STARTED = 1;
    const COMPLETE = 2;

    const STATUS_CANNOT_START = 0;
    const STATUS_CAN_START = 1;
    const STATUS_HAS_STARTED = 2;
    const STATUS_HAS_COMPLETED = 4;

    protected $_id = null;

    /**
     * @var
     */
    private $_namespace;

    /**
     * @var array
     */
    public $_tasks;

    /**
     * BaseGroup constructor.
     * @param $namespace
     */
    public function __construct($namespace)
    {
        $this->_namespace = $namespace . '/' . $this->getId();
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
     * @var string
     */
    protected $preTask = null;

    /**
     * @var string
     */
    protected $postTask = null;

    /**
     * @var string
     */
    protected string $name = '';

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }

    public function getStatus()
    {
    }

    public function isComplete()
    {
        return false;
    }

    public function hasStarted()
    {
        return false;
    }

    public function canStart()
    {
        return true;
    }

    public function getStatusString()
    {

    }

    public function __get($value)
    {
        switch ($value) {
            case 'namespace':
                return $this->_namespace;

            case 'tasks':
                return $this->_tasks ?? [];
        }
    }
}
