<x-layout>
    <x-slot name="title">Cancel your application</x-slot>

    <x-slot name="body">
        <p class="govuk-body">Are you sure you wish to cancel this application?</p>

        <form method="post" action="{{ route('cancel-application.confirm') }}">
            @csrf
            <button type="submit" class="govuk-button">Yes</button>
        </form>

        <a href="{{ route('home') }}" class="govuk-link">Return to summary</a>
    </x-slot>
</x-layout>
