<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;


use App\Services\Forms\BasePage;

class ClaimAccidentSportingActivity extends BasePage
{
    protected string $_title = 'What was the activity?';

    public string $summary = '<p class="govuk-body">(E.G. skiing/football/diving)</p>';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/activity',
                    'label' => 'What was the activity?',
                    'hideLabel' => true,
                    'validation' => 'required|max:100',
                    'messages' => [
                        'required' => 'Enter the activity',
                    ],
                ],
            ]
        ];
    }
}
