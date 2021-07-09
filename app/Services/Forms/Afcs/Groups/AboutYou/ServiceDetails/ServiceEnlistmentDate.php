<?php


namespace App\Services\Forms\Afcs\Groups\AboutYou\ServiceDetails;


use App\Services\Forms\BasePage;

class ServiceEnlistmentDate extends BasePage
{
    protected string $_title = 'What was the date of your enlistment?';

    public string $summary = '<p class="govuk-body">Please tell us the date for this period of service.
                       If you can&#39;t remember exactly, include an estimated date even if this is only the year.</p>';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'hidden-field',
                'options' => [
                    'field' => $this->namespace . '/enlistment-date-year',
                    'validation' => [
                        'required',
                    ],
                    'messages' => [
                        'required' => 'Enter a year, even if it’s approximate',
                    ],
                ],
            ],
            [
                'component' => 'date-field',
                'options' => [
                    'field' => $this->namespace . '/enlistment-date',
                    'label' => 'Date of enlistment',
                    'hint' => 'For example 27 3 2007. If you can’t remember, enter an approximate year.',
//                    'validation' => 'required|date',
//                    'messages' => [
//                        'required' => 'Enter your date of enlistment',
//                        'date' => 'Enter your date of enlistment',
//                    ],
                ],
            ],
        ];
    }
}
