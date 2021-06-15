<?php


namespace App\Services\Forms\Afcs\Groups\AboutYou\PersonalDetails;


use App\Services\Forms\BasePage;

class ContactNumber extends BasePage
{
    protected string $_title = 'What is your telephone number?';

    public string $summary= '<p>We\'ll use this to contact you if we have any questions about your claim</p>';

    function setQuestions(): void
    {
        $this->_questions = [
            0 => [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/mobile-number',
                    'label' => 'Mobile telephone number',
                    'hint' => 'For overseas numbers include the country code',
                    'type' => 'tel',
                    'autocomplete' => 'tel',
                ],
            ],
            2 => [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/alternative-number',
                    'label' => 'Alternative telephone number',
                    'hint' => 'For overseas numbers include the country code',
                    'type' => 'tel',
                    'autocomplete' => 'tel'
                ],
            ],
        ];
    }
}
