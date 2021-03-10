<?php


namespace App\Services\Traits;


/**
 * Trait Stackable
 * @package App\Services\Traits
 */
trait Stackable
{
    protected $_stack = [];

    public function getStack()
    {
        return $this->_stack;
    }

    public function addToStack()
    {

    }

    public function removeFromStack()
    {

    }
}
