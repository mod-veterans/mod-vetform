<?php


namespace App\Services\Forms\Afcs\Groups\OtherDetails\OtherCompensation;


use App\Services\Forms\BasePage;
use App\Services\Patterns\Address;

class ClaimSolicitorDetails extends BasePage
{
    protected string $_title =  'What was the name and address of the solicitor who helped you?';


    function setQuestions(): void
    {
        $address = new Address($this, 'their', false,  'claim-solicitor', []);
        $this->_questions = array_merge([
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/claim-solicitor-contact-name',
                    'label' => 'Solicitors\' full name',
                    'messages' => [
                        'required' => 'Enter your solicitors\' full name'
                    ],
                    'autocomplete' => 'name'
                ],
            ]
        ], $address->fields(), [
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/claim-solicitor-contact-number',
                    'label' => 'Telephone number',
                    'type' => 'tel',
                    'autocomplete' => 'tel',
                    'messages' => [
                        'required' => 'Enter their telephone number',
                    ],
                ],
            ]
        ]);
    }


}
