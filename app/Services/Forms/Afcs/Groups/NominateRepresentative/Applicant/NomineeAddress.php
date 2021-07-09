<?php


namespace App\Services\Forms\Afcs\Groups\NominateRepresentative\Applicant;


use App\Services\Forms\BasePage;
use App\Services\Patterns\Address;

class NomineeAddress extends BasePage
{
    protected string $_title = 'What are your own details?';

    public string $summary =
        '<p class="govuk-body">You have told us you are making this claim on behalf of someone else.
            Please provide your own details and tell us why you are applying on their behalf.</p>';

    function setQuestions(): void
    {
        $address = new Address($this->namespace, 'your', true);
        $this->_questions = array_merge([
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/nominee-name',
                    'label' => 'Your full name',
                    'validation' => 'required',
                    'messages' => [
                        'required' => 'Enter your full name'
                    ],
                    'autocomplete' => 'name'
                ],
            ]
        ], $address->fields(), [
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/nominee-number',
                    'label' => 'Telephone number',
                    'type' => 'tel',
                    'autocomplete' => 'tel',
                    //'validation' => 'required',
                    'messages' => [
                        'required' => 'Enter your telephone number',
                    ],
                ],
            ],
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/nominee-email-address',
                    'label' => 'Email address',
                    'type' => 'email',
                    'autocomplete' => 'email',
                    // 'validation' => 'required',
                    'messages' => [
                        'required' => 'Enter an email address in the correct format, like name@example.com',
                    ],
                ],
            ]
        ]);
    }
}
