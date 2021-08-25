<x-layout :view="null" :questions="null">
    <x-slot name="title">{{ 'Enter your access code' }}</x-slot>
    <x-slot name="body">
        <p class="govuk-body">We have sent a four digit access code to the mobile phone and email address we have
            registered for you.</p>
        <form method="post" enctype="multipart/form-data" action="{{ route('restore-application-2fa') }}" novalidate>
            <x-error-summary :errors="$errors"></x-error-summary>
            <x-textfield :options="[
                'field' => 'authcode',
                'label' => 'Enter the access code',
                'maxlength' => 4,
                'autocomplete'=> 'authcode'
            ]"></x-textfield>
            <x-submit-form submit-label="Continue" :can-cancel="false"></x-submit-form>
        </form>

        <p class="govuk-body">
            <a href="{{ route('text-not-received') }}" class="govuk-link">Not received a text message?</a>
        </p>
    </x-slot>
</x-layout>
