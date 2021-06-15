<x-layout>
    <x-slot name="title"></x-slot>
    <x-slot name="body">
        <x-confirmation-panel></x-confirmation-panel>

        <h2 class="govuk-heading-m">Your medal application has been submitted</h2>
        <p class="govuk-body">Thank you for completing an application for an Armed Forces Compensation or War Pension payment.</p>
        <p class="govuk-body">Your reference number is {{ session('application-reference') }}.</p>

        <h2 class="govuk-heading-m">What happens next</h2>
        <p class="govuk-body">Not much. This is purely a demo app.</p>

        <p class="govuk-body">
            <a href="https://surveys.mod.uk/index.php/892274?lang=en" class="govuk-link">What did you think of this service?</a>
        </p>
    </x-slot>
</x-layout>
