<x-layout>
    <x-slot name="title">{{ $view->title }}</x-slot>

    <x-slot name="body">
        @if($view->summary)
            <p class="govuk-body">{{ $view->summary }}</p>
        @endif
        <form method="post" enctype="multipart/form-data" novalidate
              action="{{ route('save.form', ['group'=>$group, 'task'=>$task, 'page'=>$page]) }}"
        >
            <x-error-summary :errors="$errors"></x-error-summary>
            @foreach($view->questions as $question)
                <x-dynamic-component
                    :component="$question['component']"
                    :options="$question['options']">
                </x-dynamic-component>
            @endforeach
            <x-submit-form></x-submit-form>
        </form>
    </x-slot>
</x-layout>
