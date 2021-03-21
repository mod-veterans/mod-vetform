@props([
    'field' => 'Unset field',
    'status' => null
])

@php
$tagColor = [
     \App\Services\Forms\BaseTask::STATUS_NOT_STARTED => 'govuk-tag--grey',
     \App\Services\Forms\BaseTask::STATUS_CANNOT_START => 'govuk-tag--grey',
     \App\Services\Forms\BaseTask::STATUS_COMPLETED => '',
     \App\Services\Forms\BaseTask::STATUS_IN_PROGRESS => 'govuk-tag--blue'
][$status ?? \App\Services\Forms\BaseTask::STATUS_NOT_STARTED];

$tagLabel = [
     \App\Services\Forms\BaseTask::STATUS_NOT_STARTED => 'Not started',
     \App\Services\Forms\BaseTask::STATUS_CANNOT_START => 'Cannot start yet',
     \App\Services\Forms\BaseTask::STATUS_COMPLETED => 'Completed',
     \App\Services\Forms\BaseTask::STATUS_IN_PROGRESS => 'In progress'
][$status ?? \App\Services\Forms\BaseTask::STATUS_NOT_STARTED];
@endphp

<strong class="govuk-tag {{ $tagColor }} app-task-list__tag" id="{{ $field }}-status">
    {{ $tagLabel }}
</strong>
