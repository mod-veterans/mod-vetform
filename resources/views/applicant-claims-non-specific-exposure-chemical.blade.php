@php

if (!empty($_POST)) {



                header("Location: /applicant/claims/non-specific/medical-attention-date");
                die();


}



@endphp




@include('framework.header')



    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Please tell us about your chemical exposure?</h1>
                                <form method="post" enctype="multipart/form-data" novalidate >
                                @csrf
                                    <div class="govuk-form-group ">
 <div class="govuk-form-group">
        <label class="govuk-label" for="/claim-details/claim-accident-sporting-medical-condition/claim-accident-sporting-medical-condition">
        What substances?
    </label>
                <textarea class="govuk-textarea " id="/claim-details/claim-accident-sporting-medical-condition/claim-accident-sporting-medical-condition"
                  name="/claim-details/claim-accident-sporting-medical-condition/claim-accident-sporting-medical-condition" rows="5"
                                    aria-describedby=""></textarea>
  <div id="with-hint-info" class="govuk-hint govuk-character-count__message" aria-live="polite">
    You can enter up to 200 characters
  </div>
        </div>

    <fieldset class="govuk-fieldset">
        <legend class="govuk-fieldset__legend govuk-fieldset__legend--s">
            <h2 class="govuk-fieldset__heading govuk-!-font-weight-regular">
                Date you were first exposed to these?
            </h2>
        </legend>


        <div id="/claim-details/claim-illness-first-medical-attention-date/claim-surgery-treatment-date-hint" class="govuk-hint">For example 27 3 2007. If you can’t remember, enter an approximate year.</div>

        <div class="govuk-date-input" id="/claim-details/claim-illness-first-medical-attention-date/claim-surgery-treatment-date">
                                                <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="/claim-details/claim-illness-first-medical-attention-date/claim-surgery-treatment-date-day">
                                Day
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-2 "
            id="/claim-details/claim-illness-first-medical-attention-date/claim-surgery-treatment-date-day"
            name="/claim-details/claim-illness-first-medical-attention-date/claim-surgery-treatment-date-day" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="2"
            value="">
    </div>
</div>
                                                    <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="/claim-details/claim-illness-first-medical-attention-date/claim-surgery-treatment-date-month">
                                Month
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-2 "
            id="/claim-details/claim-illness-first-medical-attention-date/claim-surgery-treatment-date-month"
            name="/claim-details/claim-illness-first-medical-attention-date/claim-surgery-treatment-date-month" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="2"
            value="">
    </div>
</div>
                                                    <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="/claim-details/claim-illness-first-medical-attention-date/claim-surgery-treatment-date-year">
                                Year
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-4 "
            id="/claim-details/claim-illness-first-medical-attention-date/claim-surgery-treatment-date-year"
            name="/claim-details/claim-illness-first-medical-attention-date/claim-surgery-treatment-date-year" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="4"
            value="">
    </div>
</div>
                                    </div>
    </fieldset>

                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__address-line-2">
        <span>Length of exposure?</span>
    </label>
            <input
        class="govuk-input  "
        id="/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__address-line-2" name="/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__address-line-2" type="text"
         autocomplete="address-line2"
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
    </div>
            </form>
            </div>
        </div>
        </div>
    </main>
</div>



@include('framework.footer')
