<?php


namespace App\Services\Forms\VetId\Groups\Service\Branch;


use App\Services\Forms\BasePage;

class ServiceBranch extends BasePage
{
    protected string $_title = 'Select your service branch';

    function setQuestions(): void
    {
        $this->_questions = [
            0 => [
                'component' => 'radio-group',
                'options' => [
                    'field' => $this->namespace . '/service-branch',
                    'label' => 'Select your service branch',
                    'hideLabel' => true,
                    'validation' => 'required',
                    'options' => [
                        ['label' => 'Royal Navy', 'children' => []],
                        ['label' => 'Army', 'children' => []],
                        ['label' => 'Royal Air Force', 'children' => []],
                        ['label' => 'Royal Marines', 'children' => []],
                    ],
                    'messages' => [
                        'required' => 'Select your service branch',
                    ],
                ],
            ],
        ];
    }
}
