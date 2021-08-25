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
    protected $_stackTriggerPage = null;
    protected $_stackTriggerQuestion = null;
    protected $_stackTriggerAnswer = null;
    protected $_addStackLabel = 'Add an item';
    protected $_addSubsequentStackLabel = 'Add another item';
    protected bool $_stackSkipTriggerQuestion = false;

    protected $mnemonic = '';
    protected $mnemonicCount = false;

    /**
     *
     */
    protected function initStack()
    {
        $this->_stackName = 'stack::' . $this->namespace;

        if (!session()->exists($this->_stackName)) {
            session([$this->_stackName => []]);
        }

        $this->_stack = session($this->_stackName);
    }

    /**
     * @return string
     */
    public function addToStack()
    {
        $skip = session('skip_stack', []);
        $skipIndex = array_search($this->namespace, $skip);

        if ($skipIndex !== false) {
            unset($skip[$skipIndex]);
        }

        session(['skip_stack' => $skip]);

        $stackKey = Uuid::uuid6()->toString();
        $stack = session($this->_stackName);
        if (!isset($stack[$stackKey])) {
            $stack[$stackKey] = [];
            session([$this->_stackName => $stack]);
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
        }

        return true;
    }

    /**
     * @param $index
     * @return array|mixed
     */
    public function getStackBranch($index)
    {
        $this->_stack = session($this->_stackName);

        if (isset($this->_stack[$index])) {
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

            case 'stack':
                return $this->_stack;

            case 'addStackLabel':
                return !$this->_stack ? $this->_addStackLabel : $this->_addSubsequentStackLabel ;

            default:
                return parent::__get($value);
        }
    }

    /**
     * @param $stackItem
     */
    public function renderMnemonic($stackItem, $index = 0)
    {
        $mnemonic = $this->mnemonic;

        if (is_array($mnemonic)) {
            $key = key($mnemonic);
            $value = $mnemonic[$key];

            if (array_key_exists($key, $stackItem)) {
                return $stackItem[$key][$value];
            }
        }

        if (is_string($mnemonic)) {
            if (array_key_exists($mnemonic, $stackItem)) return $stackItem[$mnemonic];

            if ($this->mnemonicCount) {
                return $mnemonic . ' ' . $index;
            }

            return $mnemonic;
        }

        return 'Incomplete Item';
    }
}
