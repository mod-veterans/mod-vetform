@props([
    'submitLabel' => 'Save and continue',
    'cancelLabel' => 'Cancel application',
    'canCancel' => true
])
<div class="govuk-form-group">
    @csrf
    <button class="govuk-button govuk-!-margin-right-2" data-module="govuk-button">{{ $submitLabel }}</button>
    @if($canCancel)
        <a href="{{ route('cancel-application') }}" class="govuk-button govuk-button--secondary"
           data-module="govuk-button">
            {{ $cancelLabel }}
        </a>
    @endif
    <p class="govuk-body">
        <a class="govuk-link hidden-print" href="{{ route('save.progress') }}">Save for later</a>
    </p>
</div>
