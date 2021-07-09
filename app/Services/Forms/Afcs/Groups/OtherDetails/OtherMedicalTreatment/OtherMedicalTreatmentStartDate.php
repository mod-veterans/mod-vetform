<?php


namespace App\Services\Forms\Afcs\Groups\OtherDetails\OtherMedicalTreatment;


use App\Services\Constant;

class OtherMedicalTreatmentStartDate extends \App\Services\Forms\BasePage
{
    protected string $_title = 'When did this treatment start?';

    public string $summary = '<p class="govuk-body">If you have received treatment at this hospital medical facility on
                              more than one occasion, please tell us the first time you visited</p>';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'hidden-field',
                'options' => [
                    'field' => $this->namespace . '/medical-treatment-start-completed',
                    'value' => 1,
                    'validation' => 'required',
                ],
            ],

            [
                'component' => 'hidden-field',
                'options' => [
                    'field' => $this->namespace . '/medical-treatment-start-date-year',
                    'validation' => [
                        'required_unless:'.$this->namespace . '/medical-treatment-start-date-waiting-list'.',I am still on a waiting list to attend',
                    ],
                    'messages' => [
                        'required_unless' => 'Enter a year, even if it’s approximate',
                    ],
                ],
            ],
            [
                'component' => 'date-field',
                'options' => [
                    'field' => $this->namespace . '/medical-treatment-start-date',
                    'label' => 'Date your treatment started. If you are not sure, just enter a year.',
                    'hideLabel' => true,
                    'hint' => 'For example 27 3 2007. If you can’t remember, enter an approximate year.',
                   // 'validation' => 'nullable|date|before:today',
                    'messages' => [
                        'date' => 'Enter the date your treatment started',
                        'before' => 'Enter a date before today'
                    ],
                ],
            ],
            [
                'component' => 'checkbox',
                'options' => [
                    'field' => $this->namespace . '/medical-treatment-start-date-estimated',
                    'label' => 'This date is approximate',
                ],
            ],
            [
                'component' => 'checkbox',
                'options' => [
                    'field' => $this->namespace . '/medical-treatment-start-date-waiting-list',
                    'label' => 'I am still on a waiting list to attend'
                ],
            ]
        ];
    }
}
