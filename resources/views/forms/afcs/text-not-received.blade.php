<x-layout :view="null" :questions="null">
    <x-slot name="title">{{ 'Resend security code' }}</x-slot>
    <x-slot name="body">
        <p class="govuk-body">Text messages sometimes take a few minutes to arrive. If you do not receive a security code, we can send you a new one.</p>
        <form method="post" enctype="multipart/form-data" action="{{ route('text-not-received') }}" novalidate>
            <x-submit-form submit-label="Resend security code" :can-cancel="false"></x-submit-form>
        </form>
    </x-slot>
</x-layout>
