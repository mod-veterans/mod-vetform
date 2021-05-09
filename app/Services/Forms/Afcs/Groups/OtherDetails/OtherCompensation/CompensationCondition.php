<?php


namespace App\Services\Forms\Afcs\Groups\OtherDetails\OtherCompensation;


class CompensationCondition extends \App\Services\Forms\BasePage
{
    /**
     * @var string
     */
    protected $_id = 'compensation-condition';

    /**
     * @var string
     */
    protected string $_title = 'What medical condition(s) have you received (or are you claiming) other compensation for?';

    /**
     * @inheritdoc
     */
    function setQuestions(): void
    {
        $this->questions = [
            0 => [
                'component' => 'text-area',
                'options' => [
                    'field' => $this->namespace . '/medical-condition',
                    'label' => 'What medical condition(s) have you received (or are you claiming) other compensation for?',
                    'characterLimit' => 500,
                    'validation' => 'required',
                    'messages' => [
                        'required' => 'Enter your medical conditions',
                    ],
                ],
            ],
        ];
    }
}
