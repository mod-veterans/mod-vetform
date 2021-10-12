@php

if (!empty($_POST)) {



        header("Location: /applicant/other-details/other-medical-treatment/treatment-end");
        die();

}



@endphp




@include('framework.header')


    <a href="#" onclick="window.history.back()" class="govuk-back-link">Back</a>

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">When did this treatment start?</h1>
                                <p class="govuk-body">If you have received treatment at this hospital medical facility on
                              more than one occasion, please tell us the first time you visited</p>

            <form method="post" enctype="multipart/form-data" novalidate >
            @csrf
                                                    <div class="govuk-form-group ">
    <input name="/other-medical-treatment-start-date/medical-treatment-start-completed" type="hidden" value="1">
</div>
                                    <div class="govuk-form-group ">
    <input name="/other-medical-treatment-start-date/medical-treatment-start-date-year" type="hidden" value="">
</div>
                                    <div
    class="govuk-form-group "
    aria-describedby="/other-medical-treatment-start-date/medical-treatment-start-date-hint  ">

    <fieldset class="govuk-fieldset">
        <legend class="govuk-fieldset__legend govuk-fieldset__legend--s">
            <h2 class="govuk-fieldset__heading govuk-!-font-weight-regular">
                Date your treatment started. If you are not sure, just enter a year.
            </h2>
        </legend>


        <div id="/other-medical-treatment-start-date/medical-treatment-start-date-hint" class="govuk-hint">For example 27 3 2007. If you can’t remember, enter an approximate year.</div>

        <div class="govuk-date-input" id="/other-medical-treatment-start-date/medical-treatment-start-date">
                                                <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="/other-medical-treatment-start-date/medical-treatment-start-date-day">
                                Day
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-2 "
            id="/other-medical-treatment-start-date/medical-treatment-start-date-day"
            name="/other-medical-treatment-start-date/medical-treatment-start-date-day" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="2"
            value="">
    </div>
</div>
                                                    <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="/other-medical-treatment-start-date/medical-treatment-start-date-month">
                                Month
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-2 "
            id="/other-medical-treatment-start-date/medical-treatment-start-date-month"
            name="/other-medical-treatment-start-date/medical-treatment-start-date-month" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="2"
            value="">
    </div>
</div>
                                                    <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="/other-medical-treatment-start-date/medical-treatment-start-date-year">
                                Year
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-4 "
            id="/other-medical-treatment-start-date/medical-treatment-start-date-year"
            name="/other-medical-treatment-start-date/medical-treatment-start-date-year" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="4"
            value="">
    </div>
</div>
                                    </div>
    </fieldset>
</div>
                                    <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="61600aeeaf6fd" name="/other-medical-treatment-start-date/medical-treatment-start-date-estimated" type="checkbox"
           value="This date is approximate"            >
    <label class="govuk-label govuk-checkboxes__label" for="61600aeeaf6fd">This date is approximate</label>
</div>
                                    <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="61600aeeaf991" name="/other-medical-treatment-start-date/medical-treatment-start-date-waiting-list" type="checkbox"
           value="I am still on a waiting list to attend"            >
    <label class="govuk-label govuk-checkboxes__label" for="61600aeeaf991">I am still on a waiting list to attend</label>
</div>



                <div class="govuk-form-group">
   <button class="govuk-button govuk-!-margin-right-2" data-module="govuk-button">Save and continue</button>
            <br><a href="https://modvets-dev2.london.cloudapps.digital/cancel" class="govuk-link"
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
