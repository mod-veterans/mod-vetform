<?php


namespace App\Services\Forms\Afcs\Groups\OtherDetails\OtherMedicalTreatment;


class OtherMedicalTreatmentType extends \App\Services\Forms\BasePage
{
    protected string $_title = 'What type of medical treatment did you receive?';

    public string $summary = '<p class="govuk-body">e.g. Surgery, specialist consultation,tests, physiotherapy</p>';

    public function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/other-medical-treatment-type',
                    'label' => 'What type of medical treatment did you receive?',
                    'hideLabel' => true
                ],
                'validation' => 'required|max:100',
                'messages' => [
                    'required' => 'Enter the condition(s) this treatment was for'
                ]
            ]
        ];
    }
}
