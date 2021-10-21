@php


if (!empty($_POST)) {

        if ($_POST['/payment-details/bank-location/bank-location'] == 'In the United Kingdom') {
        header("Location: /applicant/payment-details/bank-location/uk");
        die();
        } else {
        header("Location: /applicant/payment-details/bank-location/overseas");
        die();
        }

}



@endphp




@include('framework.header')


    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Where is your bank account located?</h1>
                                <form method="post" enctype="multipart/form-data" novalidate >
                                @csrf
                                                    <div class="govuk-form-group ">
    <a id="/payment-details/bank-location/bank-location"></a>
    <fieldset class="govuk-fieldset">
                                    <legend
                    class="govuk-fieldset__legend govuk-fieldset__legend--m govuk-visually-hidden">
                    <h1 class
                    ="govuk-fieldset__heading">Do you wish to provide your bank account details? (required)</h1>
                </legend>
                                            <div
            class="govuk-radios govuk-radios--inline"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/payment-details/bank-location/bank-location-in-the-united-kingdom" name="/payment-details/bank-location/bank-location" type="radio"
           value="In the United Kingdom"            >
    <label class="govuk-label govuk-radios__label" for="/payment-details/bank-location/bank-location-in-the-united-kingdom">In the United Kingdom</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/payment-details/bank-location/bank-location-overseas" name="/payment-details/bank-location/bank-location" type="radio"
           value="Overseas"            >
    <label class="govuk-label govuk-radios__label" for="/payment-details/bank-location/bank-location-overseas">Overseas</label>
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
