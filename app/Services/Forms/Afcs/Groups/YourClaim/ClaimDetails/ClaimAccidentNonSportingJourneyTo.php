<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;


use App\Services\Constant;
use App\Services\Forms\BasePage;

class ClaimAccidentNonSportingJourneyTo extends BasePage
{
    protected string $_title = 'Where were you travelling to?';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'radio-group',
                'options' => [
                    'field' => $this->namespace . '/non-sporting-journey-to',
                    'label' => 'Where were you travelling to?',
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
