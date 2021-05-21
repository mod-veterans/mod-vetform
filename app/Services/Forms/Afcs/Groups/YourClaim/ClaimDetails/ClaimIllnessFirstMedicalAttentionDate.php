<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;


use App\Services\Forms\BasePage;

class ClaimIllnessFirstMedicalAttentionDate extends BasePage
{
    protected string $_title = 'When did you first seek medical attention for the condition(s)?';

    function setQuestions(): void
    {
        $this->_questions = [
            0 => [
                'component' => 'date-field',
                'options' => [
                    'field' => $this->namespace . '/claim-surgery-treatment-date',
                    'label' => 'When did you first seek medical attention for the condition(s)?',
                    'hint' => 'For example 27 3 2007',
                    'hideLabel' => true,
                    'validation' => 'required|date|before:today',
                    'messages' => [
                        'required' => 'Enter your date this surgery is due',
                        'date' => 'Enter your date this surgery is due',
                        'before' => 'Enter your date before today\'s date',
                    ],
                ],
            ],
        ];
    }
}
