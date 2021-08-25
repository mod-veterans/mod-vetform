@props([
'accessibleLabel' => '',
'label'     => '',
'field'     => '',
'period'    => '',
'hideLabel' => false,
])

@php
    $oldValue = old($field . '-' . $period, session($field. '-' . $period, stored_response($field. '-' . $period)));

    $fullDate = false;
    $day = '00';
    $month = '00';
    $year = '0000';

    if(!$oldValue) {
        $fullDate = session($field, stored_response($field, '0000-00-00'));
        if($fullDate) {
          list($year, $month, $day) = explode('-', $fullDate);
          if($day ==  '00') {
            $day = false;
            $fullDate = false;
          }
          if($month ==  '00') {
            $month = false;
            $fullDate = false;
          }
          if($year ==  '0000') {
            $year = false;
            $fullDate = false;
          }
        }

        $parts = ['day' => $day,'month' => $month, 'year' => $year];
        $oldValue = ['day' => $day,'month' => $month, 'year' => $year][$period];
    }

    if($oldValue == '00' || $oldValue == '0000') {
      $oldValue = false;
    }

    $fieldId = !$hideLabel ? $field . '-' . $period : $field
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
            id="{{ $fieldId }}"
            name="{{ $field }}-{{ $period }}" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="{{ $period === 'year' ? 4 : 2  }}"
            value="{{ $oldValue }}">
    </div>
</div>
@push('scripts')
    <script>
        document.getElementById('{{ $fieldId }}')
            .addEventListener('keydown', (e) => {
                if (isNaN(e.key) && e.key !== 'Backspace' && e.key !== 'Delete' && e.key !== 'ArrowLeft' && e.key !== 'ArrowRight' && e.key !== 'Enter' && e.key !== 'Tab') {
                    e.preventDefault();
                }
            })

        {{--document.getElementById('{{ $fieldId }}')--}}
        {{--    .addEventListener('keyup', (e) => {--}}
        {{--        if (!isNaN(e.key)) {--}}
        {{--             let elements = e.target.form.elements--}}
        {{--            for(let i = 0, element; element = elements[i++];) {--}}
        {{--                console.table(element)--}}
        {{--            }--}}
        {{--        }--}}
        {{--    })--}}
    </script>
@endpush
