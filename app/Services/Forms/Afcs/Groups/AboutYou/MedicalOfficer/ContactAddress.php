<?php


namespace App\Services\Forms\Afcs\Groups\AboutYou\MedicalOfficer;


use App\Services\Forms\BasePage;
use App\Services\Patterns\Address;

class ContactAddress extends BasePage
{
    /**
     * @var string
     */
    protected $_id = 'medical-officer-contact';

    /**
     * @var string
     */
    protected $_title = 'What is the name and address of your current Medical Officer or GP?';


    function setQuestions(): void
    {
        $address = new Address($this->namespace, 'their');
        $this->_questions = array_merge([
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/contact-name',
                    'label' => 'Medical Officer or GP\'s full name',
                    'validation' => 'required',
                    'messages' => [
                        'required' => 'Enter your Medical Officer or GP\'s full name'
                    ],
                    'autocomplete' => 'name'
                ],
            ]
        ], $address->fields(), [
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/contact-number',
                    'label' => 'Telephone number',
                    'type' => 'tel',
                    'autocomplete' => 'tel',
                    'validation' => 'required',
                    'messages' => [
                        'required' => 'Enter their telephone number',
                    ],
                ],
            ]
        ]);
    }
}
