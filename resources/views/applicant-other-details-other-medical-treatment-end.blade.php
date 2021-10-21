@php

if (!empty($_POST)) {



        header("Location: /applicant/other-details/other-medical-treatment/check-answers");
        die();


}



@endphp




@include('framework.header')


    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">When did this treatment end?</h1>
                                <p class="govuk-body">Please tell us the end date for this period of treatment.
                              If it hasn't yet ended, tick "This treatment has not yet ended"</p>

            <form method="post" enctype="multipart/form-data" novalidate>
            @csrf
                                                    <div class="govuk-form-group ">
    <input name="/other-medical-treatment-end-date/medical-treatment-ended-completed" type="hidden" value="1">
</div>
                                    <div class="govuk-form-group ">
    <input name="/other-medical-treatment-end-date/medical-treatment-end-date-year" type="hidden" value="">
</div>
                                    <div
    class="govuk-form-group "
    aria-describedby="/other-medical-treatment-end-date/medical-treatment-end-date-hint  ">

    <fieldset class="govuk-fieldset">
        <legend class="govuk-fieldset__legend govuk-fieldset__legend--s">
            <h2 class="govuk-fieldset__heading govuk-!-font-weight-regular">
                Date your treatment ended
            </h2>
        </legend>


        <div id="/other-medical-treatment-end-date/medical-treatment-end-date-hint" class="govuk-hint">For example 27 3 2007. If you are not sure, just enter a year.</div>

        <div class="govuk-date-input" id="/other-medical-treatment-end-date/medical-treatment-end-date">
                                                <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="/other-medical-treatment-end-date/medical-treatment-end-date-day">
                                Day
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-2 "
            id="/other-medical-treatment-end-date/medical-treatment-end-date-day"
            name="/other-medical-treatment-end-date/medical-treatment-end-date-day" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="2"
            value="">
    </div>
</div>
                                                    <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="/other-medical-treatment-end-date/medical-treatment-end-date-month">
                                Month
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-2 "
            id="/other-medical-treatment-end-date/medical-treatment-end-date-month"
            name="/other-medical-treatment-end-date/medical-treatment-end-date-month" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="2"
            value="">
    </div>
</div>
                                                    <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="/other-medical-treatment-end-date/medical-treatment-end-date-year">
                                Year
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-4 "
            id="/other-medical-treatment-end-date/medical-treatment-end-date-year"
            name="/other-medical-treatment-end-date/medical-treatment-end-date-year" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="4"
            value="">
    </div>
</div>
                                    </div>
    </fieldset>
</div>
                                    <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="61600b80d46d6" name="/other-medical-treatment-end-date/medical-treatment-end-date-estimated" type="checkbox"
           value="This date is approximate"            >
    <label class="govuk-label govuk-checkboxes__label" for="61600b80d46d6">This date is approximate</label>
</div>
                                    <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="61600b80d4a45" name="/other-medical-treatment-end-date/medical-treatment-not-ended" type="checkbox"
           value="This treatment has not yet ended"            >
    <label class="govuk-label govuk-checkboxes__label" for="61600b80d4a45">This treatment has not yet ended</label>
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
