@php

if (!empty($_POST)) {


        if ($_POST['/claim-details/claim-accident-non-sporting-duty/report'] == 'Yes') {
            header("Location: /applicant/claims/specific/non-pt/incident-report");
            die();

        } else {

            header("Location: /applicant/claims/specific/non-pt/accident-form");
            die();
        }

}



@endphp




@include('framework.header')



    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Did you report the incident?</h1>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group ">
    <a id="/claim-details/claim-accident-non-sporting-duty/non-sporting-duty"></a>
    <fieldset class="govuk-fieldset">

                                            <div
            class="govuk-radios govuk-radios--inline"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-duty/non-sporting-duty-yes" name="/claim-details/claim-accident-non-sporting-duty/report" type="radio"
           value="Yes"  checked            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-duty/reporty-yes">Yes</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-duty/non-sporting-duty-no" name="/claim-details/claim-accident-non-sporting-duty/report" type="radio"
           value="No"            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-duty/report-no">No</label>
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
