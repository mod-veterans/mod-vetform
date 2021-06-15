<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;


use App\Services\Forms\BasePage;

class ClaimAccidentNonSportingMedicalCondition extends BasePage
{
    protected string $_title = 'What medical condition(s) are you claiming for?';

    public string $summary = '
    <p class="govuk-body">
      Where you have any specific medical diagnosis, please include them here
    </p>';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'text-area',
                'options' => [
                    'field' => $this->namespace . '/claim-accident-non-sporting-medical-condition',
                    'label' => 'What medical condition(s) are you claiming for?',
                    'hideLabel' => true,
                    'hint' => 'Please include all claimed medical conditions you think are linked to the incident, even if they developed afterwards.
                               Tell us which side of the body is affected where needed (e.g. left arm)',
                    'validation' => 'required|max:250',
                    'messages' => [
                        'required' => 'Select a condition which applies',
                    ],
                ],
            ]
        ];
    }
}
