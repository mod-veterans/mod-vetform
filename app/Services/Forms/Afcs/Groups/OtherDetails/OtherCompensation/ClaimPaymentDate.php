<?php


namespace App\Services\Forms\Afcs\Groups\OtherDetails\OtherCompensation;


use App\Services\Forms\BasePage;

class ClaimPaymentDate extends BasePage
{

    protected string $_title = 'When did you receive this payment?';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'date-field',
                'options' => [
                    'field' => $this->namespace . '/claim-payment-date',
                    'label' => 'When did you receive this payment?',
                    'hideLabel' => true,
                    'hint' => 'For example 27 3 2007',
                    'validation' => 'required|date',
                    'messages' => [
                        'required' => 'Enter the payment date',
                        'date' => 'Enter the payment date',
                    ],
                ],
            ]
        ];
    }
}
