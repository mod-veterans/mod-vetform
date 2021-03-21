<?php

namespace App\View\Components;


use Illuminate\Support\Str;

class RadioButton extends FormField
{
    /**
     * @var array|mixed
     */
    public $children = [];

    public $label = '';

    public $value = '';

    public function __construct($options = [])
    {
        parent::__construct($options);

        $this->_id = $options['field'] . '-' . Str::kebab($options['value']);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.radio-button');
    }
}
