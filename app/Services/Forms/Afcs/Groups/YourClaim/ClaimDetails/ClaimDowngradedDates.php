<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;


use App\Services\Forms\BasePage;

class ClaimDowngradedDates extends BasePage
{
    protected string $_title = 'When were you downgraded?';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'hidden-field',
                'options' => [
                    'field' => $this->namespace . '/date-from-year',
                    'validation' => [
                        'required',
                        'max:' . date('Y'),
                    ],
                    'messages' => [
                        'required' => 'Enter a date from year, even if it’s approximate',
                    ],
                ],
            ],
            [
                'component' => 'date-field',
                'options' => [
                    'field' => $this->namespace . '/date-from',
                    'label' => 'Date from',
                    'hint' => 'For example 27 3 2007. If you can’t remember, enter an approximate year.',
                    // 'validation' => 'required|date|before:today',
                    'messages' => [
                        'required' => 'Enter the date your illness was downgraded from',
                        'date' => 'Enter the date your illness was downgraded from',
                    ],
                ],
            ],
            [
                'component' => 'hidden-field',
                'options' => [
                    'field' => $this->namespace . '/date-to-year',
                    'validation' => [
                        'required',
                        'max:' . date('Y'),
                    ],
                    'messages' => [
                        'required' => 'Enter a date to year, even if it’s approximate',
                    ],
                ],
            ],
            [
                'component' => 'date-field',
                'options' => [
                    'field' => $this->namespace . '/date-to',
                    'label' => 'Date to',
                    'hint' => 'For example 27 3 2007. If you can’t remember, enter an approximate year.',
                    // 'validation' => 'required|date|before:today',
                    'messages' => [
                        'required' => 'Enter the date your illness was downgraded to',
                        'date' => 'Enter the date your illness was downgraded to',
                    ],
                ],
            ],
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/from-medical-category',
                    'label' => 'From Medical Category',
                    'validation' => 'required|max:20',
                    'messages' => [
                        'required' => 'Enter the medical category from',
                        'max' => 'Medical category from must not exceed 50 characters',
                    ],
                ],
            ],
             [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/to-medical-category',
                    'label' => 'To Medical Category',
                    'validation' => 'required|max:20',
                    'messages' => [
                        'required' => 'Enter the medical category to',
                        'max' => 'Medical category to must not exceed 50 characters',
                    ],
                ],
            ]
        ];
    }
}
