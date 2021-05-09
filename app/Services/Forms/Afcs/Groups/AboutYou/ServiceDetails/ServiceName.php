<?php


namespace App\Services\Forms\Afcs\Groups\AboutYou\ServiceDetails;


use App\Services\Forms\BasePage;

class ServiceName extends BasePage
{
    /**
     * @var string
     */
    protected string $_title = 'What was/is your full name during this period of service?';
    public string $summary = '<p class="govuk-body">If you used more than one name, please include all names you used.</p>
                       <p class="govuk-body">If you do not wish to disclose a name you used, please write &#8216;contact me for details&#8217; and we will get in touch with you to discuss this further if we need to.</p>';

    function setQuestions(): void
    {
        $this->_questions = [
            0 => [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/name-in-service',
                    'label' => 'Enter the full name in service',
                    'hideLabel' => true,
                    'validation' => 'required|max:50',
                    'messages' => [
                        'required' => 'Enter the full name in service',
                        'max' => 'Full name in service must be 50 characters or fewer'
                    ],
                    'autocomplete' => 'name'
                ],
            ],
        ];
    }
}
