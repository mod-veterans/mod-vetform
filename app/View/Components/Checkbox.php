<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class Checkbox extends FormField
{
    /**
     * @var array|mixed
     */
    public $isGrouped = false;

    /**
     * @var array|mixed
     */
    public $children = [];

    public function __construct($options = []) {
        parent::__construct($options);

        if(!array_key_exists('value', $options)) {
            $this->value = $options['label'];
        }

        // $this->_id = str_replace('/', '-', ltrim($this->field, '/'));
        $this->_id = uniqid();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.checkbox');
    }
}
