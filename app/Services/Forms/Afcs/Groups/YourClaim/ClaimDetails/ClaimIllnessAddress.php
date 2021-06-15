<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;


use App\Services\Forms\BasePage;
use App\Services\Patterns\Address;

class ClaimIllnessAddress extends BasePage
{
    protected string $_title = 'Which Medical Practioner gave you the diagnosis (if known)?';

    function setQuestions(): void
    {
        $address = new Address($this->namespace, 'their', false, 'claim-illness-address');
        $this->_questions = array_merge(
            [
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/claim-illness-address-contact-name',
                    'label' => 'Medical Practitioners full name',
                    'autocomplete' => 'name'
                ],
            ]
            ],
            $address->fields(),
            [
                [
                    'component' => 'textfield',
                    'options' => [
                        'field' => $this->namespace . '/claim-illness-address-contact-number',
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
                        'field' => $this->namespace . '/claim-illness-address-contact-email',
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


