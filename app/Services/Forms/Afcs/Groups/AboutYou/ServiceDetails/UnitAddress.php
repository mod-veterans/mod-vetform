<?php


namespace App\Services\Forms\Afcs\Groups\AboutYou\ServiceDetails;


use App\Services\Forms\BasePage;
use App\Services\Patterns\Address;

class UnitAddress extends BasePage
{
    /**
     * @var string
     */
    protected string $_title = 'What was/is the address of your current/last service unit?';
    public string $summary = '<p class="govuk-body">Please include details to your best recollection for this period of
                              service, even if the location has since closed down.</p>';

    function setQuestions(): void
    {
        $address = new Address($this->namespace, 'your');
        $this->_questions = array_merge($address->fields());
    }
}
