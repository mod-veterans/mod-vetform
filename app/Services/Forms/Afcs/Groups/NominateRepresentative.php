<?php


namespace App\Services\Forms\Afcs\Groups;


class NominateRepresentative extends \App\Services\Forms\BaseGroup
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
            new \App\Services\Forms\Afcs\Groups\NominateRepresentative\Applicant($this->namespace),
            new \App\Services\Forms\Afcs\Groups\NominateRepresentative\Representative($this->namespace),
        ];

        parent::__construct($namespace);
    }
}
