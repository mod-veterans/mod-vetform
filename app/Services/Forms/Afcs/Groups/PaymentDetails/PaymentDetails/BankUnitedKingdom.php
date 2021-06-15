<?php


namespace App\Services\Forms\Afcs\Groups\PaymentDetails\PaymentDetails;


use App\Services\Forms\BasePage;

class BankUnitedKingdom extends BasePage
{
    protected string $_title = 'UK bank or building society account details';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/bank-account-name',
                    'label' => 'Name on the account',
                    'autocomplete' => 'name',
                    'validation' => 'required|string|max:50',
                    'messages' => [
                        'required' => 'Enter the name on the account',
                        'max' => 'Name must be 50 characters or fewer'
                    ],
                ],
            ],
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/bank-account-sort-code',
                    'label' => 'Sort code',
                    'hint' => 'Must be 6 digits',
                    'type' => 'numeric',
                    'validation' => 'required',
                    'messages' => [
                        'required' => 'Enter the sort code',
                    ],
                ],
            ],
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/bank-account-number',
                    'label' => 'Account number',
                    'type' => 'numeric',
                    'validation' => 'required',
                    'messages' => [
                        'required' => 'Enter the account number',
                    ],
                ],
            ],
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/bank-account-roll-number',
                    'label' => 'Building society roll number',
                    'hint' => 'You can find it on your card, statement or passbook.',
                    'type' => 'numeric',
                    'validation' => 'max:20',
                    'messages' => [
                        'max' => 'Building society roll number must be between 1 and 20 characters'
                    ]
                ],
            ],
            [
                'component' => 'text-area',
                'options' => [
                    'field' => $this->namespace . '/bank-account-confirmation',
                    'label' => 'If this is not your bank account, please tell us whose account it is and why you have chosen this account',
                    'characterLimit' => '100',
                ],
            ],
        ];
    }
}
