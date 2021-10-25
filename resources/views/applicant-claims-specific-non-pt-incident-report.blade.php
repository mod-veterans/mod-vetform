@php

if (!empty($_POST)) {


        header("Location: /applicant/claims/specific/non-pt/accident-form");
        die();

}



@endphp




@include('framework.header')



    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Who did you report the incident to?</h1>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group">
    <fieldset class="govuk-fieldset" aria-describedby="contact-hint">
                <legend class="govuk-fieldset__legend govuk-fieldset__legend--m">
            <h1 class="govuk-fieldset__heading">Who did you report the incident to?</h1>
        </legend>
                <div id="contact-hint" class="govuk-hint">Select all that apply.</div>
                <div class="govuk-checkboxes" data-module="govuk-checkboxes">
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="61666fc5b995f" name="/claim-details/claim-accident-non-sporting-report-to/claim-accident-non-sporting-report-to[]" type="checkbox"
           value="Unit medic"            >
    <label class="govuk-label govuk-checkboxes__label" for="61666fc5b995f">Unit medic</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="61666fc5b9ae5" name="/claim-details/claim-accident-non-sporting-report-to/claim-accident-non-sporting-report-to[]" type="checkbox"
           value="Hospital"            >
    <label class="govuk-label govuk-checkboxes__label" for="61666fc5b9ae5">Hospital</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="61666fc5b9bfb" name="/claim-details/claim-accident-non-sporting-report-to/claim-accident-non-sporting-report-to[]" type="checkbox"
           value="Chain of command"            >
    <label class="govuk-label govuk-checkboxes__label" for="61666fc5b9bfb">Chain of command</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="61666fc5b9cf2" name="/claim-details/claim-accident-non-sporting-report-to/claim-accident-non-sporting-report-to[]" type="checkbox"
           value="Colleague"            >
    <label class="govuk-label govuk-checkboxes__label" for="61666fc5b9cf2">Colleague</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="61666fc5b9ddf" name="/claim-details/claim-accident-non-sporting-report-to/claim-accident-non-sporting-report-to[]" type="checkbox"
           value="Other person"            >
    <label class="govuk-label govuk-checkboxes__label" for="61666fc5b9ddf">Other person</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="61666fc5b9edb" name="/claim-details/claim-accident-non-sporting-report-to/claim-accident-non-sporting-report-to[]" type="checkbox"
           value="I didn&#039;t report the incident"            >
    <label class="govuk-label govuk-checkboxes__label" for="61666fc5b9edb">I didn&#039;t report the incident</label>
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
