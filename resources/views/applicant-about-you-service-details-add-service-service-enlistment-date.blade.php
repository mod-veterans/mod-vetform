@php

if (!empty($_POST)) {


    header("Location: /applicant/about-you/service-details/add-service/discharge-reason ");
    die();


}



@endphp




@include('framework.header')



    <a href="#" onclick="window.history.back()" class="govuk-back-link">Back</a>

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">What was the date of your enlistment?</h1>
                                <p class="govuk-body">Please tell us the date this period of service started.
                       If you can't remember exactly, include an estimated date even if this is only the year.</p>

            <form method="post" enctype="multipart/form-data" novalidate>
            @csrf
                                                    <div class="govuk-form-group ">
    <input name="afcs/about-you/service-details/service-enlistment-date/enlistment-date-year" type="hidden" value="">
</div>
                                    <div
    class="govuk-form-group "
    aria-describedby="afcs/about-you/service-details/service-enlistment-date/enlistment-date-hint  ">

    <fieldset class="govuk-fieldset">
        <legend class="govuk-fieldset__legend govuk-fieldset__legend--s">
            <h2 class="govuk-fieldset__heading govuk-!-font-weight-regular">
                Date of enlistment
            </h2>
        </legend>


        <div id="afcs/about-you/service-details/service-enlistment-date/enlistment-date-hint" class="govuk-hint">For example 27 3 2007. If you can’t remember, enter an approximate year.</div>

        <div class="govuk-date-input" id="afcs/about-you/service-details/service-enlistment-date/enlistment-date">
                                                <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="afcs/about-you/service-details/service-enlistment-date/enlistment-date-day">
                                Day
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-2 "
            id="afcs/about-you/service-details/service-enlistment-date/enlistment-date-day"
            name="afcs/about-you/service-details/service-enlistment-date/enlistment-date-day" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="2"
            value="">
    </div>
</div>
                                                    <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="afcs/about-you/service-details/service-enlistment-date/enlistment-date-month">
                                Month
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-2 "
            id="afcs/about-you/service-details/service-enlistment-date/enlistment-date-month"
            name="afcs/about-you/service-details/service-enlistment-date/enlistment-date-month" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="2"
            value="">
    </div>
</div>
                                                    <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="afcs/about-you/service-details/service-enlistment-date/enlistment-date-year">
                                Year
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-4 "
            id="afcs/about-you/service-details/service-enlistment-date/enlistment-date-year"
            name="afcs/about-you/service-details/service-enlistment-date/enlistment-date-year" type="text" pattern="[0-9]*" inputmode="numeric"
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
