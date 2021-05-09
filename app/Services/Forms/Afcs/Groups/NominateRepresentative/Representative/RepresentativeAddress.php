<?php


namespace App\Services\Forms\Afcs\Groups\NominateRepresentative\Representative;


use App\Services\Patterns\Address;

class RepresentativeAddress extends \App\Services\Forms\BasePage
{
    protected string $_title = 'Please provide contact details for your nominated representative';

    function setQuestions(): void
    {
        $address = new Address($this->namespace, 'your representatives', true);
        $this->_questions = array_merge([
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/representative-name',
                    'label' => 'Their full name',
                    'validation' => 'required',
                    'messages' => [
                        'required' => 'Enter your representatives full name'
                    ],
                    'autocomplete' => 'name'
                ],
            ]
        ], $address->fields(), [
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/representative-number',
                    'label' => 'Telephone number',
                    'type' => 'tel',
                    'autocomplete' => 'tel',
                    'validation' => 'required',
                    'messages' => [
                        'required' => 'Enter your representatives telephone number',
                    ],
                ],
            ],
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/representative-email-address',
                    'label' => 'Email address',
                    'type' => 'email',
                    'autocomplete' => 'email',
                    'validation' => 'required',
                    'messages' => [
                        'required' => 'Enter an email address in the correct format, like name@example.com',
                    ],
                ],
            ]
        ]);
    }
}
