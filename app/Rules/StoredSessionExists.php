<?php

namespace App\Rules;

use App\Models\StoredSession;
use App\Services\Application;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class StoredSessionExists implements Rule
{
    /** @var Application|null */
    private $application;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->application = Application::getInstance();
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        $storedSession = (new StoredSession)->getSessionFromIDRequest();

        return (bool) $storedSession;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'No matching application found.';
    }
}
