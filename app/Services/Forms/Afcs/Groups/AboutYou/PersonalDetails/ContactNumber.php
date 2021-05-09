<?php


namespace App\Services\Forms\Afcs\Groups\AboutYou\PersonalDetails;


use App\Services\Forms\BasePage;

class ContactNumber extends BasePage
{
    protected string $_title = 'What is your contact number?';

    function setQuestions(): void
    {
        $this->_questions = [
            0 => [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/contact-number',
                    'label' => 'Daytime telephone number',
                    'type' => 'tel',
                    'autocomplete' => 'tel',
                    'validation' => 'required',
                    'messages' => [
                        'required' => 'Enter your daytime telephone number',
                    ],
                ],
            ],
            1 => [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/alternative-number',
                    'label' => 'Alternative telephone number',
                    'type' => 'tel',
                    'autocomplete' => 'tel'
                ],
            ],
        ];
    }
}
