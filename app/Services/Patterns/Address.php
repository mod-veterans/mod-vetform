<?php


namespace App\Services\Patterns;


use App\Services\Forms\BasePage;

class Address
{
    private string $namespace;

    private string $namespacePrefix;

    private string $possessive;

    private bool $mandatory;

    private array $options;

    public function __construct(BasePage $parent, string $possessive = 'your', bool $mandatory = false, string $namespacePrefix = '', $options = [])
    {
        $this->namespace = $parent->namespace;
        $this->possessive = $possessive;
        $this->mandatory = $mandatory;
        $this->options = $options;

        if ($namespacePrefix) {
            $this->namespacePrefix = $namespacePrefix . '__';
        } else {
            $this->namespacePrefix = '';
        }

        if(!$mandatory) {
            $parent->appendToSummary('<p class="govuk-body">Enter details to your best knowledge. If you can\'t remember, you can leave blank any sections not marked "required".</p>');
        }
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
                    'field' => $this->namespace . '/' . $this->namespacePrefix . 'address-line-1',
                    'label' => $this->options['label']['address-line-1'] ?? 'Building and street',
                    'labelExtra' => 'line 1 of 2',
                    'validation' => $this->mandatory ? 'required' : '',
                    'hint' => $this->options['hint']['address-line-1'] ?? '',
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
                    'field' => $this->namespace . '/' . $this->namespacePrefix . 'address-line-2',
                    'label' => 'Building and street line 2 of 2',
                    'hint' => $this->options['hint']['address-line-2'] ?? '',
                    'hideLabel' => true,
                    'autocomplete' => 'address-line2',
                    'fullWidth' => true,
                ],
            ],
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/' . $this->namespacePrefix . 'town',
                    'label' => 'Town or city',
                    'validation' => $this->mandatory ? 'required' : '',
                    'hint' => $this->options['hint']['town'] ?? '',
                    'messages' => [
                        'required' => 'Enter ' . $this->possessive . ' town or city'
                    ],
                    'autocomplete' => 'address-level2'
                ],
            ],
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/' . $this->namespacePrefix . 'county',
                    'label' => 'County',
                    'validation' => $this->mandatory ? 'required' : '',
                    'hint' => $this->options['hint']['county'] ?? '',
                    'messages' => [
                        'required' => 'Enter ' . $this->possessive . ' county'
                    ],
                    'autocomplete' => ''
                ],
            ],
            [
                'component' => 'country',
                'options' => [
                    'field' => $this->namespace . '/' . $this->namespacePrefix . 'country',
                    'label' => 'Country',
                    'validation' => $this->mandatory ? 'required' : '',
                    'hint' => $this->options['hint']['country'] ?? '',
                    'messages' => [
                        'required' => 'Enter ' . $this->possessive . ' country'
                    ],
                    'autocomplete' => ''
                ],
            ],
            [
                'component' => 'textfield',
                'options' => [
                    'field' => $this->namespace . '/' . $this->namespacePrefix . 'postcode',
                    'label' => 'Postcode',
                    'validation' => $this->mandatory ? 'required' : '',
                    'hint' => $this->options['hint']['postcode'] ?? '',
                    'messages' => [
                        'required' => 'Enter ' . $this->possessive . ' postcode'
                    ],
                    'autocomplete' => 'postal-code'
                ],
            ],
        ];
    }
}
