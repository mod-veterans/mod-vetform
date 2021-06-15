<?php


namespace App\Services\Forms\Afcs\Groups\OtherDetails\OtherMedicalTreatment;


class OtherMedicalTreatmentCondition extends \App\Services\Forms\BasePage
{
    protected string $_title = 'What condition was this treatment for?';

    public function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/other-medical-treatment-condition',
                    'label' => 'Condition treated'
                ],
                'validation' => 'required|max:100',
                'messages' => [
                    'required' => 'Enter the condition this treatment was for'
                ]
            ]
        ];
    }
}
