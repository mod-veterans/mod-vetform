<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;


use App\Services\Constant;
use App\Services\Forms\BasePage;

class ClaimIllnessConditionChemicalExposure extends BasePage
{
    protected string $_title = 'Please tell us about the chemical exposure?';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/what-substances',
                    'label' => 'What substances?',
                    'validation' => 'required|max:50',
                    'messages' => [
                        'required' => 'Enter the substance exposed to',
                        'max' => 'Enter a maximum 50 characters for the substance exposed to',
                    ],
                ],
            ],
            [
                'component' => 'date-field',
                'options' => [
                    'field' => $this->namespace . '/exposure-date',
                    'label' => 'Date you were first exposed to these?',
                    'hint' => 'If unknown give approx date. For example, 27 3 2007',
                    'validation' => 'nullable|date',
                    'messages' => [
                        'date' => 'Enter the date your were exposed to the substance',
                    ],
                ],
            ],
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/exposure-duration',
                    'label' => 'Length of exposure',
                    'validation' => 'required|max:50',
                    'messages' => [
                        'required' => 'Enter the length of exposure',
                        'max' => 'Enter a maximum 50 characters for the length of exposure',
                    ],
                ],
            ]
        ];
    }
}
