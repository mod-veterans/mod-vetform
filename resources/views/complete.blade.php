<x-layout>
    <x-slot name="title"></x-slot>
    <x-slot name="body">
        <x-confirmation-panel></x-confirmation-panel>

        <h2 class="govuk-heading-m">Your application has been submitted</h2>
        <p class="govuk-body">Thank you for completing an application for an Armed Forces Compensation or War Pension payment.</p>
        <p class="govuk-body">Your online claim reference number is {{ session('application-reference') }}.</p>
        <p class="govuk-body">Please note that as your claim has now been fully submitted, you can no longer access your
            application online. If you need to make any changes to your application, or would like a copy of it, please
            <a href="https://www.gov.uk/guidance/veterans-uk-contact-us">contact us</a>. However, please note you will
            need to tell us your National Insurance Number if you contact us.</p>

        <h2 class="govuk-heading-m">We welcome your feedback</h2>
        <p class="govuk-body">We would like to know your views about using our online claims service today. Please
            consider completing our <a href="https://surveys.mod.uk/index.php/892274?lang=en">user survey</a> to tell us
            how we can improve.</p>

        <h2 class="govuk-heading-m">What happens next</h2>
        <p class="govuk-body">Your application has now been received at Veterans UK.
            We will carefully consider the information you have told us and will obtain any documents or evidence
            we need to assess your claim. We will contact you if we need any more information.</p>
        <p class="govuk-body">The assessment process can be complex and involves gathering information from many sources.
            This can take some time and whilst we will process your claim as quickly as possible, it may take between
            3 to 11 months to receive a decision.</p>

        <h2 class="govuk-heading-m">How to get in touch</h2>
        <p class="govuk-body">We will write and tell you the outcome of your claim as soon as a decision has been made.
            In the meantime, you can <a href="https://www.gov.uk/guidance/veterans-uk-contact-us">contact us</a> if you
            would like an update on progress or if you have any questions.</p>

        <h2 class="govuk-heading-m">Do you need further help or support?</h2>
        <p class="govuk-body">All veterans and their families are entitled to free help and support from Veterans UK at
            any time. This includes a free helpline and Veterans Welfare Service that can assist with welfare information
            including benefits, social services, employment and financial support. Details of these services can be found
            on our <a href="https://www.gov.uk/government/collections/help-and-welfare-for-veterans-and-those-leaving-the-armed-forces">website</a> </p>


        <p class="govuk-body">
            <a href="https://surveys.mod.uk/index.php/892274?lang=en" class="govuk-link">What did you think of this service?</a>
        </p>
    </x-slot>
</x-layout>
