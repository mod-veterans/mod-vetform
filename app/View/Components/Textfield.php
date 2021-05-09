<?php

namespace App\View\Components;

class Textfield extends FormField
{
    /**
     * @var bool|mixed
     */
    public $spellcheck = true;

    /**
     * @var bool|mixed
     */
    public $maxlength = 120;

    /**
     * @var string
     */
    public $type = 'text';

    /**
     * @var array
     */
    public $ariaDescribedBy = [];

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.textfield');
    }
}
