@php

if (!empty($_POST)) {


    header("Location: /applicant/about-you/service-details/add-service/last-unit-address");
    die();


}



@endphp




@include('framework.header')


    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">What was the date of and reason for your discharge?</h1>
                                <p class="govuk-body">Please tell us the date (if you are no longer serving) this period
                        of service ended.</p>

            <form method="post" enctype="multipart/form-data" novalidate>
            @csrf
                                                    <div class="govuk-checkboxes__item">
            <input id="615ff47dd0131--default" name="afcs/about-you/service-details/service-discharge/service-is-serving" type="hidden" value="No">
        <input class="govuk-checkboxes__input" id="615ff47dd0131" name="afcs/about-you/service-details/service-discharge/service-is-serving" type="checkbox"
           value="Yes"            >
    <label class="govuk-label govuk-checkboxes__label" for="615ff47dd0131">I am still serving</label>
</div>
                                    <div class="govuk-form-group ">
    <input name="afcs/about-you/service-details/service-discharge/date-of-discharge-year" type="hidden" value="">
</div>
                                    <div
    class="govuk-form-group "
    aria-describedby="afcs/about-you/service-details/service-discharge/date-of-discharge-hint  ">

    <fieldset class="govuk-fieldset">
        <legend class="govuk-fieldset__legend govuk-fieldset__legend--s">
            <h2 class="govuk-fieldset__heading">
                Date of discharge
            </h2>
        </legend>


        <div id="afcs/about-you/service-details/service-discharge/date-of-discharge-hint" class="govuk-hint">For example 27 3 2007. If you can’t remember, enter an approximate year.</div>

        <div class="govuk-date-input" id="afcs/about-you/service-details/service-discharge/date-of-discharge">
                                                <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="afcs/about-you/service-details/service-discharge/date-of-discharge-day">
                                Day
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-2 "
            id="afcs/about-you/service-details/service-discharge/date-of-discharge-day"
            name="afcs/about-you/service-details/service-discharge/date-of-discharge-day" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="2"
            value="">
    </div>
</div>
                                                    <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="afcs/about-you/service-details/service-discharge/date-of-discharge-month">
                                Month
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-2 "
            id="afcs/about-you/service-details/service-discharge/date-of-discharge-month"
            name="afcs/about-you/service-details/service-discharge/date-of-discharge-month" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="2"
            value="">
    </div>
</div>
                                                    <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="afcs/about-you/service-details/service-discharge/date-of-discharge-year">
                                Year
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-4 "
            id="afcs/about-you/service-details/service-discharge/date-of-discharge-year"
            name="afcs/about-you/service-details/service-discharge/date-of-discharge-year" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="4"
            value="">
    </div>
</div>


                                    </div>
<br />
        <div class="govuk-checkboxes__item">
            <input id="615ff47dd0131--default" name="afcs/about-you/service-details/service-discharge/service-is-serving" type="hidden" value="No">
        <input class="govuk-checkboxes__input" id="615ff47dd0131" name="afcs/about-you/service-details/service-discharge/service-is-serving" type="checkbox"
           value="Yes"            >
    <label class="govuk-label govuk-checkboxes__label" for="615ff47dd0131">This date is approximate</label>
</div>



    </fieldset>
</div>

                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="afcs/about-you/service-details/service-discharge/service-discharge-reason">
                   <h2 class="govuk-fieldset__heading">
               <strong> Discharge reason</strong>
            </h2>
    </label>
        <div id="afcs/about-you/service-details/service-enlistment-date/enlistment-date-hint" class="govuk-hint">For example, end of engagement.</div>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="afcs/about-you/service-details/service-discharge/service-discharge-reason" name="afcs/about-you/service-details/service-discharge/service-discharge-reason" type="text"
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
            </form>
            </div>
        </div>
    </main>
</div>



@include('framework.footer')
