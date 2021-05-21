<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;


use App\Services\Constant;
use App\Services\Forms\BasePage;

class ClaimAccidentNonSportingForm extends BasePage
{
    protected string $_title = 'Was an accident form completed?';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'radio-group',
                'options' => [
                    'field' => $this->namespace . '/non-sporting-form',
                    'label' => 'Was an accident form completed?',
                    'hideLabel' => true,
                    'validation' => 'required',
                    'options' => [
                        ['label' => Constant::YES .
                            ' [Please send us a copy if you have one or you can upload a copy later in this application]',
                            'value' => Constant::YES, 'children' => []],
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
