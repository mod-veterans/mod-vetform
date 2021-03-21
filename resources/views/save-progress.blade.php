<x-layout>
    <x-slot name="title">{{ $view->title ?? 'Save your progress' }}</x-slot>

    <x-slot name="body">
        @if($view)
            @if($view->summary)
                <p class="govuk-body">{{ $view->summary }}</p>
            @endif

            <form method="post" novalidate action="{{ route('save.progress') }}">
                <x-error-summary :errors="$errors"></x-error-summary>
                <x-textfield></x-textfield>
                <x-textfield></x-textfield>
                <x-textfield></x-textfield>
                <x-submit-form></x-submit-form>
            </form>
        @endif
    </x-slot>
</x-layout>
