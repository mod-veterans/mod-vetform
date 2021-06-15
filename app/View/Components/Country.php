<?php

namespace App\View\Components;


use Illuminate\Contracts\View\View;

class Country extends FormField
{
    /**
     * @var array
     */
    public $countries = [];

    public function __construct($options = [])
    {
        parent::__construct($options);

        $jsonFile = public_path('assets/data/location-autocomplete-canonical-list.json');
        $this->countries = json_decode(file_get_contents($jsonFile));
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.country');
    }
}
