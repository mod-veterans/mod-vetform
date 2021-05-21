<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;


use App\Services\Forms\BasePage;

class ClaimHospitalRecord extends BasePage
{
    protected string $_title = 'What is the hospital record number?';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/claim-hospital-record',
                    'label' => 'What is the hospital record number?',
                    'hideLabel' => true,
                    'validation' => 'required|max:40',
                    'messages' => [
                        'required' => 'Enter the hospital record number',
                        'max' => 'Hospital record number too long',
                    ],
                ],
            ]
        ];
    }
}
