@php

if (!empty($_POST)) {


    if ($_POST['/treatment-status/treatment-status'] == 'Yes') {

        header("Location: /applicant/other-details/other-medical-treatment/hospital-address");
        die();

    } else {

        header("Location: /applicant/other-details/other-medical-treatment/no-check-answers");
        die();
    }

}



@endphp




@include('framework.header')


    <a href="#" onclick="window.history.back()" class="govuk-back-link">Back</a>

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Have you had any further hospital or medical treatment?</h1>
                                <form method="post" enctype="multipart/form-data" novalidate >
                                @csrf
                                                    <div class="govuk-form-group ">
    <a id="/treatment-status/treatment-status"></a>
    <fieldset class="govuk-fieldset">
                                    <legend
                    class="govuk-fieldset__legend govuk-fieldset__legend--m govuk-visually-hidden">
                    <h1 class
                    ="govuk-fieldset__heading">Have you had any further hospital or medical treatment? (required)</h1>
                </legend>
                                            <div
            class="govuk-radios govuk-radios--inline"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/treatment-status/treatment-status-yes" name="/treatment-status/treatment-status" type="radio"
           value="Yes"            >
    <label class="govuk-label govuk-radios__label" for="/treatment-status/treatment-status-yes">Yes</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/treatment-status/treatment-status-no" name="/treatment-status/treatment-status" type="radio"
           value="No"            >
    <label class="govuk-label govuk-radios__label" for="/treatment-status/treatment-status-no">No - I have not received any further medical treatment.</label>
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
