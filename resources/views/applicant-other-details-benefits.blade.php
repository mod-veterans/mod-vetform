@php

if (!empty($_POST)) {


        header("Location: /applicant/other-details/benefits/other-payments");
        die();

}



@endphp




@include('framework.header')


    <a href="#" onclick="window.history.back()" class="govuk-back-link">Back</a>

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Are you receiving any of the following?</h1>
                                <p class="govuk-body">
    Payments from the Armed Forces Compensation Scheme and War Pension Scheme MAY affect related benefits from the Department for Work and Pensions or other authorities.
    It is your responsibility to inform the relevant Benefit Office, local authority or Tax Credit Office if you receive payments under one of their schemes.</p>


            <form method="post" enctype="multipart/form-data" novalidate >
            @csrf
                                                    <div class="govuk-form-group">
    <fieldset class="govuk-fieldset" aria-describedby="contact-hint">
                <legend class="govuk-fieldset__legend govuk-fieldset__legend--m">
            <h1 class="govuk-fieldset__heading">Are you receiving any of the following?</h1>
        </legend>
                                <div class="govuk-checkboxes" data-module="govuk-checkboxes">
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="61668e5b34e44" name="/other-benefits/receiving-other-benefits/receiving-benefits[]" type="checkbox"
           value="Tax credits paid to you or your family"            >
    <label class="govuk-label govuk-checkboxes__label" for="61668e5b34e44">Tax credits paid to you or your family</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="61668e5b34fa1" name="/other-benefits/receiving-other-benefits/receiving-benefits[]" type="checkbox"
           value="Housing Benefit or Council Tax Benefit"            >
    <label class="govuk-label govuk-checkboxes__label" for="61668e5b34fa1">Housing Benefit or Council Tax Benefit</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="61668e5b350b3" name="/other-benefits/receiving-other-benefits/receiving-benefits[]" type="checkbox"
           value="Industrial Injuries Disablement Benefit"            >
    <label class="govuk-label govuk-checkboxes__label" for="61668e5b350b3">Industrial Injuries Disablement Benefit</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="61668e5b351ab" name="/other-benefits/receiving-other-benefits/receiving-benefits[]" type="checkbox"
           value="None of the above"            >
    <label class="govuk-label govuk-checkboxes__label" for="61668e5b351ab">None of the above</label>
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
