<?php


namespace App\Services\Forms\Afcs\Groups\OtherDetails\OtherMedicalTreatment;


use App\Services\Forms\BasePage;
use App\Services\Traits\Stackable;

class MedicalTreatmentStack extends \App\Services\Forms\BaseTask
{
    use Stackable;

    protected function setPages()
    {
        $this->_pages = [
            'other-medical-treatment-address' => [
                'page' => new OtherMedicalTreatmentAddress($this->namespace),
                'next' => 'other-medical-treatment-start-date'
            ],
            'other-medical-treatment-start-date' => [
                'page' => new OtherMedicalTreatmentStartDate($this->namespace),
                'next' => 'other-medical-treatment-end-date'
            ],
            'other-medical-treatment-end-date' => [
                'page' => new OtherMedicalTreatmentEndDate($this->namespace),
                'next' => 'other-medical-treatment-type',
            ],
            'other-medical-treatment-type' => [
                'page' => new OtherMedicalTreatmentType($this->namespace),
                'next' => 'other-medical-treatment-condition',
            ],
            'other-medical-treatment-condition' => [
                'page' => new OtherMedicalTreatmentCondition($this->namespace),
            ]
        ];
    }
}
