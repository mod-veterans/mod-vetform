<?php


namespace App\Services\Forms\Afcs\Groups\AboutYou\PersonalDetails;


use App\Services\Forms\BasePage;
use App\Services\Patterns\Address;

class ContactAddress extends BasePage
{
    /**
     * @var string
     */
    public $title = 'What is your contact address?';

    /**
     * @var string
     */
    public $summary = 'We will send any postal correspondence to this address.';

    function setQuestions(): void
    {
        $this->_questions = array_merge((new Address($this->namesapce))->fields());
    }
}
