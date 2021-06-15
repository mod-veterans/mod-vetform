@props([
    'accessibleLabel' => '',
    'label'     => '',
    'field'     => '',
    'period'    => '',
    'hideLabel' => false,
])

@php
    $oldValue = old($field . '-' . $period, session($field. '-' . $period, stored_response($field. '-' . $period)));

    if(!$oldValue) {
        $fullDate = session($field, stored_response($field));
    }

    if($fullDate) {
      $date = \Carbon\Carbon::createFromFormat('Y-m-d', $fullDate);
      $oldValue = [
        'year' => $date->format('Y'),
        'month' => $date->format('m'),
        'day' => $date->format('d')
      ][$period];
    }
@endphp
<div class="govuk-date-input__item">
    <div class="govuk-form-group">
        @if(!$hideLabel)
            <label class="govuk-label govuk-date-input__label" for="{{ $field }}-{{ $period }}">
                @if($accessibleLabel)<span class="govuk-visually-hidden">{{ $accessibleLabel }}</span>@endif
                {{ $label }}
            </label>
        @endif
        <input
            class="govuk-input govuk-date-input__input {{ $period === 'year' ? 'govuk-input--width-4' : 'govuk-input--width-2' }} @error($field .'-' . $period) govuk-input--error @enderror"
            id="{{ !$hideLabel ? $field . '-' . $period : $field }}"
            name="{{ $field }}-{{ $period }}" type="text" pattern="[0-9]*" inputmode="numeric"
            value="{{ $oldValue }}">
    </div>
</div>
