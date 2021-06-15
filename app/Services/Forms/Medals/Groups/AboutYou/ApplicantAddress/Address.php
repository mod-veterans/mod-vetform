<?php


namespace App\Services\Forms\Medals\Groups\AboutYou\ApplicantAddress;


use App\Services\Forms\BasePage;
use \App\Services\Patterns\Address as AddressPattern;

class Address extends BasePage
{
    protected string $_title = 'What is your residential address';

    public string $summary = '<p class="govuk-body">This is where we will send you your medal</p>';


    function setQuestions(): void
    {
        $this->_questions = (new AddressPattern($this->namespace, 'your', true))->fields();
    }
}
