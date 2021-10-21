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



    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Did you receive a payment as a result of this claim? </h1>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-character-count" data-module="govuk-character-count" data-maxlength="500">

    </div>
                                    <div class="govuk-form-group ">
    <a id="/other-compensation/claim-outcome/claim-outcome-payment-result"></a>
    <fieldset class="govuk-fieldset">

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
