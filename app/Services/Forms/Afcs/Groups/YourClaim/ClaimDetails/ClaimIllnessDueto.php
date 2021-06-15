<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;


use App\Services\Forms\BasePage;

class ClaimIllnessDueto extends BasePage
{
    protected string $_title = 'Is your condition due to exposure to?';

    function setQuestions(): void
    {
        $this->_questions = [
            0 => [
                'component' => 'checkbox-group',
                'options' => [
                    'field' => $this->namespace . '/claim-illness-due-to',
                    'label' => 'Is your condition due to exposure to?',
                    'hideLabel' => true,
                    'hint' => 'Select all that apply.',
                    'validation' => 'required',
                    'message' => [
                        'require' => 'Select an option which applies to you'
                    ],
                    'options' => [
                        ['label' => "Cold", 'children' => []],
                        ['label' => "Heat", 'children' => []],
                        ['label' => "Noise", 'children' => []],
                        ['label' => "Vibration", 'children' => []],
                        ['label' => "Chemical exposure", 'children' => []],
                        ['label' => "None of the above", 'children' => []],
                    ]
                ],
            ],
        ];
    }
}
