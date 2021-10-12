@php


if (!empty($_POST)) {

header("Location: /applicant/about-you/ni-number");
die();

}

@endphp




@include('framework.header')

    <a href="#" onclick="window.history.back()" class="govuk-back-link">Back</a>

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">What is your Email address</h1>
                                <p class="govuk-body">
Please tell us the email address you would prefer us to contact you at.  We will only use this to get in touch about your claim.
    </p>


            <form method="post" enctype="multipart/form-data" novalidate>
            @csrf
            <div class="govuk-form-group ">
    <label class="govuk-label" for="afcs/about-you/personal-details/email-address/email-address">
        <span class="govuk-visually-hidden">What is your email address</span>
    </label>
    <div id="afcs/about-you/personal-details/email-address/email-address-hint" class="govuk-hint">We will send confirmation of your claim to this address</div>
        <input
        class="govuk-input govuk-!-width-two-thirds "
        id="afcs/about-you/personal-details/email-address/email-address" name="afcs/about-you/personal-details/email-address/email-address" type="email"
         autocomplete="email"
                  value=""
                aria-describedby="afcs/about-you/personal-details/email-address/email-address-hint"
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
