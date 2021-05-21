<?php


namespace App\Services\Forms\Afcs\Groups\OtherDetails\OtherCompensation;


use App\Services\Constant;
use App\Services\Forms\BasePage;

class ClaimPaymentType extends BasePage
{
    protected string $_title = 'What type of payment was this?';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'radio-group',
                'options' => [
                    'field' => $this->namespace . '/claim-outcome-payment-type',
                    'label' => 'What type of payment was this?',
                    'hideLabel' => true,
                    'options' => [
                        ['label' => 'Interim settlement', 'children' => []],
                        ['label' => 'Final settlement', 'children' => []],
                    ],
                    'validation' => 'required',
                    'messages' => [
                        'required' => 'Make a selection of the payment type',
                    ],
                ],
            ],

        ];
    }
}
