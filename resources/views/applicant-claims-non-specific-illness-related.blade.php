@php

if (!empty($_POST)) {



            header("Location: /applicant/claims/non-specific/exposure-related");
            die();


}



@endphp




@include('framework.header')


    <a href="#" onclick="window.history.back()" class="govuk-back-link">Back</a>

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">What is your Illness/Condition related to?</h1>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group">
    <fieldset class="govuk-fieldset" aria-describedby="contact-hint">
                <legend class="govuk-fieldset__legend govuk-fieldset__legend--m">
            <h1 class="govuk-fieldset__heading">What is your Illness/Condition related to?</h1>
        </legend>
                <div id="-hint" class="govuk-hint">Select all that apply.</div>
                <div class="govuk-checkboxes" data-module="govuk-checkboxes">
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="616680a3c4ce7" name="/claim-details/claim-illness-related/claim-illness-related[]" type="checkbox"
           value="Duties - Operations overseas"            >
    <label class="govuk-label govuk-checkboxes__label" for="616680a3c4ce7">Duties - Operations overseas</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="616680a3c4e3d" name="/claim-details/claim-illness-related/claim-illness-related[]" type="checkbox"
           value="Duties - Operations UK"            >
    <label class="govuk-label govuk-checkboxes__label" for="616680a3c4e3d">Duties - Operations UK</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="616680a3c4f40" name="/claim-details/claim-illness-related/claim-illness-related[]" type="checkbox"
           value="Trade"            >
    <label class="govuk-label govuk-checkboxes__label" for="616680a3c4f40">Trade</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="616680a3c5031" name="/claim-details/claim-illness-related/claim-illness-related[]" type="checkbox"
           value="Training"            >
    <label class="govuk-label govuk-checkboxes__label" for="616680a3c5031">Training</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="616680a3c511c" name="/claim-details/claim-illness-related/claim-illness-related[]" type="checkbox"
           value="Misconduct by others"            >
    <label class="govuk-label govuk-checkboxes__label" for="616680a3c511c">Misconduct by others</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="616680a3c5206" name="/claim-details/claim-illness-related/claim-illness-related[]" type="checkbox"
           value="Consequential to another medical condition"            >
    <label class="govuk-label govuk-checkboxes__label" for="616680a3c5206">Consequential to another medical condition</label>
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
