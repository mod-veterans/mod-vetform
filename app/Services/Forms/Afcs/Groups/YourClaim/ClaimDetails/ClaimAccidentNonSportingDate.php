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
            [
                'component' => 'hidden-field',
                'options' => [
                    'field' => $this->namespace . '/date-of-injury-incident-year',
                    'validation' => [
                        'required',
                        'max:' . date('Y'),
                    ],
                    'messages' => [
                        'required' => 'Enter a year, even if it’s approximate',
                    ],
                ],
            ],
            [
                'component' => 'date-field',
                'options' => [
                    'field' => $this->namespace . '/date-of-injury-incident',
                    'label' => 'What was the date of injury/incident?',
                    'hint' => 'For example 27 3 2007. If you can’t remember, enter an approximate year.',
                    // 'validation' => 'nullable|date',
                    'messages' => [
                        'required' => 'Enter the date of injury/incident?',
                        'date' => 'Enter the date of injury/incident?',
                    ],
                ],
            ]
        ];
    }
}
