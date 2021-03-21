<?php


namespace App\Services\Forms\Afcs\Groups\AboutYou\PersonalDetails;


use App\Services\Forms\BasePage;

class NationalInsurance extends BasePage
{
    protected $_title = 'What is your National Insurance number?';

    function setQuestions(): void
    {
        $this->_questions = [
            0 => [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/ni-number',
                    'label' => 'NI Number',
                    'hideLabel' => true,
                    'hint' => ' It’s on your National Insurance card, benefit letter, payslip or P60. For example, ‘QQ 12 34 56 C’.s',
                    'spellcheck'=> 'false',
                    'validation' => 'required',
                    'messages' => [
                        'required' => 'Enter your national insurance number',
                        'ni_number' => 'Enter a national insurance number in the correct format',
                    ],
                ],
            ],
        ];
    }
}
