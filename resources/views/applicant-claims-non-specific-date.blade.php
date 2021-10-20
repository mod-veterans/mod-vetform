@php

if (!empty($_POST)) {


            header("Location: /applicant/claims/non-specific/illness-related");
            die();


}



@endphp




@include('framework.header')


    <a href="#" onclick="window.history.back()" class="govuk-back-link">Back</a>

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">What was the date your condition started?</h1>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group ">
    <input name="/claim-details/claim-illness-date/date-of-condition-year" type="hidden" value="">
</div>
                                    <div
    class="govuk-form-group "
    aria-describedby="/claim-details/claim-illness-date/date-of-condition-hint  ">

    <fieldset class="govuk-fieldset">


        <div id="/claim-details/claim-illness-date/date-of-condition-hint" class="govuk-hint">For example 27 3 2007. If you can’t remember, enter an approximate year.</div>

        <div class="govuk-date-input" id="/claim-details/claim-illness-date/date-of-condition">
                                                <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="/claim-details/claim-illness-date/date-of-condition-day">
                                Day
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-2 "
            id="/claim-details/claim-illness-date/date-of-condition-day"
            name="/claim-details/claim-illness-date/date-of-condition-day" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="2"
            value="">
    </div>
</div>
                                                    <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="/claim-details/claim-illness-date/date-of-condition-month">
                                Month
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-2 "
            id="/claim-details/claim-illness-date/date-of-condition-month"
            name="/claim-details/claim-illness-date/date-of-condition-month" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="2"
            value="">
    </div>
</div>
                                                    <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="/claim-details/claim-illness-date/date-of-condition-year">
                                Year
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-4 "
            id="/claim-details/claim-illness-date/date-of-condition-year"
            name="/claim-details/claim-illness-date/date-of-condition-year" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="4"
            value="">
    </div>
</div>
                                    </div>
    </fieldset>
</div>
                                    <div class="govuk-checkboxes__item">
            <input id="6166806a32c4a--default" name="/claim-details/claim-illness-date/date-of-condition-estimated" type="hidden" value="No">
        <input class="govuk-checkboxes__input" id="6166806a32c4a" name="/claim-details/claim-illness-date/date-of-condition-estimated" type="checkbox"
           value="Yes"            >
    <label class="govuk-label govuk-checkboxes__label" for="6166806a32c4a">Tick if this date is approximate</label>
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
