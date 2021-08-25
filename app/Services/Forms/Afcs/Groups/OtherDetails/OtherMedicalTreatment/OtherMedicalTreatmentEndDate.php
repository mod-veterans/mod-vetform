<?php


namespace App\Services\Forms\Afcs\Groups\OtherDetails\OtherMedicalTreatment;


class OtherMedicalTreatmentEndDate extends \App\Services\Forms\BasePage
{
    protected string $_title = 'When did this treatment end?';

    public string $summary = '<p class="govuk-body">Please tell us the end date for this period of treatment.
                              If it hasn\'t yet ended, tick "This treatment has not yet ended"</p>';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'hidden-field',
                'options' => [
                    'field' => $this->namespace . '/medical-treatment-ended-completed',
                    'value' => 1,
                    'validation' => 'required',
                ],
            ],

            [
                'component' => 'hidden-field',
                'options' => [
                    'field' => $this->namespace . '/medical-treatment-end-date-year',
                        'validation' => [
                            'required_unless:'.$this->namespace . '/medical-treatment-not-ended'.',This treatment has not yet ended',
                            'max:' . date('Y'),
                        ],
                        'messages' => [
                            'required_unless' => 'Enter a year, even if it’s approximate',
                        ],
                ],
            ],
            [
                'component' => 'date-field',
                'options' => [
                    'field' => $this->namespace . '/medical-treatment-end-date',
                    'label' => 'Date your treatment ended',
                    'hideLabel' => true,
                    'hint' => 'For example 27 3 2007. If you are not sure, just enter a year.',
                    // 'validation' => 'nullable|date|before:today',
                    'messages' => [
                        'required' => 'Enter the date your treatment ended',
                        'date' => 'Enter the date your treatment ended',
                    ],
                ],
            ],
            [
                'component' => 'checkbox',
                'options' => [
                    'field' => $this->namespace . '/medical-treatment-end-date-estimated',
                    'label' => 'This date is approximate',
                ],
            ],
            [
                'component' => 'checkbox',
                'options' => [
                    'field' => $this->namespace . '/medical-treatment-not-ended',
                    'label' => 'This treatment has not yet ended'
                ],
            ]
        ];
    }
}
