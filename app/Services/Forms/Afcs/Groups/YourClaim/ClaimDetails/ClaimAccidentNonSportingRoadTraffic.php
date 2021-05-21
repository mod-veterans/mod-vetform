<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;


use App\Services\Constant;
use App\Services\Forms\BasePage;

class ClaimAccidentNonSportingRoadTraffic extends BasePage
{
    protected string $_title = 'Were you on duty at the time of incident?';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'radio-group',
                'options' => [
                    'field' => $this->namespace . '/non-sporting-duty',
                    'label' => 'Were you on duty at the time of incident?',
                    'hideLabel' => true,
                    'validation' => 'required',
                    'options' => [
                        ['label' => Constant::YES , 'children' => []],
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
