<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CheckboxGroup extends FormField
{
    /**
     * @var array|mixed
     */
    public $children = [];

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.checkbox-group');
    }
}
