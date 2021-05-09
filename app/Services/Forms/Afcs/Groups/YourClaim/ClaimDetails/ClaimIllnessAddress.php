<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;


use App\Services\Patterns\Address;

class ClaimIllnessAddress extends \App\Services\Forms\BasePage
{
    protected string $_title = 'Which Medical Practioner gave you the diagnosis (if known)?';

    function setQuestions(): void
    {
        $address = new Address($this->namespace, 'their', false);
        $this->_questions = array_merge(
            $address->fields(),
            [
                [
                    'component' => 'textfield',
                    'options' => [
                        'field' => $this->namespace . '/contact-number',
                        'label' => 'Telephone number',
                        'type' => 'tel',
                        'autocomplete' => 'tel',
                        'messages' => [
                            'required' => 'Enter their telephone number',
                        ],
                    ],
                ]
            ],
            [
                [
                    'component' => 'textfield',
                    'options' => [
                        'field' => $this->namespace . '/contact-email',
                        'label' => 'Email address',
                        'type' => 'email',
                        'autocomplete' => 'email',
                        'messages' => [
                            'required' => 'Enter their email address',
                        ],
                    ]
                ]
            ]
        );
    }
}


