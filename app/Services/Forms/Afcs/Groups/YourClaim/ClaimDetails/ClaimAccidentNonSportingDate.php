<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;


use App\Services\Constant;
use App\Services\Forms\BasePage;

class ClaimAccidentNonSportingDate extends BasePage
{
    protected string $_title = 'What was the date of injury/incident?';

    function setQuestions(): void
    {
        $this->_questions = [
            0 => [
                'component' => 'date-field',
                'options' => [
                    'field' => $this->namespace . '/date-of-injury-incident',
                    'label' => 'What was the date of injury/incident?',
                    'hint' => 'For example 27 3 2007',
                    'validation' => 'nullable|date',
                    'messages' => [
                        'required' => 'Enter the date of injury/incident?',
                        'date' => 'Enter the date of injury/incident?',
                    ],
                ],
            ]
        ];
    }
}
