<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;


use App\Services\Forms\BasePage;

class ClaimIllnessFirstMedicalAttentionDate extends BasePage
{
    protected string $_title = 'When did you first seek medical attention for the condition(s)?';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'hidden-field',
                'options' => [
                    'field' => $this->namespace . '/claim-surgery-treatment-date-year',
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
                    'field' => $this->namespace . '/claim-surgery-treatment-date',
                    'label' => 'When did you first seek medical attention for the condition(s)?',
                    'hint' => 'For example 27 3 2007. If you can’t remember, enter an approximate year.',
                    'hideLabel' => true,
                    // 'validation' => 'required|date|before:today',
                    'messages' => [
                        'required' => 'Enter your date when you first sought medical attention for the condition(s)',
                        'date' => 'Enter your date when you first sought medical attention for the condition(s)',
                        'before' => 'Enter a date before today\'s date',
                    ],
                ],
            ],
        ];
    }
}
