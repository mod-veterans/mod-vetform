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
            [
                'component' => 'hidden-field',
                'options' => [
                    'field' => $this->namespace . '/date-of-condition-year',
                    'validation' => [
                        'required',
                        'max:' . date('Y'),
                    ],
                    'messages' => [
                        'required' => 'Enter a year, even if it’s approximate',
                    ],
                ],
            ],
            [
                'component' => 'date-field',
                'options' => [
                    'field' => $this->namespace . '/date-of-condition',
                    'label' => 'What was the date your condition started',
                    'hint' => 'For example 27 3 2007. If you can’t remember, enter an approximate year.',
                    // 'validation' => 'nullable|date',
                    'messages' => [
                        'required' => 'Enter the date your condition started',
                        'date' => 'Enter the date your condition started',
                    ],
                ],
            ],
             [
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
