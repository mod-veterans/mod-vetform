<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;


use App\Services\Constant;
use App\Services\Forms\BasePage;

class ClaimOtherTreatment extends BasePage
{
    protected string $_title = 'Are you waiting for or have you received any other type of treatment for this claim, condition or illness?';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'radio-group',
                'options' => [
                    'field' => $this->namespace . '/claim-other-treatment',
                    'label' => 'Are you waiting for or have you received any other type of treatment for this claim, condition or illness?',
                    'hideLabel' => true,
                    'validation' => 'required',
                    'options' => [
                        ['label' => Constant::YES, 'children' => []],
                        ['label' => Constant::NO, 'children' => []],
                    ],
                    'messages' => [
                        'required' => 'Select an option which applies',
                    ],
                ],
            ]
        ];
    }
}
