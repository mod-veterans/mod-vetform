<x-layout>
    <x-slot name="title">
        Apply for an Armed Forces Compensation or War Pension Payment
    </x-slot>
    <x-slot name="body">
        <p class="govuk-body">You can use this service to claim for an Armed Forces Compensation Scheme (AFCS) or a War
            Pension Scheme (WPS) payment for injury, illness or disablement related to service in the UK armed
            forces.</p>
        <p class="govuk-body">There is a single combined claim process for both schemes and you can make several claims,
            for different injuries or illnesses related to different periods of service, within a single
            application.</p>
        <p class="govuk-body">You will be asked questions about yourself, your armed forces service and the medical
            conditions you are claiming for. It will help if you have information ready about the dates you served;
            medical treatment you have received; GP/MO and hospital details; details of other benefits or compensation
            you have received and your bank account information (not required for those still serving).</p>

        <h3>Please note:</h3>
        <p class="govuk-body">We don't need you to get any new information you do not already have. We can't refund any
            costs involved if you do this.</p>
        <p class="govuk-body">Please provide details to the best of your memory, even if they are not complete. Do not
            delay submitting your application if you cannot remember exact dates or information, but provide a best
            estimate or recollection.</p>
        <p class="govuk-body">You can return to a partially completed application up to 3 months from when you started,
            providing you have fully completed the “Personal Details” section before you leave.</p>


        <p class="govuk-body">
            <strong>Note for Special Forces Personnel:</strong>
            If you have served (whether directly or in a support role) with United Kingdom Special Forces (UKSF), you
            must seek advice from the MOD A Block Disclosure Cell before using this service. If you have served at any
            time after 1996, you will be subject to the UKSF Confidentiality Contract and must apply for Express Prior
            Authority in Writing (EPAW) through the Disclosure Cell before submitting a claim where you may be asked to
            disclose details of your service with UKSF or any units directly supporting them. The Disclosure Cell can be
            contacted by emailing <a href="mailto:MAB-J1-Disclosures-ISA-Mailbox@mod.gov.uk">MAB-J1-Disclosures-ISA-Mailbox@mod.gov.uk</a>.
        </p>

        <div style="display: flex; flex-direction: row">
            <div style="margin-right: auto; justify-content: center; flex: 1; align-content: center; align-items: center; justify-items: center">
                <a href="{{ route('home') }}" role="button" draggable="false" data-module="govuk-button"
                   class="govuk-button govuk-button--start govuk-!-margin-top-9">
                    Start now
                    <svg class="govuk-button__start-icon" xmlns="http://www.w3.org/2000/svg" width="17.5" height="19"
                         viewBox="0 0 33 40" aria-hidden="true" focusable="false">
                        <path fill="currentColor" d="M0 0h13l20 20-20 20H0l20-20z"/>
                    </svg>
                </a>
            </div>

            {{--
            <div style="align-content: center; flex: 1">
                <div style="text-align: center">
                    <h3>
                        Continue With...
                    </h3>
                    <a href="{{ route('gds') }}" role="button" draggable="false" data-module="govuk-button"
                       class="govuk-button govuk-!-margin-top-2 govuk-!-margin-top-2">
                        GOV UK account
                    </a>
                </div>
            </div>
            --}}
        </div>

        <h2>Help with making a claim</h2>
        <p class="govuk-body">If you need help making a claim, please contact the Veterans UK Helpline for assistance.
            Where needed, our Veterans Welfare Service can arrange an appointment to provide one to one help.</p>
        <p class="govuk-body">You do not need a paid representative such as a solicitor or claims management company to
            apply for compensation. Free independent advice is available from the Veterans Welfare Service or charitable
            organisations.</p>


        <h2>Make a claim by post</h2>
        <p class="govuk-body">Veterans UK still accepts claims by post, you can either:</p>
        <ul>
            <li>Download a claim form from the War Pension Scheme or Armed Forces Compensation Scheme pages, complete it
                and post it back to us, or
            </li>
            <li>Request a paper claim form from the Veterans UK Helpline</li>
        </ul>
    </x-slot>
</x-layout>
