<x-layout :view="$view">
    <x-slot name="title">{{ $view->title ?? 'Missing title' }}</x-slot>

    <x-slot name="body">
        @if($view)
            @if($view->summary)
                <p class="govuk-body">{{ $view->summary }}</p>
            @endif

            <form method="post" enctype="multipart/form-data" novalidate
                  action="{{ route('save.form', ['group'=>$group, 'task'=>$task, 'page'=>$page, 'stack' => $stack]) }}"
            >
                <x-error-summary :errors="$errors"></x-error-summary>
                @foreach($view->questions as $question)
                    <x-dynamic-component
                        :component="$question['component']"
                        :options="$question['options']">
                    </x-dynamic-component>
                @endforeach

                @if($redirect)
                    <input type="hidden" name="redirect" value="{{ $redirect }}">
                @endif
                <x-submit-form></x-submit-form>
            </form>
        @endif
    </x-slot>
</x-layout>
