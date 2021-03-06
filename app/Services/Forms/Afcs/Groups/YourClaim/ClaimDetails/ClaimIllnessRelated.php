<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;


use App\Services\Forms\BasePage;

class ClaimIllnessRelated extends BasePage
{
    protected string $_title = 'What is your Illness/Condition related to?';

    function setQuestions(): void
    {
        $this->_questions = [
            0 => [
                'component' => 'checkbox-group',
                'options' => [
                    'field' => $this->namespace . '/claim-illness-related',
                    'label' => 'What is your Illness/Condition related to?',
                    'hideLabel' => true,
                    'hint' => 'Select all that apply.',
                    'options' => [
                        ['label' => "Duties - Operations overseas", 'children' => []],
                        ['label' => "Duties - Operations UK", 'children' => []],
                        ['label' => "Trade", 'children' => []],
                        ['label' => "Training", 'children' => []],
                        ['label' => "Misconduct by others", 'children' => []],
                        ['label' => "Consequential to another medical condition", 'children' => []]
                    ]
                ],
            ],
        ];
    }
}
