@php

if (!empty($_POST)) {



        header("Location: /applicant/other-details/other-compensation/type");
        die();


}



@endphp




@include('framework.header')


    <a href="#" onclick="window.history.back()" class="govuk-back-link">Back</a>

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Please tell us the amount of any payment you received</h1>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="/other-compensation/other-payment-received/amount-paid">
        Amount paid
    </label>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/other-compensation/other-payment-received/amount-paid" name="/other-compensation/other-payment-received/amount-paid" type="text"
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
