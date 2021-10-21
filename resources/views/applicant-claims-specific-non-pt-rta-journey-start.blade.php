@php

if (!empty($_POST)) {

        header("Location: /applicant/claims/specific/non-pt/rta/journey-end");
        die();

}



@endphp




@include('framework.header')


    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Where did your journey start?</h1>
                                <p class="govuk-body">Select the option that best applies</p>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group ">
    <a id="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from"></a>
    <fieldset class="govuk-fieldset">
                                    <legend
                    class="govuk-fieldset__legend govuk-fieldset__legend--m govuk-visually-hidden">
                    <h1 class
                    ="govuk-fieldset__heading">Where did your journey start? (required)</h1>
                </legend>
                                            <div
            class="govuk-radios"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from-operations-location-overseas" name="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from" type="radio"
           value="Operations location overseas"            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from-operations-location-overseas">A place where I was completing my duties overseas</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from-operations-location--u-k" name="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from" type="radio"
           value="Operations location - UK"            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from-operations-location--u-k">A place where I was completing my duties on operations in the UK</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from-accommodation--field" name="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from" type="radio"
           value="Accommodation - field"            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from-accommodation--field">My accommodation when on operations overseas</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from-accommodation--base" name="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from" type="radio"
           value="Accommodation - base"            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from-accommodation--base">My accommodation when on operations in the UK</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from-home-base" name="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from" type="radio"
           value="Home base"            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from-home-base">My usual base</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from-an-off-duty-location" name="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from" type="radio"
           value="An off-duty location"            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from-an-off-duty-location">Another duty related location</label>
</div>


                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from-your-home" name="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from" type="radio"
           value="Your home"            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from-your-home">My home</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from-an-off-duty-location" name="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from" type="radio"
           value="An off-duty location"            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from-an-off-duty-location">Another personal off-duty location</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from-an-off-duty-location" name="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from" type="radio"
           value="An off-duty location"            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from-an-off-duty-location">None of the above</label>
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
