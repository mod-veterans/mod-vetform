<div class="govuk-form-group @error($field) govuk-form-group--error @enderror">
    <input name="{{ $field }}" type="hidden"
           value="{{ old($field, session($field, stored_response($field))) }}">
</div>
