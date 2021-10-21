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



    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Claim details</h1>
                                <p class="govuk-body">
                                                                        This form allows you to make multiple claims based on individual injuries, illnesses or conditions that have occured at different points in time as a result of your service.
                                                                </p>
                                                                                                                                    <p class="govuk-body">
                                                                        For a specific accident or incident you can add all of the injuries and conditions sustained in a single claim.
                                                                </p>


                <div class="govuk-form-group govuk-!-margin-top-4">
            <a class="govuk-button" href="/applicant/claims/type">
                Add a claim
            </a>
            <br>
            <a class="govuk-link" href="/tasklist">Return to Task List</a>
        </div>
            </div>
        </div>
    </main>
</div>



@include('framework.footer')
