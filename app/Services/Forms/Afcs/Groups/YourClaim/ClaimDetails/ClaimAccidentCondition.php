<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;


use App\Services\Constant;
use App\Services\Forms\BasePage;

class ClaimAccidentCondition extends BasePage
{
    protected string $_title = 'Was the Incident/Accident related to Sporting/Adventure Training/Physical Training?';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'radio-group',
                'options' => [
                    'field' => $this->namespace . '/claim-accident-condition',
                    'label' => 'Was the Incident/Accident related to Sporting/Adventure Training/Physical Training?',
                    'hideLabel' => true,
                    'validation' => 'required',
                    'options' => [
                        ['label' => Constant::YES, 'children' => []],
                        ['label' => Constant::NO, 'children' => []],
                    ],
                    'messages' => [
                        'required' => 'Select a condition which applies',
                    ],
                ],
            ]
        ];
    }
}
