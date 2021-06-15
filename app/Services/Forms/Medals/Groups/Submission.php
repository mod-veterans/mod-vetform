<?php


namespace App\Services\Forms\Medals\Groups;


use App\Services\Forms\BaseGroup;
use App\Services\Forms\Medals\Groups\Submission\Declaration;

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
