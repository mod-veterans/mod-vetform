<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Hint extends Component
{
    public $hint = null;

    public $field = null;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($hint = null, $field = null)
    {
        $this->hint = $hint;
        $this->field = $field;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.hint');
    }
}
