<?php


namespace App\Services\Patterns;


class Address
{
    private $namespace;

    public function __construct($namespace) {
        $this->namespace = $namespace;
    }

    public function fields(): array {
        return [
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '-address-line-1',
                    'label' => 'Building and street',
                    'labelExtra' => 'line 1 of 2',
                    'validation' => 'required',
                    'messages' => [
                        'required' => 'Enter your house name/number and street address'
                    ],
                    'autocomplete' => 'address-line1',
                    'fullWidth' => true,
                ],
            ],
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '-address-line-2',
                    'label' => 'Building and street line 2 of 2',
                    'hideLabel' => true,
                    'autocomplete' => 'address-line2',
                    'fullWidth' => true,
                ],
            ],
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '-town',
                    'label' => 'Town or city',
                    'validation' => 'required',
                    'messages' => [
                        'required' => 'Enter your town or city'
                    ],
                    'autocomplete' => 'address-level2'
                ],
            ],
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '-county',
                    'label' => 'County',
                    'validation' => 'required',
                    'messages' => [
                        'required' => 'Enter your county'
                    ],
                    'autocomplete' => ''
                ],
            ],
            [
                'component' => 'country',
                'options' => [
                    'field' => $this->namespace . '-country',
                    'label' => 'Country',
                    'validation' => 'required',
                    'messages' => [
                        'required' => 'Enter your country'
                    ],
                    'autocomplete' => ''
                ],
            ],
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '-postcode',
                    'label' => 'Postcode',
                    'validation' => 'required',
                    'messages' => [
                        'required' => 'Enter your postcode'
                    ],
                    'autocomplete' => 'postal-code'
                ],
            ],
        ];
    }
}
