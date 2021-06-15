<?php


namespace App\Services\Forms\VetId\Groups;


use App\Services\Forms\BaseGroup;
use App\Services\Forms\VetId\Groups\Submission\Declaration;

class Submission extends BaseGroup
{
    /**
     * @var string
     */
    protected string $name = 'Declaration and submission';

    /**
     * AboutYou constructor.
     * @param $namespace
     */
    public function __construct($namespace)
    {
        parent::__construct($namespace);

        $this->_tasks = [
            new Declaration($this->namespace),
        ];
    }
}
