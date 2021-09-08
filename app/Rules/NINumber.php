<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NINumber implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $value = str_replace(' ', '', $value);
        $valid = preg_match('/^([a-z]{2})([0-9]{2})([0-9]{2})([0-9]{2})([a-z]{1})$/i', $value, $matches);

        if($valid) {
            unset($matches[0]);
            request()->replace([$attribute => strtoupper(join(' ', $matches)) ]);
        }

        return $valid;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Enter a valid national insurance number';
    }
}
