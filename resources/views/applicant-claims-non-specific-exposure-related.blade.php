@php

if (!empty($_POST)) {


            if (!empty($_POST['/claim-details/claim-illness-dueto/claim-illness-due-to'])) {

                if (in_array('Chemical exposure', $_POST['/claim-details/claim-illness-dueto/claim-illness-due-to'])) {

                    header("Location: /applicant/claims/non-specific/chemical-exposure");
                    die();


                } else {

                    header("Location: /applicant/claims/non-specific/medical-attention-date");
                    die();
                }
            } else {

            }

die();

}



@endphp




@include('framework.header')



    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Is your condition due to exposure to?</h1>
                                <form method="post" enctype="multipart/form-data" novalidate >
                                @csrf
                                                    <div class="govuk-form-group">
    <fieldset class="govuk-fieldset" aria-describedby="contact-hint">

                <div id="contact-hint" class="govuk-hint">Select all that apply.</div>
                <div class="govuk-checkboxes" data-module="govuk-checkboxes">
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="616681290a1ae" name="/claim-details/claim-illness-dueto/claim-illness-due-to[]" type="checkbox"
           value="Cold"            >
    <label class="govuk-label govuk-checkboxes__label" for="616681290a1ae">Cold</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="616681290a309" name="/claim-details/claim-illness-dueto/claim-illness-due-to[]" type="checkbox"
           value="Heat"            >
    <label class="govuk-label govuk-checkboxes__label" for="616681290a309">Heat</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="616681290a40e" name="/claim-details/claim-illness-dueto/claim-illness-due-to[]" type="checkbox"
           value="Noise"            >
    <label class="govuk-label govuk-checkboxes__label" for="616681290a40e">Noise, for example gunfire</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="616681290a52b" name="/claim-details/claim-illness-dueto/claim-illness-due-to[]" type="checkbox"
           value="Vibration"            >
    <label class="govuk-label govuk-checkboxes__label" for="616681290a52b">Vibration, for example from using tools</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="616681290a62a" name="/claim-details/claim-illness-dueto/claim-illness-due-to[]" type="checkbox"
           value="Chemical exposure"            >
    <label class="govuk-label govuk-checkboxes__label" for="616681290a62a">Chemical exposure</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="616681290a725" name="/claim-details/claim-illness-dueto/claim-illness-due-to[]" type="checkbox"
           value="None of the above"            >
    <label class="govuk-label govuk-checkboxes__label" for="616681290a725">None of the above</label>
</div>
                    </div>
    </fieldset>
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
