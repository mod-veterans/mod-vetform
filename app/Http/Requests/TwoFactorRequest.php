<?php

namespace App\Http\Requests;

use App\Rules\StoredSessionExists;
use App\Services\Application;
use Illuminate\Foundation\Http\FormRequest;

class TwoFactorRequest extends FormRequest
{
    /**
     * @var Application|null
     */
    private $application;

    /**
     * @var array
     */
    private $qualifiers;

    /**
     * TwoFactorRequest constructor.
     */
    public function __construct()
    {
        $this->application = Application::getInstance();
        $this->qualifiers = $this->application->form->identifier;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        foreach ($this->qualifiers as $qualifier) {
            $question = $this->application->getQuestionByFieldname($qualifier);
            $component = $question['component'];
            $field_name = $question['options']['field'];

            if ($component == 'date-field') {
                $day   = request()->input($field_name . '-day', '00');
                $month = request()->input($field_name . '-month', '00');
                $year  = request()->input($field_name . '-year', '0000');

                $this->merge([$field_name => $year . '-' . $month . '-' . $day]);
                request()->merge([$field_name => $year . '-' . $month . '-' . $day]);
            }
        }

        parent::prepareForValidation();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $rules = [];

        foreach ($this->qualifiers as $index => $qualifier) {
            $question = $this->application->getQuestionByFieldname($qualifier);
            $field_name = $question['options']['field'];
            $rules[$field_name] = $question['options']['validation'] ?? ['required'];

            if ($index == 0) {
                $validation = $rules[$field_name];

                if (!is_array($validation)) {
                    $validation = explode("|", $validation);
                }

                $validation[] = new StoredSessionExists();

                $rules[$field_name] = $validation;
            }
        }

        return $rules;
    }

    public function messages(): array
    {
        $messages = [];

        foreach ($this->application->form->identifier as $qualifier) {
            $question = $this->application->getQuestionByFieldname($qualifier);

            foreach ($question['options']['messages'] ?? [] as $rule => $message) {
                $messages[$question['options']['field'] . '.' . $rule] = $message;
            }
        }

        return $messages;
    }
}
