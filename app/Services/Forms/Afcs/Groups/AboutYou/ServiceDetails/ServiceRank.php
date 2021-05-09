<?php


namespace App\Services\Forms\Afcs\Groups\AboutYou\ServiceDetails;


use App\Services\Forms\BasePage;

class ServiceRank extends BasePage
{
    /**
     * @var string
     */
    protected string $_title = 'What is your rank (if serving) or rank on discharge?';

    function setQuestions(): void
    {
        $this->_questions = [
            0 => [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/service-rank',
                    'label' => 'Service rank',
                    'hideLabel' => true,
                    'validation' => 'required|max:30',
                    'messages' => [
                        'required' => 'Enter the service rank',
                        'max' => 'Full name in service must be 30 characters or fewer'
                    ],
                    'autocomplete' => 'name'
                ],
            ],
        ];
    }
}
