<?php


namespace App\Services\Forms\Afcs\Groups;


use App\Services\Forms\Afcs\Groups\ApplicationSubmission\Submission;
use App\Services\Forms\BaseGroup;

class ApplicationSubmission extends BaseGroup
{
    /**
     * @var string
     */
    protected $name = 'Declaration and application submission';


    /**
     * ApplicationSubmission constructor.
     * @param $namespace
     */
    public function __construct($namespace)
    {
        $this->_tasks = [
            new Submission($this->namespace, $this->_tree),
        ];

        parent::__construct($namespace, $tree = []);
    }
}
