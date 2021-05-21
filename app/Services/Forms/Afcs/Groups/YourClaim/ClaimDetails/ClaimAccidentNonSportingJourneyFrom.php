<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;


use App\Services\Constant;
use App\Services\Forms\BasePage;

class ClaimAccidentNonSportingJourneyFrom extends BasePage
{
    protected string $_title = 'Where did your journey start?';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'radio-group',
                'options' => [
                    'field' => $this->namespace . '/non-sporting-journey-from',
                    'label' => 'Where did your journey start?',
                    'hideLabel' => true,
                    'validation' => 'required',
                    'options' => [
                        ['label' => 'Operations location overseas', 'children' => []],
                        ['label' => 'Operations location - UK', 'children' => []],
                        ['label' => 'Accommodation - field', 'children' => []],
                        ['label' => 'Accommodation - base', 'children' => []],
                        ['label' => 'Home base', 'children' => []],
                        ['label' => 'Your home', 'children' => []],
                        ['label' => 'An off-duty location', 'children' => []],
                    ],
                    'messages' => [
                        'required' => 'Select an option which applies',
                    ],
                ],
            ]
        ];
    }
}
