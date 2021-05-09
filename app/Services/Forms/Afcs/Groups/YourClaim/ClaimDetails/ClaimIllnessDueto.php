<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;


class ClaimIllnessDueto extends \App\Services\Forms\BasePage
{
    protected string $_title = 'Is your condition due to exposure to?';

    function setQuestions(): void
    {
        $this->_questions = [
            0 => [
                'component' => 'checkbox-group',
                'options' => [
                    'field' => $this->namespace . '/claim-illness-due-to',
                    'hint' => 'Select all that apply.',
                    'options' => [
                        ['label' => "Cold", 'children' => []],
                        ['label' => "Heat", 'children' => []],
                        ['label' => "Noise", 'children' => []],
                        ['label' => "Vibration", 'children' => []],
                    ]
                ],
            ],
        ];
    }
}
