@php

if (!empty($_POST)) {


    if ($_POST['/other-compensation/claim-outcome/claim-outcome-payment-result'] == 'Yes') {

        header("Location: /applicant/other-details/other-compensation/amount-received");
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
                                <h1 class="govuk-heading-xl">Who did you claim from and what was the outcome of the claim?</h1>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-character-count" data-module="govuk-character-count" data-maxlength="500">
    <div class="govuk-form-group">
        <label class="govuk-label" for="/other-compensation/claim-outcome/claim-outcome-benefactor">
        Who did you claim from/amount?
    </label>
                <textarea class="govuk-textarea  govuk-js-character-count " id="/other-compensation/claim-outcome/claim-outcome-benefactor"
                  name="/other-compensation/claim-outcome/claim-outcome-benefactor" rows="5"
                                    aria-describedby="/other-compensation/claim-outcome/claim-outcome-benefactor-info "></textarea>
                    <div id="/other-compensation/claim-outcome/claim-outcome-benefactor-info" class="govuk-hint govuk-character-count__message" aria-live="polite">
                You can enter up to 500 characters
            </div>
    </div>
    </div>
                                    <div class="govuk-form-group ">
    <a id="/other-compensation/claim-outcome/claim-outcome-payment-result"></a>
    <fieldset class="govuk-fieldset">
                                    <legend
                    class="govuk-fieldset__legend govuk-fieldset__legend--m">
                    <h1 class
                    ="govuk-fieldset__heading">Did you receive a payment as a result of this claim? (required)</h1>
                </legend>
                                            <div
            class="govuk-radios govuk-radios--inline"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/other-compensation/claim-outcome/claim-outcome-payment-result-yes" name="/other-compensation/claim-outcome/claim-outcome-payment-result" type="radio"
           value="Yes"            >
    <label class="govuk-label govuk-radios__label" for="/other-compensation/claim-outcome/claim-outcome-payment-result-yes">Yes</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/other-compensation/claim-outcome/claim-outcome-payment-result-no" name="/other-compensation/claim-outcome/claim-outcome-payment-result" type="radio"
           value="No"            >
    <label class="govuk-label govuk-radios__label" for="/other-compensation/claim-outcome/claim-outcome-payment-result-no">No</label>
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
