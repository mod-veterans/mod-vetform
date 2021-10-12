@php


if (!empty($_POST)) {

header("Location: /applicant/about-you/telephone-number");
die();

}

@endphp




@include('framework.header')


    <a href="#" onclick="window.history.back()" class="govuk-back-link">Back</a>

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">What is your date of birth?</h1>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div
    class="govuk-form-group "
    aria-describedby="afcs/about-you/personal-details/date-of-birth/date-of-birth-hint  ">

    <fieldset class="govuk-fieldset">
        <legend class="govuk-fieldset__legend govuk-fieldset__legend--s">
            <h2 class="govuk-fieldset__heading govuk-!-font-weight-regular">
                Date of birth
            </h2>
        </legend>


        <div id="afcs/about-you/personal-details/date-of-birth/date-of-birth-hint" class="govuk-hint">For example 27 3 2007</div>

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
