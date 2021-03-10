<x-layout>
    <x-slot name="title">Save your application</x-slot>
    <x-slot name="body">
        <x-textfield label="Email address"
                     field="applicant-email-address"
                     type="email"></x-textfield>
        <x-textfield label="Confirm Email address"
                     field="applicant-email-address-confirmation"
                     type="email"></x-textfield>
        <x-textfield label="Email address"
                     field="applicant-email-address"></x-textfield>
    </x-slot>
</x-layout>
