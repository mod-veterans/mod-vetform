<?php


namespace App\Services\Forms\Afcs\Groups\AboutYou\PersonalDetails;


use App\Services\Forms\BasePage;
use App\Services\Patterns\Address;

class ContactAddress extends BasePage
{
    /**
     * @var string
     */
    protected string $_title = 'What is your contact address?';

    /**
     * @var string
     */
    public string $summary = '<p class="govuk-body">We will send any postal correspondence to this address.</p>';

    function setQuestions(): void
    {
        $address = new Address($this, 'your', true, '', [
            'hint' => [
                'address-line-1' => 'Base name for military establishments'
            ]
        ]);

        $this->_questions = array_merge($address->fields());
    }
}
