@php

if (!empty($_POST)) {


        header("Location: /applicant/other-details/other-compensation/when");
        die();



}



@endphp




@include('framework.header')



    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">What type of payment was this?</h1>
                                <p class="govuk-body">Was this a final settlement or an interim payment made before a full and final decision.</p>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group ">
    <a id="/other-compensation/claim-payment-type/claim-outcome-payment-type"></a>
    <fieldset class="govuk-fieldset">
                                    <legend
                    class="govuk-fieldset__legend govuk-fieldset__legend--m govuk-visually-hidden">
                    <h1 class
                    ="govuk-fieldset__heading">What type of payment was this? (required)</h1>
                </legend>
                                            <div
            class="govuk-radios govuk-radios--inline"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/other-compensation/claim-payment-type/claim-outcome-payment-type-interim-settlement" name="/other-compensation/claim-payment-type/claim-outcome-payment-type" type="radio"
           value="Interim settlement"            >
    <label class="govuk-label govuk-radios__label" for="/other-compensation/claim-payment-type/claim-outcome-payment-type-interim-settlement">Interim settlement</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/other-compensation/claim-payment-type/claim-outcome-payment-type-final-settlement" name="/other-compensation/claim-payment-type/claim-outcome-payment-type" type="radio"
           value="Final settlement"            >
    <label class="govuk-label govuk-radios__label" for="/other-compensation/claim-payment-type/claim-outcome-payment-type-final-settlement">Final settlement</label>
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
