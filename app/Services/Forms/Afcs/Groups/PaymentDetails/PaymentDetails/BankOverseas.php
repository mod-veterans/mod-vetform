<?php


namespace App\Services\Forms\Afcs\Groups\PaymentDetails\PaymentDetails;


class BankOverseas extends \App\Services\Forms\BasePage
{
    protected string $_title = 'Overseas bank account details';

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
                    'hint' => 'Can be up to 10 digits',
                    'type' => 'numeric',
                    'validation' => 'required|numeric',
                    'messages' => [
                        'required' => 'Enter the sort code',
                        'numeric' => 'Sort code must be numeric'
                    ],
                ],
            ],
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/bank-account-number',
                    'label' => 'Account number',
                    'hint' => 'Can be up to 18 digits',
                    'type' => 'numeric',
                    'validation' => 'required|numeric',
                    'messages' => [
                        'required' => 'Enter the account number',
                        'numeric' => 'Account number must be numeric'
                    ],
                ],
            ],
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/bank-account-iban',
                    'label' => 'International Bank Account Number (IBAN)',
                    'type' => 'numeric',
                    'validation' => 'required|max:20',
                    'messages' => [
                        'required' => 'Enter your IBAN Number',
                        'max' => 'IBAN number must be between 1 and 20 characters'
                    ]
                ],
            ],
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/bank-account-bic',
                    'label' => 'Bank Identifier Code (BIC)',
                    'type' => 'numeric',
                    'validation' => 'required|max:20',
                    'messages' => [
                        'required' => 'Enter your BIC Number',
                        'max' => 'BIC number must be between 1 and 20 characters'
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
