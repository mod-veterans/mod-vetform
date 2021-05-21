<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;


use App\Services\Forms\BasePage;
use App\Services\Patterns\Address;

class ClaimSurgeryAddress extends BasePage
{
    protected string $_title = 'What is the name and address of the hospital where this is due to take place?';

    function setQuestions(): void
    {
        $this->_questions =  (new Address($this->namespace, 'the surgery', false))->fields();
    }
}


