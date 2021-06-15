<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RadioGroup extends FormField
{
    /**
     * @var bool|mixed
     */
    public $hideLegend = false;

    /**
     * @var string
     */
    public $questionTag = 'h1';

    /**
     * @var bool|mixed
     */
    public $hasConditionals = false;

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.radio-group');
    }
}
