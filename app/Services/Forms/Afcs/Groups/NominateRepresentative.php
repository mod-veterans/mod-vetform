<?php


namespace App\Services\Forms\Afcs\Groups;


class NominateRepresentative extends \App\Services\Forms\BaseGroup
{
    /**
     * @var string
     */
    protected $name = 'Nominate a representative';

    /**
     * @var NominateRepresentative\NominateRepresentative[]|array
     */
    protected $tasks = [];

    /**
     * NominateRepresentative constructor.
     * @param $namespace
     */
    public function __construct($namespace)
    {
        $this->tasks = [
            new \App\Services\Forms\Afcs\Groups\NominateRepresentative\NominateRepresentative($this->namespace),
        ];

        parent::__construct($namespace);
    }
}
