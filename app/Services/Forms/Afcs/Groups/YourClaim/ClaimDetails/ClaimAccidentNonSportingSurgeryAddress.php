<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;


use App\Services\Forms\BasePage;
use App\Services\Patterns\Address;

class ClaimAccidentNonSportingSurgeryAddress extends BasePage
{
    protected $_id = 'claim-accident-non-sporting-surgery-address';

    protected string $_title = 'Which Medical Practitioner gave you the diagnosis (if known)?';

    function setQuestions(): void
    {
        $this->_questions =
            array_merge(
                [
                    [
                        'component' => 'textfield',
                        'options' => [
                            'field' => $this->namespace . '/claim-accident-non-sporting-surgery-address',
                            'label' => 'Name of the Medical Practitioner (if known)'
                        ],
                    ]
                ],
                (new Address($this->namespace . 'claim-accident-non-sporting-surgery-address', 'the'))->fields(),
                [
                    [
                        'component' => 'textfield',
                        'options' => [
                            'field' => $this->namespace . '/claim-accident-non-sporting-surgery-number',
                            'label' => 'Telephone number',
                            'type' => 'tel',
                            'autocomplete' => 'tel',
                        ],
                    ],
                    [
                        'component' => 'textfield',
                        'options' => [
                            'field' => $this->namespace . '/claim-accident-non-sporting-surgery-email',
                            'label' => 'Email address',
                            'type' => 'email',
                            'autocomplete' => 'email',
                        ],
                    ]
                ]
            );
    }
}
