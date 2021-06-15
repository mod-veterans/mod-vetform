<x-layout>
    <x-slot name="title">{{ 'User information' }}</x-slot>

    <x-slot name="body">
        <dl class="govuk-summary-list">
            <div class="govuk-summary-list__row">
                <dt class="govuk-summary-list__key">
                    Email
                </dt>
                <dd class="govuk-summary-list__value">
                    {{ $response->email }}
                </dd>
            </div>
        </dl>
        <a href="https://modvets-dev2.london.cloudapps.digital/summary" class="govuk-button">Continue</a>
    </x-slot>
</x-layout>
