<?php


namespace App\Services\Forms\Afcs\Groups\AboutYou\PersonalDetails;


use App\Services\Forms\BasePage;
use App\Services\Patterns\Address;

class ContactAddress extends BasePage
{
    /**
     * @var string
     */
    protected $_title = 'What is your contact address?';

    /**
     * @var string
     */
    public $summary = 'We will send any postal correspondence to this address.';

    function setQuestions(): void
    {
        $address = new Address($this->namespace);
        $this->_questions = array_merge($address->fields());
    }
}
