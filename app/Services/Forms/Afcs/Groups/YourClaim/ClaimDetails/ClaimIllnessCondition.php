<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;


class ClaimIllnessCondition extends \App\Services\Forms\BasePage
{
    protected $_title = 'What medical condition are you claiming for?';

//    protected $summary = 'Where you have a specific medical diagnosis, please include this here';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/claim-illness-condition',
                    'label' => 'Medical condition claiming',
                    'hideLabel' => true,
                    'hint' => 'Where you have a specific medical diagnosis, please include this here',
                    'validation' => 'required|max:30',
                    'messages' => [
                        'required' => 'Enter a medical condition claim',
                    ],
                ],
            ]
        ];
    }
}
