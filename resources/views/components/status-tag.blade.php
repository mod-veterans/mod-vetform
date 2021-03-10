@props([
    'label' => 'LABEL_MISSING',
    'field' => 'Unset field',
    'color' => false,
])
<strong class="govuk-tag app-task-list__tag" id="{{ $field }}-status">
    {{ $label }}
</strong>
