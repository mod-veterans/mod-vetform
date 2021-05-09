<?php


namespace App\Services\Forms\Afcs\Groups\OtherDetails\OtherCompensation;


class ClaimOutcome extends \App\Services\Forms\BasePage
{
    /**
     * @var string
     */
    protected $_id = 'claim-outcome';

    /**
     * @var string
     */
    protected string $_title = 'Please include any reference numbers you have.';

    /**
     * @inheritdoc
     */
    function setQuestions(): void
    {
        $this->questions = [
            [
                'component' => 'radio-group',
                'options' => [
                    'field' => $this->namespace . '/claim-from',
                    'label' => 'Did you receive a payment as a result of this claim?',
                    'validation' => 'required',
                    'options' => [
                        ['label' => 'Yes', 'children' => []],
                        ['label' => 'No', 'children' => []],
                    ],
                    'messages' => [
                        'required' => 'Make a selection',
                    ],
                ],
            ],
            [
                'component' => 'text-area',
                'options' => [
                    'field' => $this->namespace . '/medical-condition',
                    'label' => 'Who did you claim from and what was the outcome of the claim?',
                    'characterLimit' => 500,
                    'validation' => 'required',
                    'messages' => [
                        'required' => 'Enter your medical conditions',
                    ],
                ],
            ]
        ];
    }
}
