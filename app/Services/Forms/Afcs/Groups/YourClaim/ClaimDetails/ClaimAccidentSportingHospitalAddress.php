<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;


use App\Services\Forms\BasePage;
use App\Services\Patterns\Address;

class ClaimAccidentSportingHospitalAddress extends BasePage
{
    protected $_id = 'claim-accident-sporting-hospital-address';

    protected string $_title = 'Which hospital or medical facility were you taken to?';

    public string $summary = '<p class="govuk-body">Please only tell us about treatment you received for the injury/condition that you are claiming for</p>';

    function setQuestions(): void
    {
        $this->_questions =
            array_merge(
                [
                    [
                        'component' => 'textfield',
                        'options' => [
                            'field' => $this->namespace . '/claim-accident-sporting-hospital-address',
                            'label' => 'Name of the Hospital (if known)'
                        ],
                    ]
                ],
                (new Address($this->namespace . 'claim-sporting-hospital-address', 'the'))->fields(),
                [
                    [
                        'component' => 'textfield',
                        'options' => [
                            'field' => $this->namespace . '/claim-accident-sporting-hospital-number',
                            'label' => 'Telephone number',
                            'type' => 'tel',
                            'autocomplete' => 'tel',
                        ],
                    ]
                ]
            );
    }
}
