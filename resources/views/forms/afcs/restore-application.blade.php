<x-layout :view="null" :questions="null">
    <x-slot name="title">{{ 'Return to an application already started' }}</x-slot>
    <x-slot name="body">
        <p class="govuk-body">Please enter the following details so we can find your application</p>
            <form method="post" enctype="multipart/form-data" action="{{ route('restore-application') }}" novalidate>
                <x-error-summary :errors="$errors"></x-error-summary>
                @foreach($questions as $question)
                    <x-dynamic-component
                        :component="$question['component']"
                        :options="$question['options']">
                    </x-dynamic-component>
                @endforeach
                <x-submit-form submitLabel="Continue" :canCancel="false"></x-submit-form>
            </form>
    </x-slot>
</x-layout>
