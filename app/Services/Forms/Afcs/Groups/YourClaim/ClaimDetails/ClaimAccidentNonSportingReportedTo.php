<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;


use App\Services\Constant;
use App\Services\Forms\BasePage;

class ClaimAccidentNonSportingReportedTo extends BasePage
{
    protected string $_title = 'Was the incident reported to the civilian or military police?';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'radio-group',
                'options' => [
                    'field' => $this->namespace . '/non-sporting-reported-to',
                    'label' => 'Was the incident reported to the civilian or military police?',
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
