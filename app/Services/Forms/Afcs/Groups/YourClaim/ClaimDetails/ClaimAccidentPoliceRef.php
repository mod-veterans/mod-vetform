<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;


use App\Services\Constant;
use App\Services\Forms\BasePage;

class ClaimAccidentPoliceRef extends BasePage
{
    protected string $_title = 'Please tell us the Police reference number (if known)';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/claim-accident-non-sporting-police-ref',
                    'label' => 'Civilian - case ref'
                ],
            ],
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/claim-accident-non-sporting-military-ref',
                    'label' => 'Military - case ref'
                ],
            ],
            [
                'component' => 'checkbox',
                'options' => [
                    'field' => $this->namespace . '/claim-accident-non-sporting-ref-unknown',
                    'label' => 'I don\'t know',
                    'value' => Constant::YES
                ],
            ]
        ];
    }
}
