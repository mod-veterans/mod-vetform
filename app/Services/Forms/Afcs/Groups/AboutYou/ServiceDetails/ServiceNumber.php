<?php


namespace App\Services\Forms\Afcs\Groups\AboutYou\ServiceDetails;


use App\Services\Forms\BasePage;

class ServiceNumber extends BasePage
{
    /**
     * @var string
     */
    protected string $_title = 'What is your service number?';
    public string $summary = '<p class="govuk-body">Please tell us the service number you had for this period of service.</p>';


    function setQuestions(): void
    {
        $this->_questions = [
            0 => [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/service-number',
                    'label' => 'Enter the service number',
                    'hideLabel' => true,
                    'validation' => 'required|max:20',
                    'messages' => [
                        'required' => 'Enter the service number',
                        'max' => 'Full name in service must be 20 characters or fewer'
                    ],
                    'autocomplete' => 'name'
                ],
            ],
        ];
    }
}
