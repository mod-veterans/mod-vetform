<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;


use App\Services\Forms\BasePage;
use App\Services\Patterns\Address;

class ClaimHospitalAddress extends BasePage
{
    protected string $_title = 'Which hospital or medical facility were you taken to?';

    function setQuestions(): void
    {
        $this->_questions =  (new Address($this, 'the hospital', false))->fields();
    }
}


