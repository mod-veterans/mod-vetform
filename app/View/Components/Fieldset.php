<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Fieldset extends Component
{
    public $title;

    public $body;

    public $label;

    public $subtext;

    public $errors = [];

    public $hasErrors = false;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.fieldset');
    }
}
