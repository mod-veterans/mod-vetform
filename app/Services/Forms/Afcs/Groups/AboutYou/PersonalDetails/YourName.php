<?php


namespace App\Services\Forms\Afcs\Groups\AboutYou\PersonalDetails;


use App\Services\Forms\BasePage;

class YourName extends BasePage
{
    protected string $_title = 'What is your name?';

    function setQuestions(): void
    {
        $this->_questions = [
            0 => [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/last-name',
                    'label' => 'Last name',
                    'validation' => 'required',
                    'messages' => [
                        'required' => 'Enter your last name'
                    ],
                    'autocomplete' => 'family_name'
                ],
            ],
            1 => [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/other-names',
                    'label' => 'Other names',
                    'validation' => 'required',
                    'messages' => [
                        'required' => 'Enter other names'
                    ],
                ]
            ]
        ];
    }
}
