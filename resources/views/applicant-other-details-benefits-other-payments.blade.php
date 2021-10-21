@php

if (!empty($_POST)) {


    if ($_POST['/other-benefits/receiving-payments/payments'] == 'Yes') {

        header("Location: /applicant/other-details/benefits/other-payments/details");
        die();

    } else {

        header("Location: /applicant/other-details/benefits/check-answers");
        die();

    }




}



@endphp




@include('framework.header')



    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Have you ever been paid any of the following?</h1>
                                <p class="govuk-body">These schemes make payments for certain illnesses caused by exposure to asbestos and dust.</p>
                       <ul class="govuk-list govuk-list--bullet govuk-list--spaced">
                         <li>Diffuse Mesothelioma 2014 Scheme</li>
                         <li>Diffuse Mesothelioma 2008 Scheme</li>
                         <li>The Workers Compensation 1979 Pneumoconiosis Act</li>
                       </ul>

            <form method="post" enctype="multipart/form-data" novalidate >
            @csrf
                                                    <div class="govuk-form-group ">
    <a id="/other-benefits/receiving-payments/payments"></a>
    <fieldset class="govuk-fieldset">
                                    <legend
                    class="govuk-fieldset__legend govuk-fieldset__legend--m govuk-visually-hidden">
                    <h1 class
                    ="govuk-fieldset__heading">Have you ever been paid any of the following? (required)</h1>
                </legend>
                                            <div
            class="govuk-radios govuk-radios--inline"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/other-benefits/receiving-payments/payments-yes" name="/other-benefits/receiving-payments/payments" type="radio"
           value="Yes"  checked            >
    <label class="govuk-label govuk-radios__label" for="/other-benefits/receiving-payments/payments-yes">Yes</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/other-benefits/receiving-payments/payments-no" name="/other-benefits/receiving-payments/payments" type="radio"
           value="No"            >
    <label class="govuk-label govuk-radios__label" for="/other-benefits/receiving-payments/payments-no">No</label>
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
