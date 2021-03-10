<?php


namespace App\Services\Forms\Afcs\Groups;


use App\Services\Forms\Afcs\Groups\SupportingDocuments\Documents;
use App\Services\Forms\BaseGroup;

class SupportingDocuments extends BaseGroup
{
    /**
     * @var string
     */
    protected $name = 'Supporting documents';

    /**
     * @var Documents[]|array
     */
    protected $tasks = [];

    /**
     * SupportingDocuments constructor.
     * @param $namespace
     */
    public function __construct($namespace)
    {
        $this->tasks = [
            new Documents($this->namespace),
        ];

        parent::__construct($namespace);
    }
}
