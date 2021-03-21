<x-layout>
    <x-slot name="title">Check your answers</x-slot>

    <x-slot name="body">
        <h2 class="govuk-heading-m">{{ $task }}</h2>
        <x-summary-list :rows="$task->responses"></x-summary-list>

        <a href="{{ route('home') }}" class="govuk-button" data-module="govuk-button">
            Continue
        </a>
    </x-slot>
</x-layout>
