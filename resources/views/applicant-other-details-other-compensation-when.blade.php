@php

if (!empty($_POST)) {


        header("Location: /applicant/other-details/other-compensation/solicitor");
        die();



}


@endphp




@include('framework.header')


    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">When did you receive this payment?</h1>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group ">
    <input name="/other-compensation/claim-payment-date/claim-payment-date-year" type="hidden" value="">
</div>
                                    <div
    class="govuk-form-group "
    aria-describedby="/other-compensation/claim-payment-date/claim-payment-date-hint  ">

    <fieldset class="govuk-fieldset">



        <div id="/other-compensation/claim-payment-date/claim-payment-date-hint" class="govuk-hint">For example 27 3 2007. If you can’t remember, enter an approximate year.</div>

        <div class="govuk-date-input" id="/other-compensation/claim-payment-date/claim-payment-date">
                                                <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="/other-compensation/claim-payment-date/claim-payment-date-day">
                                Day
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-2 "
            id="/other-compensation/claim-payment-date/claim-payment-date-day"
            name="/other-compensation/claim-payment-date/claim-payment-date-day" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="2"
            value="">
    </div>
</div>
                                                    <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="/other-compensation/claim-payment-date/claim-payment-date-month">
                                Month
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-2 "
            id="/other-compensation/claim-payment-date/claim-payment-date-month"
            name="/other-compensation/claim-payment-date/claim-payment-date-month" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="2"
            value="">
    </div>
</div>
                                                    <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="/other-compensation/claim-payment-date/claim-payment-date-year">
                                Year
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-4 "
            id="/other-compensation/claim-payment-date/claim-payment-date-year"
            name="/other-compensation/claim-payment-date/claim-payment-date-year" type="text" pattern="[0-9]*" inputmode="numeric"
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
