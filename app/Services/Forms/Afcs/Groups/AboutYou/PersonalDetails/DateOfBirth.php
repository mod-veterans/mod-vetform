<?php


namespace App\Services\Forms\Afcs\Groups\AboutYou\PersonalDetails;


use App\Services\Forms\BasePage;

class DateOfBirth extends BasePage
{
    protected $title = 'What is your date of birth?';

    function setQuestions(): void
    {
        $this->_questions = [
            'name' => [
                'component' => 'date-field',
                'options' => [
                    'field' => $this->namespace . '/date-of-birth',
                    'label' => 'Date of birth',
                    'validation' => 'required',
                ],
            ],
        ];
    }
}
