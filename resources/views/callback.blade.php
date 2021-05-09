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
{{--            <div class="govuk-summary-list__row">--}}
{{--                <dt class="govuk-summary-list__key">--}}
{{--                    Family name--}}
{{--                </dt>--}}
{{--                <dd class="govuk-summary-list__value">--}}
{{--                    5 January 1978--}}
{{--                </dd>--}}
{{--            </div>--}}
{{--            <div class="govuk-summary-list__row">--}}
{{--                <dt class="govuk-summary-list__key">--}}
{{--                    Forename--}}
{{--                </dt>--}}
{{--                <dd class="govuk-summary-list__value">--}}
{{--                    72 Guild Street<br>London<br>SE23 6FH--}}
{{--                </dd>--}}
{{--            </div>--}}
        </dl>
    </x-slot>
</x-layout>
