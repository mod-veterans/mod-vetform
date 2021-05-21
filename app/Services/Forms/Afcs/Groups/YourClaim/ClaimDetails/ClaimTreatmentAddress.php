<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;


use App\Services\Forms\BasePage;
use App\Services\Patterns\Address;

class ClaimTreatmentAddress extends BasePage
{
    /**
     * @var string
     */
    protected $_id = 'claim-treatment-address';

    /**
     * @var string
     */
    protected string $_title = 'What is the full address of where you had/will have this treatment?';

    function setQuestions(): void
    {
        $this->_questions = (new Address($this->namespace, 'the'))->fields();
    }
}
