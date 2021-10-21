@php


if (!empty($_POST)) {

header("Location: /applicant/about-you/contact-address");
die();

}

@endphp




@include('framework.header')

<!--hello there-->
    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">What is your name?</h1>
                                <p class="govuk-body">The name of the person with the injury, illness or disability</p>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="afcs/about-you/personal-details/your-name/last-name">
        Last name/family name (required)
    </label>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="afcs/about-you/personal-details/your-name/last-name" name="afcs/about-you/personal-details/your-name/last-name" type="text"
         autocomplete="family_name"
                  value=""
            >
</div>
                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="afcs/about-you/personal-details/your-name/other-names">
        First name(s)/given name(s) (required)
    </label>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="afcs/about-you/personal-details/your-name/other-names" name="afcs/about-you/personal-details/your-name/other-names" type="text"
                   value=""
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
