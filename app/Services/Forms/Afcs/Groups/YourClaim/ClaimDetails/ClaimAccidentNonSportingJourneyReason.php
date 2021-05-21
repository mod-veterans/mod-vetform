<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;


use App\Services\Constant;
use App\Services\Forms\BasePage;

class ClaimAccidentNonSportingJourneyReason extends BasePage
{
    protected string $_title = 'What was the reason for your journey?';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'radio-group',
                'options' => [
                    'field' => $this->namespace . '/non-sporting-journey-reason',
                    'label' => 'Was an accident form completed?',
                    'hideLabel' => true,
                    'validation' => 'required',
                    'options' => [
                        ['label' => 'Duties - Operations', 'children' => []],
                        ['label' => 'Duties - Trade', 'children' => []],
                        ['label' => 'Duties - Training', 'children' => []],
                        ['label' => 'Personal (non-duty/off-duty)', 'children' => []],
                    ],
                    'messages' => [
                        'required' => 'Select an option which applies',
                    ],
                ],
            ]
        ];
    }
}
