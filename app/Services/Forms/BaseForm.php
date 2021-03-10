<?php


namespace App\Services\Forms;


use App\Services\Constant;
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

        // dd('KK');

        $tree = session(Constant::TREE_NAME, []);

        if (!is_array($tree)) {
            $tree = [];
        }

        if (!key_exists($name, $tree)) {
            $tree[$name] = [];
        }


        session([Constant::TREE_NAME => $tree]);

//        if ($tree->documentElement) {
//            if ($tree->documentElement->nodeName !== $name) {
//                $tree = new \DOMDocument();
//                $root = $tree->createElement($name);
//                $tree->appendChild($root);
//            }
//        } else {
//            $root = $tree->createElement($name);
//            $tree->appendChild($root);
//        }

        session([Constant::TREE_NAME => $tree]);
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
//        $groups = [];
//
//        foreach ($this->groups as $group) {
//            array_push($group);
//        }

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
}
