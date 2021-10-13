@php

if (!empty($_POST)) {


        header("Location: /applicant/claims/specific/non-pt/what-doing");
        die();

}



@endphp




@include('framework.header')


    <a href="#" onclick="window.history.back()" class="govuk-back-link">Back</a>

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Where were you when the incident happened?</h1>
                                <form method="post" enctype="multipart/form-data" novalidate >
                                @csrf
                                                    <div class="govuk-form-group ">
    <a id="/claim-details/claim-accident-non-sporting-location/non-sporting-location"></a>
    <fieldset class="govuk-fieldset">
                                    <legend
                    class="govuk-fieldset__legend govuk-fieldset__legend--m govuk-visually-hidden">
                    <h1 class
                    ="govuk-fieldset__heading">Where were you when the incident happened? (required)</h1>
                </legend>
                                            <div
            class="govuk-radios"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-location/non-sporting-location-operations-location-overseas" name="/claim-details/claim-accident-non-sporting-location/non-sporting-location" type="radio"
           value="Operations location overseas"            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-location/non-sporting-location-operations-location-overseas">Operations location overseas</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-location/non-sporting-location-operations-location-u-k" name="/claim-details/claim-accident-non-sporting-location/non-sporting-location" type="radio"
           value="Operations location UK"            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-location/non-sporting-location-operations-location-u-k">Operations location UK</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-location/non-sporting-location-home-base" name="/claim-details/claim-accident-non-sporting-location/non-sporting-location" type="radio"
           value="Home base"            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-location/non-sporting-location-home-base">Home base</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-location/non-sporting-location-accommodation-whilst-on-operations" name="/claim-details/claim-accident-non-sporting-location/non-sporting-location" type="radio"
           value="Accommodation whilst on Operations"            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-location/non-sporting-location-accommodation-whilst-on-operations">Accommodation whilst on Operations</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-location/non-sporting-location-accommodation-on-home-base" name="/claim-details/claim-accident-non-sporting-location/non-sporting-location" type="radio"
           value="Accommodation on home base"            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-location/non-sporting-location-accommodation-on-home-base">Accommodation on home base</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-location/non-sporting-location-an-off-duty-location" name="/claim-details/claim-accident-non-sporting-location/non-sporting-location" type="radio"
           value="An off-duty location"            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-location/non-sporting-location-an-off-duty-location">An off-duty location</label>
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
