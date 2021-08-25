<?php


namespace App\Services\Forms\Afcs\Groups\NominateRepresentative\Applicant;


use App\Services\Constant;
use App\Services\Forms\BasePage;

class HelperDetails extends BasePage
{
    protected string $_title = 'What is your name?';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/helper-name',
                    'label' => 'Name of assistant making this claim',
                    'hideLabel' => true,
                    'characterLimit' => 100,
                    'validation' => 'required|max:100',
                    'autocomplete' => 'name',
                    'messages' => [
                        'required' => 'Enter your full name',
                    ],
                ],
            ],
        ];
    }
}
