<?php


namespace App\Services\Forms\Afcs\Groups\AboutYou\PersonalDetails;


use App\Services\Forms\BasePage;

class EmailAddress extends BasePage
{
    protected string $_title = 'Email address';

    function setQuestions(): void
    {
        $this->_questions = [
            0 => [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/email-address',
                    'label' => 'Email address',
                    'hideLabel' => true,
                    'hint' => 'We will send confirmation of your claim to this address',
                    'type' => 'email',
                    'autocomplete' => 'email',
                    'validation' => 'required',
                    'messages' => [
                        'required' => 'Enter an email address in the correct format, like name@example.com',
                    ],
                ],
            ],
        ];
    }
}
