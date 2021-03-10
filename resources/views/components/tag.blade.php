@props([
    'label' => 'LABEL_MISSING',
    'field' => 'Unset field',
    'color' => false,
])
<strong class="govuk-tag" id="{{ $field }}-status">
    {{ $label }}
</strong>
