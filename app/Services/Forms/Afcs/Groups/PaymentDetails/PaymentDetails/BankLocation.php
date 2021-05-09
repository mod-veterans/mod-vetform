<?php


namespace App\Services\Forms\Afcs\Groups\PaymentDetails\PaymentDetails;


use App\Services\Constant;

class BankLocation extends \App\Services\Forms\BasePage
{
    protected string $_title = 'Where is your bank account located?';

    function setQuestions(): void
    {
        $this->_questions = [
            0 => [
                'component' => 'radio-group',
                'options' => [
                    'field' => $this->namespace . '/bank-location',
                    'label' => 'Do you wish to provide your bank account details?',
                    'hideLabel' => true,
                    'validation' => 'required',
                    'options' => [
                        ['label' => 'In the United Kingdom', 'children' => []],
                        ['label' => 'Overseas', 'children' => []],
                    ],
                    'messages' => [
                        'required' => 'Select if you wish to provide bank account details',
                    ],
                ],
            ],
        ];
    }
}
