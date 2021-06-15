<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;


use App\Services\Constant;
use App\Services\Forms\BasePage;

class ClaimIllnessDate extends BasePage
{
    protected string $_title = 'What was the date your condition started?';

    function setQuestions(): void
    {
        $this->_questions = [
            0 => [
                'component' => 'date-field',
                'options' => [
                    'field' => $this->namespace . '/date-of-condition',
                    'label' => 'What was the date your condition started',
                    'hint' => 'For example 27 3 2007',
                    'validation' => 'nullable|date',
                    'messages' => [
                        'required' => 'Enter the date your condition started',
                        'date' => 'Enter the date your condition started',
                    ],
                ],
            ],
            1 => [
                'component' => 'checkbox',
                'options' => [
                    'field' => $this->namespace . '/date-of-condition-estimated',
                    'label' => 'Tick if this date is approximate',
                    'value' => Constant::YES
                ],
            ]
        ];
    }
}
