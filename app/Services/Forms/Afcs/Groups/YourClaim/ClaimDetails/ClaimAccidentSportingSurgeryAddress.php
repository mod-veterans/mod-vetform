<?php


namespace App\Services\Forms\Afcs\Groups\YourClaim\ClaimDetails;


use App\Services\Forms\BasePage;
use App\Services\Patterns\Address;

class ClaimAccidentSportingSurgeryAddress extends BasePage
{
    protected $_id = 'claim-accident-sporting-surgery-address';

    protected string $_title = 'Which Medical Practitioner gave you the diagnosis (if known)?';

    function setQuestions(): void
    {
        $this->_questions =
            array_merge(
                [
                    [
                        'component' => 'textfield',
                        'options' => [
                            'field' => $this->namespace . '/claim-accident-sporting-surgery-address',
                            'label' => 'Name of the Medical Practitioner (if known)'
                        ],
                    ]
                ],
                (new Address($this->namespace . 'surgery-address', 'the', false, 'claim-accident-sporting-surgery-address'))->fields(),
                [
                    [
                        'component' => 'textfield',
                        'options' => [
                            'field' => $this->namespace . '/claim-accident-sporting-surgery-number',
                            'label' => 'Telephone number',
                            'type' => 'tel',
                            'autocomplete' => 'tel',
                        ],
                    ],
                    [
                        'component' => 'textfield',
                        'options' => [
                            'field' => $this->namespace . '/claim-accident-sporting-surgery-email',
                            'label' => 'Email address',
                            'type' => 'email',
                            'autocomplete' => 'email',
                        ],
                    ]
                ]
            );
    }
}
