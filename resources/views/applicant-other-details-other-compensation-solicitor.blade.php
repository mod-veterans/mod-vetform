@php

if (!empty($_POST)) {

    if ($_POST['/other-compensation/claim-solicitor-help/claim-solicitor-help'] == 'Yes') {

        header("Location: /applicant/other-details/other-compensation/solicitor/details");
        die();

    } else {


        header("Location: /applicant/other-details/other-compensation/check-answers");
        die();

    }









}



@endphp




@include('framework.header')



    <a href="#" onclick="window.history.back()" class="govuk-back-link">Back</a>

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Did a solicitor help you with your claim for other compensation?</h1>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group ">
    <a id="/other-compensation/claim-solicitor-help/claim-solicitor-help"></a>
    <fieldset class="govuk-fieldset">
                                    <legend
                    class="govuk-fieldset__legend govuk-fieldset__legend--m">
                    <h1 class
                    ="govuk-fieldset__heading">Did a solicitor help you with your claim for other compensation? (required)</h1>
                </legend>
                                            <div
            class="govuk-radios govuk-radios--inline"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/other-compensation/claim-solicitor-help/claim-solicitor-help-yes" name="/other-compensation/claim-solicitor-help/claim-solicitor-help" type="radio"
           value="Yes"            >
    <label class="govuk-label govuk-radios__label" for="/other-compensation/claim-solicitor-help/claim-solicitor-help-yes">Yes</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/other-compensation/claim-solicitor-help/claim-solicitor-help-no" name="/other-compensation/claim-solicitor-help/claim-solicitor-help" type="radio"
           value="No"            >
    <label class="govuk-label govuk-radios__label" for="/other-compensation/claim-solicitor-help/claim-solicitor-help-no">No</label>
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
