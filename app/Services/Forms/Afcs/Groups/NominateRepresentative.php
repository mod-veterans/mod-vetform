<?php


namespace App\Services\Forms\Afcs\Groups;


use App\Services\Forms\Afcs\Groups\NominateRepresentative\Applicant;
use App\Services\Forms\Afcs\Groups\NominateRepresentative\Representative;
use App\Services\Forms\BaseGroup;

class NominateRepresentative extends BaseGroup
{
    /**
     * @var string
     */
    protected string $name = 'Who is making this application?';

    /**
     * Representative constructor.
     * @param $namespace
     */
    public function __construct($namespace)
    {
        $this->_tasks = [
            new Applicant($this->namespace),
            new Representative($this->namespace),
        ];

        parent::__construct($namespace);
    }
}
