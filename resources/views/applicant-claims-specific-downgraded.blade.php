@php

if (!empty($_POST)) {



    if ($_POST['/claim-details/claim-downgraded/claim-illness-downgraded'] == 'Yes') {

        header("Location: /applicant/claims/specific/downgraded/when");
        die();

    } else {

        header("Location: /applicant/claims/specific/why-related");
        die();


    }


}



@endphp




@include('framework.header')

    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Were you downgraded for any of the conditions on this claim?</h1>
                                <p class="govuk-body">Tell us only about the conditions you are claiming for.</p>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group ">
    <a id="/claim-details/claim-downgraded/claim-illness-downgraded"></a>
    <fieldset class="govuk-fieldset">
                                    <legend
                    class="govuk-fieldset__legend govuk-fieldset__legend--m govuk-visually-hidden">
                    <h1 class
                    ="govuk-fieldset__heading">Were you downgraded for any of the conditions on this claim? (required)</h1>
                </legend>
                                            <div
            class="govuk-radios govuk-radios--inline"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-downgraded/claim-illness-downgraded-yes" name="/claim-details/claim-downgraded/claim-illness-downgraded" type="radio"
           value="Yes"            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-downgraded/claim-illness-downgraded-yes">Yes</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-downgraded/claim-illness-downgraded-no" name="/claim-details/claim-downgraded/claim-illness-downgraded" type="radio"
           value="No"            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-downgraded/claim-illness-downgraded-no">No</label>
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
