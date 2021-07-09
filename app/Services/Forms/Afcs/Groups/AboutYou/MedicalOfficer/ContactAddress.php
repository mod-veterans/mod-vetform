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
    protected string $_title = 'What is the name and address of your current Medical Officer or GP?';

    public string $summary = '<p class="govuk-body">If you are not registered with a Doctor, please write "Not Registered" in "Building and Street" below.</p>';

    function setQuestions(): void
    {
        $address = new Address($this->namespace, 'their');
        $this->_questions = array_merge([
            [
                'component' => 'hidden-field',
                'options' => [
                    'field' => $this->namespace . '/completed',
                    'value' => 1,
                    'validation' => 'required',
                ],
            ],
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/contact-name',
                    'label' => 'Medical Officer or GP\'s full name (if known)',
                    // 'validation' => 'required',
                    'messages' => [
                        'required' => 'Enter your Medical Officer or GP\'s full name'
                    ],
                    'autocomplete' => 'name'
                ],
            ],
        ], $address->fields(), [
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/contact-number',
                    'label' => 'Telephone number',
                    'type' => 'tel',
                    'autocomplete' => 'tel',
                    // 'validation' => 'required',
                    'messages' => [
                        'required' => 'Enter their telephone number',
                    ],
                ],
            ]
        ]);
    }
}
