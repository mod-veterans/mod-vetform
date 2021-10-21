@php

if (!empty($_POST)) {


        header("Location: /applicant/other-details/benefits/check-answers");
        die();

}



@endphp




@include('framework.header')



    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Please tell us the date you received the payment(s) and the amount you received.</h1>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="/other-benefits/other-payment-dates/diffuse-mesothelioma-2014-scheme">
        Diffuse Mesothelioma 2014 Scheme
    </label>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/other-benefits/other-payment-dates/diffuse-mesothelioma-2014-scheme" name="/other-benefits/other-payment-dates/diffuse-mesothelioma-2014-scheme" type="text"
                   value=""
            >
</div>
                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="/other-benefits/other-payment-dates/diffuse-mesothelioma-2008-scheme">
        Diffuse Mesothelioma 2008 Scheme
    </label>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/other-benefits/other-payment-dates/diffuse-mesothelioma-2008-scheme" name="/other-benefits/other-payment-dates/diffuse-mesothelioma-2008-scheme" type="text"
                   value=""
            >
</div>
                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="/other-benefits/other-payment-dates/the-workers-compensation-1979-pneumoconiosis-act">
        The Workers Compensation 1979 Pneumoconiosis Act
    </label>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/other-benefits/other-payment-dates/the-workers-compensation-1979-pneumoconiosis-act" name="/other-benefits/other-payment-dates/the-workers-compensation-1979-pneumoconiosis-act" type="text"
                   value=""
            >
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
