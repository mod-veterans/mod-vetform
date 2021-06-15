<?php


namespace App\Services\Forms\Afcs\Groups\AboutYou\ServiceDetails;


use App\Services\Constant;
use App\Services\Forms\BasePage;

class ServiceDischarge extends BasePage
{
    protected string $_title = 'What was the date of and reason for your discharge?';
    public string $summary = '<p class="govuk-body">Please tell us the date (if you are no longer serving) you left this period
                        of service. If you can&#39;t remember exactly, include an estimated date even if this is only
                        the year.</p>';

    function setQuestions(): void
    {
        $this->_questions = [
            0 => [
                'component' => 'checkbox',
                'options' => [
                    'field' => $this->namespace . '/service-is-serving',
                    'label' => 'I am still serving',
                    'value' => Constant::YES
                ],
            ],
            1 => [
                'component' => 'date-field',
                'options' => [
                    'field' => $this->namespace . '/date-of-discharge',
                    'label' => 'Date of discharge',
                    'hint' => 'For example 27 3 2007',
                    'validation' => 'required_if:'.$this->namespace . '/service-is-serving'.',' . Constant::NO .  '|date',
                    'messages' => [
                        'required_if' => 'Enter the date your service discharge',
                        'date' => 'Enter the date your service discharge',
                    ],
                ],
            ],
            2 => [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/service-discharge-reason',
                    'label' => 'Discharge reason',
                    'validation' => 'max:40',
                    'messages' => [
                        'max' => 'Discharge reason must be 40 characters or fewer'
                    ],
                ],
            ]
        ];
    }
}
