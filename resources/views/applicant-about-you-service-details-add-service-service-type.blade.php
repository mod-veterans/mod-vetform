@php

if (!empty($_POST)) {


    header("Location: /applicant/about-you/service-details/add-service/rank");
    die();


}



@endphp




@include('framework.header')



    <a href="#" onclick="window.history.back()" class="govuk-back-link">Back</a>

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">What was/is your service type?</h1>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group ">
    <a id="afcs/about-you/service-details/service-type/service-type"></a>
    <fieldset class="govuk-fieldset">
                                    <legend
                    class="govuk-fieldset__legend govuk-fieldset__legend--m govuk-visually-hidden">
                    <h1 class
                    ="govuk-fieldset__heading">What was/is your service type? (required)</h1>
                </legend>
                                            <div
            class="govuk-radios govuk-radios--inline"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="afcs/about-you/service-details/service-type/service-type-regular" name="afcs/about-you/service-details/service-type/service-type" type="radio"
           value="Regular"            >
    <label class="govuk-label govuk-radios__label" for="afcs/about-you/service-details/service-type/service-type-regular">Regular</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="afcs/about-you/service-details/service-type/service-type-reserve(includes-full-time-reserve-service)" name="afcs/about-you/service-details/service-type/service-type" type="radio"
           value="Reserve (includes Full Time Reserve Service)"            >
    <label class="govuk-label govuk-radios__label" for="afcs/about-you/service-details/service-type/service-type-reserve(includes-full-time-reserve-service)">Reserve (includes Full Time Reserve Service)</label>
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
