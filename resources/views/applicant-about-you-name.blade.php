@php


if (!empty($_POST)) {

header("Location: /applicant/about-you/contact-address");
die();

}

@endphp




@include('framework.header')

<!--hello there-->
    <a href="#" onclick="window.history.back()" class="govuk-back-link">Back</a>

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">What is your name?</h1>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="afcs/about-you/personal-details/your-name/last-name">
        Surname or family name
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
        All other names in full
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
