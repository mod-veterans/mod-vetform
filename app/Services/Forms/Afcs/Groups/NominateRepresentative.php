<?php


namespace App\Services\Forms\Afcs\Groups;


class NominateRepresentative extends \App\Services\Forms\BaseGroup
{
    /**
     * @var string
     */
    protected $name = 'Nominate a representative';

    /**
     * NominateRepresentative constructor.
     * @param $namespace
     */
    public function __construct($namespace)
    {
        $this->_tasks = [
            new \App\Services\Forms\Afcs\Groups\NominateRepresentative\NominateRepresentative($this->namespace),
        ];

        parent::__construct($namespace);
    }
}
