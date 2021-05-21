<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;


use App\Services\Constant;
use App\Services\Forms\BasePage;

class ClaimAccidentSportingAuthorise extends BasePage
{
    protected string $_title = 'Were you representing your Unit?';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'radio-group',
                'options' => [
                    'field' => $this->namespace . '/sporting-authorise',
                    'label' => 'Were you representing your Unit?',
                    'hideLabel' => true,
                    'validation' => 'required',
                    'options' => [
                        ['label' => Constant::YES . ' (Please send us copies of part 1 orders/admin instructions/authorisation. You can upload a copy later in the application)',
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
