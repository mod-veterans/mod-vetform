<?php


namespace App\Services\Patterns;


class Address
{
    private $namespace;

    private $possessive;

    public function __construct($namespace, $possessive = 'your')
    {
        $this->namespace = $namespace;
        $this->possessive = $possessive;
    }

    public function fields(): array
    {
        return [
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/address-line-1',
                    'label' => 'Building and street',
                    'labelExtra' => 'line 1 of 2',
                    'validation' => 'required',
                    'messages' => [
                        'required' => 'Enter ' . $this->possessive . ' building and street'
                    ],
                    'autocomplete' => 'address-line1',
                    'fullWidth' => true,
                ],
            ],
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/address-line-2',
                    'label' => 'Building and street line 2 of 2',
                    'hideLabel' => true,
                    'autocomplete' => 'address-line2',
                    'fullWidth' => true,
                ],
            ],
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/town',
                    'label' => 'Town or city',
                    'validation' => 'required',
                    'messages' => [
                        'required' => 'Enter ' . $this->possessive . ' town or city'
                    ],
                    'autocomplete' => 'address-level2'
                ],
            ],
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/county',
                    'label' => 'County',
                    'validation' => 'required',
                    'messages' => [
                        'required' => 'Enter ' . $this->possessive . ' county'
                    ],
                    'autocomplete' => ''
                ],
            ],
            [
                'component' => 'country',
                'options' => [
                    'field' => $this->namespace . '/country',
                    'label' => 'Country',
                    'validation' => 'required',
                    'messages' => [
                        'required' => 'Enter ' . $this->possessive . ' country'
                    ],
                    'autocomplete' => ''
                ],
            ],
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/postcode',
                    'label' => 'Postcode',
                    'validation' => 'required',
                    'messages' => [
                        'required' => 'Enter ' . $this->possessive . ' postcode'
                    ],
                    'autocomplete' => 'postal-code'
                ],
            ],
        ];
    }
}
