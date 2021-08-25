<?php


namespace App\Services\Forms\Afcs\Groups\OtherDetails\OtherMedicalTreatment;


use App\Services\Patterns\Address;

class OtherMedicalTreatmentAddress extends \App\Services\Forms\BasePage
{
    protected string $_title = 'Please tell us the name and address of the hospital or facility providing the treatment?';

    function setQuestions(): void
    {
        $this->_questions =
            array_merge(
                [
                    [
                        'component' => 'hidden-field',
                        'options' => [
                            'field' => $this->namespace . '/completed',
                            'value' => 1,
                            'validation' => 'required',
                        ],
                    ],
                    [
                        'component' => 'textfield',
                        'options' => [
                            'field' => $this->namespace . '/hospital-name',
                            'label' => 'Hospital name if known',
                        ],
                    ]
                ],
                (new Address($this, 'the'))->fields(),
                [
                    [
                        'component' => 'textfield',
                        'options' => [
                            'field' => $this->namespace . '/hospital-contact-number',
                            'label' => 'Telephone number',
                            'type' => 'tel',
                            'autocomplete' => 'tel',
                        ],
                    ],
                    [
                        'component' => 'textfield',
                        'options' => [
                            'field' => $this->namespace . '/hospital-email',
                            'label' => 'Email',
                            'type' => 'email',
                            'autocomplete' => 'email',
                        ],
                    ]
                ]
            );
    }
}
