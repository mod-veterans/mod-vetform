<?php


namespace App\Services\Patterns;


class Address
{
    /**
     * @var string
     */
    private $namespace;

    /**
     * @var string
     */
    private $possessive = 'your';

    /**
     * @var string
     */
    private $optional = false;

    /**
     * Address constructor.
     * @param $namespace
     * @param string $possessive
     * @param false $optional
     */
    public function __construct($namespace, $possessive = 'your', $optional = false)
    {
        $this->namespace = $namespace;
        $this->possessive = $possessive;
        $this->optional = $optional;
    }

    /**
     * @return array[]
     */
    public function fields(): array
    {
        return [
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/address-line-1',
                    'label' => 'Building and street',
                    'labelExtra' => 'line 1 of 2',
                    'validation' => $this->optional ? 'required' : '',
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
                    'validation' => $this->optional ? 'required' : '',
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
                    'validation' => $this->optional ? 'required' : '',
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
                    'validation' => $this->optional ? 'required' : '',
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
                    'validation' => $this->optional ? 'required' : '',
                    'messages' => [
                        'required' => 'Enter ' . $this->possessive . ' postcode'
                    ],
                    'autocomplete' => 'postal-code'
                ],
            ],
        ];
    }
}
