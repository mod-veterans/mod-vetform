<?php

namespace App\View\Components;

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

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.checkbox');
    }
}
