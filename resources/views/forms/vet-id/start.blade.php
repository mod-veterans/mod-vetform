<x-layout>
    <x-slot name="title">
        Apply for a Veterans ID Card
    </x-slot>
    <x-slot name="body">
        <p class="govuk-body">This is purely a quick example of how quickly we can bring up an application form with
            the modernisation techniques we use internally.</p>
        <div style="display: flex; flex-direction: row">
            <div
                style="margin-right: auto; justify-content: center; flex: 1; align-content: center; align-items: center; justify-items: center">
                <a href="{{ route('home') }}" role="button" draggable="false" data-module="govuk-button"
                   class="govuk-button govuk-button--start govuk-!-margin-top-9">
                    Start now
                    <svg class="govuk-button__start-icon" xmlns="http://www.w3.org/2000/svg" width="17.5" height="19"
                         viewBox="0 0 33 40" aria-hidden="true" focusable="false">
                        <path fill="currentColor" d="M0 0h13l20 20-20 20H0l20-20z"/>
                    </svg>
                </a>
            </div>

        </div>
    </x-slot>
</x-layout>
