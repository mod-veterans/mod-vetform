<x-layout :view="$view">
    <x-slot name="title">{{ $view->title ?? 'Save your progress' }}</x-slot>

    <x-slot name="body">
        @if($view)
            @if($view->summary)
                <p class="govuk-body">{{ $view->summary }}</p>
            @endif
            <form method="post" novalidate action="{{ route('save.progress') }}">
                <x-error-summary :errors="$errors"></x-error-summary>
                <x-textfield :options="[
                    'field' => 'email-address',
                    'label' => 'Your email address',
                    'type' => 'email',
                    'validation' => 'required',
                    'messages' => [
                        'required' => 'Enter your email address'
                    ],
                ]"></x-textfield>
                <x-submit-form :canCancel="false" submitLabel="Save and exit"></x-submit-form>
            </form>
        @endif
    </x-slot>
</x-layout>
