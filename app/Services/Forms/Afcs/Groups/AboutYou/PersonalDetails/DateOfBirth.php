<?php


namespace App\Services\Forms\Afcs\Groups\AboutYou\PersonalDetails;


use App\Rules\Year;
use App\Services\Forms\BasePage;



class DateOfBirth extends BasePage
{
    protected string $_title = 'What is your date of birth?';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'date-field',
                'options' => [
                    'field' => $this->namespace . '/date-of-birth',
                    'label' => 'Date of birth',
                    'hint' => 'For example 27 3 2007',
                    'validation' => [
                        'required',
                        'date'
                    ],
                    'messages' => [
                        'required' => 'Enter your date of birth',
                        'date' => 'Enter your date of birth',
                    ],
                ],
            ],
        ];
    }
}
