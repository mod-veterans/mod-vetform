<?php


namespace App\Services\Forms\Afcs\Groups\OtherDetails\OtherCompensation;


use App\Services\Constant;
use App\Services\Forms\BasePage;

class ClaimOutcome extends BasePage
{
    /**
     * @var string
     */
    protected $_id = 'claim-outcome';

    /**
     * @var string
     */
    protected string $_title = 'Who did you claim from and what was the outcome of the claim?';

    /**
     * @inheritdoc
     */
    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'text-area',
                'options' => [
                    'field' => $this->namespace . '/claim-outcome-benefactor',
                    'label' => 'Who did you claim from/amount?',
                    'characterLimit' => 500,
                    'validation' => 'required',
                    'messages' => [
                        'required' => 'Enter who you claimed from and the outcome',
                    ],
                ],
            ],

            [
                'component' => 'radio-group',
                'options' => [
                    'field' => $this->namespace . '/claim-outcome-payment-result',
                    'label' => 'Did you receive a payment as a result of this claim?',
                    'validation' => 'required',
                    'options' => [
                        ['label' => Constant::YES, 'children' => []],
                        ['label' => Constant::NO, 'children' => []],
                    ],
                    'messages' => [
                        'required' => 'Make a selection if you received a payment as a result of this claim',
                    ],
                ],
            ],

        ];
    }
}
