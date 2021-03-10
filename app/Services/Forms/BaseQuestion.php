<?php


namespace App\Services\Forms;


use Illuminate\Support\Str;

abstract class BaseQuestion
{
    protected $_id = null;

    public function getId()
    {
        if (isset($this->_id))
            return $this->_id;

        $path = explode('\\', get_called_class());
        return Str::kebab(end($path));
    }

    /**
     * BaseQuestion constructor.
     */
    public function __construct($type, $nextQuestion = null)
    {
    }
}
