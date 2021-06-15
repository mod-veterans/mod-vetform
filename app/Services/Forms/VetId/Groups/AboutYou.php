<?php


namespace App\Services\Forms\VetId\Groups;


use App\Services\Forms\VetId\Groups\AboutYou\ApplicantPersonal;
use App\Services\Forms\VetId\Groups\AboutYou\ApplicantAddress;

class AboutYou extends \App\Services\Forms\BaseGroup
{
    /**
     * @var string
     */
    protected string $name = 'About you';

    /**
     * AboutYou constructor.
     * @param $namespace
     */
    public function __construct($namespace)
    {
        parent::__construct($namespace);

        $this->_tasks = [
            new ApplicantPersonal($this->namespace),
            new ApplicantAddress($this->namespace)
        ];
    }
}
