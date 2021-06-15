<x-layout>
    <x-slot name="title">Check your answers</x-slot>

    <x-slot name="body">
        <h2 class="govuk-heading-m">{{ $task }}</h2>
        <x-summary-list :rows="$task->responses"></x-summary-list>
        @if($task->isStackable())
            <a class="govuk-link"
               href="{{ route('add.stack', ['stack' =>  $task->namespace ]) }}">
                {{ $task->addStackLabel ??  'Add to stack' }}
            </a>
            <br>
            <a href="{{ route('home') }}" class="govuk-button govuk-!-margin-top-5" data-module="govuk-button">Continue</a>
        @else
            <a href="{{ route('home') }}" class="govuk-button" data-module="govuk-button">Continue</a>
        @endif
    </x-slot>
</x-layout>
