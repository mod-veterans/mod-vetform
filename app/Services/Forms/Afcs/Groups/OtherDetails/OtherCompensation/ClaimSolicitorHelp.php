<?php


namespace App\Services\Forms\Afcs\Groups\OtherDetails\OtherCompensation;


use App\Services\Constant;
use App\Services\Forms\BasePage;

class ClaimSolicitorHelp extends BasePage
{
    protected string $_title = 'Did a solicitor help you with your claim for other compensation?';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'radio-group',
                'options' => [
                    'field' => $this->namespace . '/claim-solicitor-help',
                    'label' => 'Did a solicitor help you with your claim for other compensation?',
                    'validation' => 'required',
                    'options' => [
                        ['label' => Constant::YES, 'children' => []],
                        ['label' => Constant::NO, 'children' => []],
                    ],
                    'messages' => [
                        'required' => 'Make a selection if a solicitor helped in your claim',
                    ],
                ],
            ]
        ];
    }
}
