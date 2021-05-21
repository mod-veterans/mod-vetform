<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;


use App\Services\Forms\BasePage;

class ClaimIllnessCondition extends BasePage
{
    protected string $_title = 'What medical condition are you claiming for?';

//    protected $summary = 'Where you have a specific medical diagnosis, please include this here';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/claim-illness-claiming-for',
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
