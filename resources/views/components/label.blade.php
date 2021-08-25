@props([
    'label' => false,
    'field' => 'Unset field',
    'extra' => false,
    'mandatory' => true,
    'hidden',
])
@if($label)
    <label class="govuk-label" for="{{ $field }}">
        @if($hidden)<span class="govuk-visually-hidden">{{ $label }}</span>@else{{ $label }}@endif
        @if($extra) <span class="govuk-visually-hidden">{{ $extra }}</span>@endif
{{--        @if($mandatory && !$hidden) <span>(required)</span>@endif--}}
    </label>
@endif
