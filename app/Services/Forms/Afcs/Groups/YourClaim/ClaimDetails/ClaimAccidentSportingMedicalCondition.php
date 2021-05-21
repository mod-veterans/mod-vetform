<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;


use App\Services\Forms\BasePage;

class ClaimAccidentSportingMedicalCondition extends BasePage
{

    protected string $_title = 'What medical condition(s) are you claiming for?';

    public string $summary = '<p class="govuk-body">Where you have any specific medical diagnosis, please include them here</p>';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'text-area',
                'options' => [
                    'field' => $this->namespace . '/claim-accident-sporting-medical-condition',
                    'label' => 'What medical condition(s) are you claiming for?',
                    'hideLabel' => true,
                    'hint' => '',
                    'validation' => 'required|max:250',
                    'message' => [
                        'required' => 'Enter what medical condition you are claiming for',
                        'max' => 'Do not exceed 250 characters for the medical condition you are claiming for'
                    ]
                ],
            ]
        ];
    }
}
