<?php


namespace App\Services\Forms\Afcs\Groups\OtherDetails\OtherMedicalTreatment;


use App\Services\Constant;
use App\Services\Forms\BasePage;

class TreatmentStatus extends BasePage
{
    protected string $_title = 'Have you had any further hospital or medical treatment?';

    function setQuestions(): void
    {
        $this->_questions = [
            0 => [
                'component' => 'radio-group',
                'options' => [
                    'field' => $this->namespace . '/treatment-status',
                    'label' => 'Have you had any further hospital or medical treatment?',
                    'hideLabel' => true,
                    'validation' => 'required',
                    'options' => [
                        ['label' => 'Yes', 'value' => Constant::YES, 'children' => []],
                        ['label' => 'No - I have not received any further medical treatment.', 'value' => Constant::NO, 'children' => []],
                    ],
                    'messages' => [
                        'required' => 'Select if you have recieved an AFCS Fast Payment',
                    ],
                ],
            ],
        ];
    }
}
