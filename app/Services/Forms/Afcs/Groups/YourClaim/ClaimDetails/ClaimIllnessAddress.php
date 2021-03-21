<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;


use App\Services\Patterns\Address;

class ClaimIllnessAddress extends \App\Services\Forms\BasePage
{
    protected $_title = 'What type of medical condition, injury or illness you are claiming for?';

    function setQuestions(): void
    {
        $address = new Address($this->namespace, 'their');
        $this->_questions = array_merge($address->fields());
    }
}
