@php
    $search_field = $field;
    if(Str::endsWith($search_field, '[]')) {
      $search_field = rtrim($search_field, '[]');
    }

    $oldValue = (old($search_field, session($search_field, stored_response($search_field))));
    $checked = is_array($oldValue) ? in_array($value, $oldValue) : ($oldValue == $value);
@endphp

<div class="govuk-checkboxes__item">
    @if(is_bool($value))
        <input id="{{ $_id }}--default" name="{{ $field }}" type="hidden" value="{{ (int)!$value }}">
    @elseif($value === \App\Services\Constant::YES)
        <input id="{{ $_id }}--default" name="{{ $field }}" type="hidden" value="{{ \App\Services\Constant::NO }}">
    @elseif($value === \App\Services\Constant::NO)
        <input id="{{ $_id }}--default" name="{{ $field }}" type="hidden" value="{{ \App\Services\Constant::YES }}">
    @endif
    <input class="govuk-checkboxes__input" id="{{ $_id }}" name="{{ $field }}" type="checkbox"
           value="{{ $value }}" @if($checked) checked @endif
           @if($children) data-aria-controls="conditional-{{ $_id }}" @endif>
    <label class="govuk-label govuk-checkboxes__label" for="{{ $_id }}">{{ $label }}</label>
</div>
@if($children)
    <div class="govuk-checkboxes__conditional govuk-checkboxes__conditional--hidden" id="conditional-{{ $_id }}">
        @foreach($children as $child)
            <x-textfield :label="$child['label']" :field="$field . '-' . $child['field']" :hint="$child['hint'] ?? ''"
                         :mandatory="$child['mandatory'] ?? true"></x-textfield>
        @endforeach
    </div>
@endif
