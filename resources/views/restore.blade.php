@php

if (!empty($_POST)) {

header("Location: /tasklist");
die();

}

@endphp

@include('framework.header')
    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Return to an application already started</h1>
                                <p class="govuk-body">Please enter the following details so we can find your application</p>
            <form method="post" enctype="multipart/form-data" novalidate>
            @csrf
                                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="afcs/about-you/personal-details/your-name/last-name">
        Surname or family name
    </label>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="afcs/about-you/personal-details/your-name/last-name" name="afcs/about-you/personal-details/your-name/last-name" type="text"
         autocomplete="family_name"
                  value=""
            >
</div>
                                    <div
    class="govuk-form-group "
    aria-describedby=" ">

    <fieldset class="govuk-fieldset">
        <legend class="govuk-fieldset__legend govuk-fieldset__legend--s">
            <h2 class="govuk-fieldset__heading govuk-!-font-weight-regular">
                Date of birth
            </h2>
        </legend>



        <div class="govuk-date-input" id="afcs/about-you/personal-details/date-of-birth/date-of-birth">
                                                <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="afcs/about-you/personal-details/date-of-birth/date-of-birth-day">
                                Day
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-2 "
            id="afcs/about-you/personal-details/date-of-birth/date-of-birth-day"
            name="afcs/about-you/personal-details/date-of-birth/date-of-birth-day" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="2"
            value="">
    </div>
</div>
                                                    <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="afcs/about-you/personal-details/date-of-birth/date-of-birth-month">
                                Month
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-2 "
            id="afcs/about-you/personal-details/date-of-birth/date-of-birth-month"
            name="afcs/about-you/personal-details/date-of-birth/date-of-birth-month" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="2"
            value="">
    </div>
</div>
                                                    <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="afcs/about-you/personal-details/date-of-birth/date-of-birth-year">
                                Year
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-4 "
            id="afcs/about-you/personal-details/date-of-birth/date-of-birth-year"
            name="afcs/about-you/personal-details/date-of-birth/date-of-birth-year" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="4"
            value="">
    </div>
</div>
                                    </div>
    </fieldset>
</div>
                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="afcs/about-you/personal-details/national-insurance/ni-number">
        NI Number
    </label>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="afcs/about-you/personal-details/national-insurance/ni-number" name="afcs/about-you/personal-details/national-insurance/ni-number" type="text"
                   value=""
            >
</div>
                                <div class="govuk-form-group">
    <button class="govuk-button govuk-!-margin-right-2" data-module="govuk-button">Continue</button>

    </div>
            </form>
            </div>
        </div>
    </main>
</div>
@include('framework.footer')
