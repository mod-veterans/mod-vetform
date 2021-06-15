<x-layout :view="$view" :questions="$view->questions ?? null">
    <x-slot name="title">{{ $view->title ?? 'Missing title' }}</x-slot>
    <x-slot name="body">
        @if($view)
            @if($view->summary)
                {!! $view->summary !!}
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

                @if($view->closingStatement)
                    {!! $view->closingStatement !!}
                @endif

                <x-submit-form :submitLabel="$view->submitLabel ?? 'Save and continue'"></x-submit-form>
            </form>

        @endif
    </x-slot>
</x-layout>
