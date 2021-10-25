@php

if (!empty($_POST)) {


        header("Location: /applicant/claims/specific/non-pt/rta");
        die();

}



@endphp




@include('framework.header')


    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Where were you when the incident happened?</h1>
                                <form method="post" enctype="multipart/form-data" novalidate >
                                @csrf
                                                    <div class="govuk-form-group ">
    <a id="/claim-details/claim-accident-non-sporting-location/non-sporting-location"></a>
    <fieldset class="govuk-fieldset" aria-describedby="contact-hint">

                <div id="contact-hint" class="govuk-hint">Tick all that apply.</div>
                <div class="govuk-checkboxes" data-module="govuk-checkboxes">
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="616680a3c4ce7" name="/claim-details/claim-illness-related/claim-illness-related[]" type="checkbox"
           value="Duties - Operations overseas"            >
    <label class="govuk-label govuk-checkboxes__label" for="616680a3c4ce7">An operations location overseas</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="616680a3c4e3d" name="/claim-details/claim-illness-related/claim-illness-related[]" type="checkbox"
           value="Duties - Operations UK"            >
    <label class="govuk-label govuk-checkboxes__label" for="616680a3c4e3d">An operations location UK</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="616680a3c4f40" name="/claim-details/claim-illness-related/claim-illness-related[]" type="checkbox"
           value="duties uk - not on operations"            >
    <label class="govuk-label govuk-checkboxes__label" for="616680a3c4f40">My home base</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="616680a3c5031" name="/claim-details/claim-illness-related/claim-illness-related[]" type="checkbox"
           value="Training"            >
    <label class="govuk-label govuk-checkboxes__label" for="616680a3c5031">A training location</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="616680a3c511c" name="/claim-details/claim-illness-related/claim-illness-related[]" type="checkbox"
           value="Misconduct by others"            >
    <label class="govuk-label govuk-checkboxes__label" for="616680a3c511c">Accommodation</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="616680a3c5206" name="/claim-details/claim-illness-related/claim-illness-related[]" type="checkbox"
           value="Consequential to another medical condition"            >
    <label class="govuk-label govuk-checkboxes__label" for="616680a3c5206">An off-duty location</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="616680a3c5207" name="/claim-details/claim-illness-related/claim-illness-related[]" type="checkbox"
           value="Consequential to another medical condition"            >
    <label class="govuk-label govuk-checkboxes__label" for="616680a3c5207">Travelling</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="616680a3c5208" name="/claim-details/claim-illness-related/claim-illness-related[]" type="checkbox"
           value="Other"            >
    <label class="govuk-label govuk-checkboxes__label" for="616680a3c5208">Other</label>
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
