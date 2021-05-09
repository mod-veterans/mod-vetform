<?php


namespace App\Services\Forms\Afcs\Groups;


use App\Services\Forms\Afcs\Groups\OtherDetails\OtherBenefits;
use App\Services\Forms\Afcs\Groups\OtherDetails\OtherCompensation;
use App\Services\Forms\Afcs\Groups\OtherDetails\OtherMedicalTreatment;
use App\Services\Forms\BaseGroup;

class OtherDetails extends BaseGroup
{
    /**
     * @var string
     */
    protected string $name = 'Other details';

    /**
     * OtherDetails constructor.
     * @param $namespace
     */
    public function __construct($namespace)
    {
        $this->_tasks = [
            new OtherMedicalTreatment($this->namespace),
            new OtherCompensation($this->namespace),
            new OtherBenefits($this->namespace),
        ];
        parent::__construct($namespace);
    }
}
