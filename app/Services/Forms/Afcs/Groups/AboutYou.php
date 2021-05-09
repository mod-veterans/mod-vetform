<?php


namespace App\Services\Forms\Afcs\Groups;


use App\Services\Forms\Afcs\Groups\AboutYou\PersonalDetails;
use App\Services\Forms\Afcs\Groups\AboutYou\MedicalOfficer;
use App\Services\Forms\Afcs\Groups\AboutYou\ServiceDetails;
use App\Services\Forms\BaseGroup;

class AboutYou extends BaseGroup
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
            new PersonalDetails($this->namespace),
            new MedicalOfficer($this->namespace),
            new ServiceDetails($this->namespace),
        ];
    }
}
