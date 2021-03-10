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
     * @var
     */
    protected $_tree;

    public function __construct($namespace)
    {
        $this->_namespace = $namespace . '/' . $this->getId();

        /** @var \DOMDocument $tree */
        $tree = session(Constant::TREE_NAME);
        // dd($tree);
        // dd(session(Constant::TREE_NAME));

        $form = session('form');

        dd($form);
        // if($tree[$form])

        if (!$tree->hasChildNodes()) {
            $groupNode = $tree->createElement($this->getId());
            $tree->appendChild($groupNode);
        } else {
            $nodePresent = false;
            foreach ($tree->childNodes as $node) {
                if ($node->nodeName === $this->getId()) {
                    $nodePresent = true;
                    break;
                }
            }

            if (!$nodePresent) {
                $groupNode = $tree->createElement($this->getId());
                $tree->appendChild($groupNode);
            }
        }

        session([Constant::TREE_NAME => $tree]);

       // dd(session()->all());
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
     * @var array
     */
    protected $tasks = [];

    /**
     * @var string
     */
    protected $name = '';

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function tasks(): array
    {
//        $tasks = [];
//
//        foreach ($this->tasks as $task) {
//            array_push($tasks, (new $task));
//        }

        return $this->tasks ?? [];
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
        }
    }
}
