<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;

class HiddenField extends FormField
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.hidden-field');
    }
}
