<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;


use App\Services\Forms\BasePage;

class ClaimAccidentNonSportingActivity extends BasePage
{
    protected string $_title = 'What were you doing at the time the incident occurred?';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'radio-group',
                'options' => [
                    'field' => $this->namespace . '/non-sporting-activity',
                    'label' => 'What were you doing at the time the incident occurred?',
                    'hideLabel' => true,
                    'validation' => 'required',
                    'options' => [
                        ['label' => 'Operations Duties overseas', 'children' => []],
                        ['label' => 'Operations Duties UK', 'children' => []],
                        ['label' => 'Home base duties', 'children' => []],
                        ['label' => 'Training Excercise', 'children' => []],
                        ['label' => 'Travelling', 'children' => []],
                    ],
                    'messages' => [
                        'required' => 'Select an option which applies',
                    ],
                ],
            ]
        ];
    }
}
