<?php


namespace App\Services\Forms\Afcs\Groups\OtherDetails\OtherCompensation;


use App\Services\Forms\BasePage;

class OtherPaymentReceived extends BasePage
{
    protected string $_title = 'Please tell us the amount of any payment you received';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/amount-paid',
                    'label' => 'Amount paid',
                    'validation' => 'required|max:20',
                    'messages' => [
                        'required' => 'Enter the amount paid'
                    ]
                ],
            ]
        ];
    }
}
