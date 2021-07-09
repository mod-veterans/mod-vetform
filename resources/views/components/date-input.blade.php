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
    if(!$oldValue) {
        $fullDate = session($field, stored_response($field));

        if($fullDate) {
          list($year, $month, $day) = explode('-', $fullDate);
          if($day ==  '00') {
            $day = null;
            $fullDate = false;
          }
          if($month ==  '00') {
            $month = null;
            $fullDate = false;
          }
          if($year ==  '00') {
            $year = null;
            $fullDate = false;
          }
        }
    }

    if($fullDate) {
      $date = \Carbon\Carbon::createFromFormat('Y-m-d', $fullDate);
      $oldValue = [
        'year' => $date->format('Y'),
        'month' => $date->format('m'),
        'day' => $date->format('d')
      ][$period];
    } else {
         $oldValue = [
        'year' => $year ?? null,
        'month' => $month ?? null,
        'day' => $day ?? null
      ][$period];
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
                if (isNaN(e.key) && e.key !== 'Backspace' && e.key !== 'Delete' && e.key !== 'ArrowLeft' && e.key !== 'ArrowRight' && e.key !== 'Enter'&& e.key !== 'Tab') {
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
