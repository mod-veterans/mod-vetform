<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;


use App\Services\Forms\BasePage;

class ClaimAccidentNonSportingReportTo extends BasePage
{
    protected string $_title = 'Who did you report the incident to?';

    function setQuestions(): void
    {
        $this->_questions = [
            0 => [
                'component' => 'checkbox-group',
                'options' => [
                    'field' => $this->namespace . '/claim-accident-non-sporting-report-to',
                    'label' => 'Who did you report the incident to?',
                    'hint' => 'Select all that apply.',
                    'options' => [
                        ['label' => "Unit medic", 'children' => []],
                        ['label' => "Hospital", 'children' => []],
                        ['label' => "Chain of command", 'children' => []],
                        ['label' => "Colleague", 'children' => []],
                        ['label' => "Other person", 'children' => []],
                        ['label' => "I didn't report the incident", 'children' => []],
                    ]
                ],
            ],
        ];
    }
}
