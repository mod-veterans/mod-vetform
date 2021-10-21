@php


if (!empty($_POST)) {

header("Location: /applicant/about-you/email-address");
die();

}

@endphp




@include('framework.header')


    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">What is your telephone number?</h1>
                                <p class="govuk-body">We'll use this to contact you if we have any questions about this claim</p>

            <form method="post" enctype="multipart/form-data" novalidate>
            @csrf
                                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="afcs/about-you/personal-details/contact-number/mobile-number">
        Mobile telephone number
    </label>
    <div id="afcs/about-you/personal-details/contact-number/mobile-number-hint" class="govuk-hint">For overseas numbers include the country code</div>
        <input
        class="govuk-input govuk-!-width-two-thirds "
        id="afcs/about-you/personal-details/contact-number/mobile-number" name="afcs/about-you/personal-details/contact-number/mobile-number" type="tel"
         autocomplete="tel"
           inputmode="numeric" pattern="[0-9]*"
                value=""
                aria-describedby="afcs/about-you/personal-details/contact-number/mobile-number-hint"
            >
</div>
                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="afcs/about-you/personal-details/contact-number/alternative-number">
        Alternative telephone number (optional)
    </label>
    <div id="afcs/about-you/personal-details/contact-number/alternative-number-hint" class="govuk-hint">For overseas numbers include the country code</div>
        <input
        class="govuk-input govuk-!-width-two-thirds "
        id="afcs/about-you/personal-details/contact-number/alternative-number" name="afcs/about-you/personal-details/contact-number/alternative-number" type="tel"
         autocomplete="tel"
           inputmode="numeric" pattern="[0-9]*"
                value=""
                aria-describedby="afcs/about-you/personal-details/contact-number/alternative-number-hint"
            >
</div>



                <div class="govuk-form-group">
   <button class="govuk-button govuk-!-margin-right-2" data-module="govuk-button">Save and continue</button>
            <br><a href="/cancel" class="govuk-link"
           data-module="govuk-button">
            Cancel application
        </a>

    </div>
            </form>
            </div>
        </div>
    </main>
</div>


@include('framework.footer')
