<?php


namespace App\Services\Forms\Medals\Groups\AboutYou\Applicant;


use App\Services\Forms\BasePage;

class DateOfBirth extends BasePage
{
    protected string $_title = 'When where you born?';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'date-field',
                'options' => [
                    'field' => $this->namespace . '/date-of-birth',
                    'label' => 'Date of birth',
                    'hint' => 'For example 27 03 2007',
                    'validation' => 'required|date',
                    'messages' => [
                        'required' => 'Enter your date of birth',
                        'date' => 'Enter your date of birth',
                    ],
                ],
            ]
        ];
    }
}
