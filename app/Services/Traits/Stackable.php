<?php


namespace App\Services\Traits;


use Ramsey\Uuid\Uuid;

/**
 * Trait Stackable
 * @package App\Services\Traits
 *
 * @property array $stack
 */
trait Stackable
{
    protected $_stackName = '';
    protected $_stack = [];
    protected $_mnemonic = '';

    /**
     *
     */
    protected function initStack()
    {
        $this->_stackName = 'stack::' . $this->namespace;

        if (!session()->exists($this->_stackName)) {
            session([$this->_stackName => []]);
            session()->save();
        }

        $this->_stack = session($this->_stackName);
    }

    /**
     * @return string
     */
    public function addToStack()
    {
        $stackKey = Uuid::uuid6()->toString();
        $stack = session($this->_stackName);
        if (!isset($stack[$stackKey])) {
            $stack[$stackKey] = [];
            session([$this->_stackName => $stack]);
            session()->save();
        }

        $this->_stack = $stack;
        return $stackKey;
    }

    /**
     *
     */
    public function dropFromStack($index)
    {
        if (isset($this->_stack[$index])) {
            unset($this->_stack[$index]);
            session([$this->_stackName => $this->_stack]);
            session()->save();
        }

        return true;
    }

    /**
     * @param $index
     * @return array|mixed
     */
    public function getStackBranch($index) {
        $this->_stack = session($this->_stackName);

        if(isset($this->_stack[$index])) {
            return $this->_stack[$index];
        }

        return [];
    }

    /**
     * @param $stackID
     */
    public function isValidStack($stackID)
    {
        return isset($this->_stack[$stackID]);
    }

    public function __get($value)
    {
        switch ($value) {
            case 'mnemonic':
                if ($this->_mnemonic) {

                } else {
                    return false;
                }
                break;

            default:
                return parent::__get($value);
        }
    }
}
