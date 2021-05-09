<x-layout :view="$view">
    <x-slot name="title">{{ $view->title ?? 'Your progress has been saved' }}</x-slot>

    <x-slot name="body">
        <p class="govuk-body">You may return at any point in the next 90 days and continue where you left off.</p>
        <p class="govuk-body">For your security, we have cleared your session. You can now restart a new claim or click here</p>
    </x-slot>
</x-layout>
