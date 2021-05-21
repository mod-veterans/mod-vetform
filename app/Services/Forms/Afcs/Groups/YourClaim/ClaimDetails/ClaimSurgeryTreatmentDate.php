<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;


use App\Services\Forms\BasePage;

class ClaimSurgeryTreatmentDate extends BasePage
{
    protected string $_title = 'When is this surgery due to take place?';

    function setQuestions(): void
    {
        $this->_questions = [
            0 => [
                'component' => 'date-field',
                'options' => [
                    'field' => $this->namespace . '/claim-surgery-treatment-date',
                    'label' => 'When is this surgery due to take place?',
                    'hint' => 'For example 27 3 2007',
                    'validation' => 'required|date|after:today',
                    'messages' => [
                        'required' => 'Enter your date this surgery is due',
                        'date' => 'Enter your date this surgery is due',
                    ],
                ],
            ],
        ];
    }
}
