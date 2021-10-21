@php

if (!empty($_POST)) {


    if ($_POST['/claim-details/claim-accident-non-sporting-reported-to/non-sporting-reported-to'] == 'Yes') {

        header("Location: /applicant/claims/specific/non-pt/police-report/reference-number");
        die();

    } else {

        header("Location: /applicant/claims/specific/non-pt/authorised-leave");
        die();
    }
}



@endphp




@include('framework.header')


    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Was the incident reported to the civilian or military police?</h1>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group ">
    <a id="/claim-details/claim-accident-non-sporting-reported-to/non-sporting-reported-to"></a>
    <fieldset class="govuk-fieldset">
                                    <legend
                    class="govuk-fieldset__legend govuk-fieldset__legend--m govuk-visually-hidden">
                    <h1 class
                    ="govuk-fieldset__heading">Was the incident reported to the civilian or military police? (required)</h1>
                </legend>
                                            <div
            class="govuk-radios govuk-radios--inline"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-reported-to/non-sporting-reported-to-yes" name="/claim-details/claim-accident-non-sporting-reported-to/non-sporting-reported-to" type="radio"
           value="Yes"            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-reported-to/non-sporting-reported-to-yes">Yes</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-reported-to/non-sporting-reported-to-no" name="/claim-details/claim-accident-non-sporting-reported-to/non-sporting-reported-to" type="radio"
           value="No"            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-reported-to/non-sporting-reported-to-no">No</label>
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
