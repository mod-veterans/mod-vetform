<?php


namespace App\Services\Forms\Afcs\Groups\AboutYou\PersonalDetails;


use App\Services\Forms\BasePage;

class EmailAddress extends BasePage
{
    protected string $_title = 'What is your Email address';

    public string $summary = '
    <p class="govuk-body">
Please tell us the email address you would prefer us to contact you at.  We will only use this to get in touch about your claim.
    </p>
    ';

    function setQuestions(): void
    {
        $this->_questions = [
            0 => [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/email-address',
                    'label' => 'What is your email address',
                    'hideLabel' => true,
                    'hint' => 'We will send confirmation of your claim to this address',
                    'type' => 'email',
                    'autocomplete' => 'email',
                    'validation' => 'required',
                    'messages' => [
                        'required' => 'Enter an email address in the correct format, like name@example.com',
                    ],
                ],
            ],
        ];
    }
}
