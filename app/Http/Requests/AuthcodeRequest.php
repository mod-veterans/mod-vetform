<?php

namespace App\Http\Requests;

use App\Rules\Authcode;
use Illuminate\Foundation\Http\FormRequest;

class AuthcodeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return (bool) session('stored_application', false);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'authcode' => [
                'required',
                new Authcode
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'authcode.required' => 'Enter your auth code'
        ];
    }
}
