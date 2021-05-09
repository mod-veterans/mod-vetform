<?php


namespace App\Services\Forms\Afcs\Groups\AboutYou\ServiceDetails;


use App\Services\Forms\BasePage;

class ServiceTrade extends BasePage
{
    /**
     * @var string
     */
    protected string $_title = 'What was/is your trade or specialism?';

    function setQuestions(): void
    {
        $this->_questions = [
            0 => [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/service-trade',
                    'label' => 'Service trade',
                    'hideLabel' => true,
                    'validation' => 'required|max:30',
                    'messages' => [
                        'required' => 'Enter the service trade',
                        'max' => 'Full name in service must be 30 characters or fewer'
                    ],
                    'autocomplete' => 'name'
                ],
            ],
        ];
    }
}
