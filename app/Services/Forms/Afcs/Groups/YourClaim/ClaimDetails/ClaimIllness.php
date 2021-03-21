<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;


class ClaimIllness extends \App\Services\Forms\BasePage
{
    protected $_title = 'What type of medical condition, injury or illness you are claiming for?';

    function setQuestions(): void
    {
        $this->_questions = [
            [
                'component' => 'radio-group',
                'options' => [
                    'field' => $this->namespace . '/claim-illness',
                    'label' => 'Type of medical condition',
                    'hideLabel' => true,
                    'hint' => 'Select the option that applies to your claim',
                    'validation' => 'required',
                    'options' => [
                        ['label' => 'A condition, injury or illness that is the result of a specific accident or incident', 'children' => []],
                        ['label' => 'A condition, injury or illness that started over a period of time and is not related to a specific incident or accident', 'children' => []],
                    ],
                    'messages' => [
                        'required' => 'A claim option is required',
                    ],
                ],
            ]
        ];
    }
}
