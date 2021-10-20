@php

if (!empty($_POST)) {

        if ($_POST['/claim-details/claim-accident-non-sporting-road-traffic/non-sporting-road-traffic'] == 'Yes') {

        header("Location: /applicant/claims/specific/non-pt/rta/journey-reason");
        die();

        } else {

        header("Location: /applicant/claims/specific/non-pt/police-report");
        die();

        }
}



@endphp




@include('framework.header')

    <a href="#" onclick="window.history.back()" class="govuk-back-link">Back</a>

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Was the incident a road traffic accident?</h1>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group ">
    <a id="/claim-details/claim-accident-non-sporting-road-traffic/non-sporting-road-traffic"></a>
    <fieldset class="govuk-fieldset">

                                            <div
            class="govuk-radios govuk-radios--inline"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-road-traffic/non-sporting-road-traffic-yes" name="/claim-details/claim-accident-non-sporting-road-traffic/non-sporting-road-traffic" type="radio"
           value="Yes"            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-road-traffic/non-sporting-road-traffic-yes">Yes</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-road-traffic/non-sporting-road-traffic-no" name="/claim-details/claim-accident-non-sporting-road-traffic/non-sporting-road-traffic" type="radio"
           value="No"            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-road-traffic/non-sporting-road-traffic-no">No</label>
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
