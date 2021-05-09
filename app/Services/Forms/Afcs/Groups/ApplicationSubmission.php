<?php


namespace App\Services\Forms\Afcs\Groups;


use App\Services\Forms\Afcs\Groups\ApplicationSubmission\Declaration;
use App\Services\Forms\BaseGroup;

class ApplicationSubmission extends BaseGroup
{
    /**
     * @var string
     */
    protected string $name = 'Declaration and application submission';

    /**
     * ApplicationSubmission constructor.
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
