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
                'component' => 'hidden-field',
                'options' => [
                    'field' => $this->namespace . '/claim-payment-date-year',
                    'validation' => [
                        'required',
                    ],
                    'messages' => [
                        'required' => 'Enter a year, even if it’s approximate',
                    ],
                ],
            ],
            [
                'component' => 'date-field',
                'options' => [
                    'field' => $this->namespace . '/claim-payment-date',
                    'label' => 'When did you receive this payment?',
                    'hideLabel' => true,
                    'hint' => 'For example 27 3 2007. If you can’t remember, enter an approximate year.',
//                    'validation' => 'required|date',
//                    'messages' => [
//                        'required' => 'Enter the payment date',
//                        'date' => 'Enter the payment date',
//                    ],
                ],
            ]
        ];
    }
}
