@include('framework.functions')
@php

$_SESSION['vets-user'] = '';


@endphp




@include('framework.header')


    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Your application has been submitted</h1>
    <p class="govuk-body">Thank you for completing an application for an Armed forces compensation or war pension payment.</p>
    <p class="govuk-body">Your online claim reference number is <strong>WPS/AFCS/1633095191</strong>.</p>
    <p class="govuk-body">Please note that as your claim has now been fully submitted, you can no longer access your application online. If you need to make any changes to your application, or would like a copy of it, please <a href="https://www.gov.uk/guidance/veterans-uk-contact-us" target="_New">contact us</a>, quoting your national insurance number.</p>


    <h2>We welcome your feedback</h2>
    <p class="govuk-body">We would like to know your views about using our online claims service today. Please consider completing our short <a href="https://surveys.mod.uk/index.php/892274?lang=en" target="_New">user survey</a> to tell us how we can improve.</p>

    <h2>What happens next</h2>
    <p class="govuk-body">Your application has now been received at Veterans UK. We will carefully consider the information you have told us and will obtain any evidence we need to assess your claim. We will contact you if we need any more information. The assessment process can be complex and involves gathering information from many sources. This can take some time and whilst we will process your claim as quickly as possible, it may take 3 to 9 months to receive a decision.</p>

    <h2>How to get in touch</h2>
    <p class="govuk-body">We will write and tell you the outcome of your claim as soon as a decision has been made. In the meantime, you can <a href="https://www.gov.uk/guidance/veterans-uk-contact-us" target="_New">contact us</a> if you would like an update on progress or if you have any questions.</p>

    <h2 class="govuk-heading-m">Do you need further help or support?</h2>
    <p class="govuk-body">All veterans and their families are entitled to free help and support from Veterans UK at any time. This includes a free helpline and Veterans Welfare Service that can assist with welfare information including benefits, help in the home, employment and financial support. More information can be found at <a href="https://www.gov.uk/guidance/urgent-help-for-veterans" target="_New">https://www.gov.uk/guidance/urgent-help-for-veterans</a> </p>

 <p class="govuk-body">Thank you<br />MOD Veterans UK</p>


            </div>
        </div>
    </main>
</div>






@include('framework.footer')
