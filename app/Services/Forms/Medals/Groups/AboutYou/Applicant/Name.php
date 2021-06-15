<?php


namespace App\Services\Forms\Medals\Groups\AboutYou\Applicant;


use App\Services\Forms\BasePage;

class Name extends BasePage
{
    protected string $_title = 'What is your name?';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/first-names',
                    'label' => 'First name',
                    'validation' => 'required',
                    'messages' => [
                        'required' => 'Enter your first name'
                    ],
                    'autocomplete' => 'name'
                ]
            ],
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/last-name',
                    'label' => 'Surname or family name',
                    'validation' => 'required',
                    'messages' => [
                        'required' => 'Enter your last name'
                    ],
                    'autocomplete' => 'family_name'
                ],
            ],

        ];
    }
}
