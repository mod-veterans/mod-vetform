@php


if (!empty($_POST)) {

        if ($_POST['/payment-details/bank-details/bank-details'] == 'Yes') {
        header("Location: /applicant/payment-details/bank-location");
        die();
        } else {
        header("Location: /applicant/payment-details/check-answers");
        die();
        }

}



@endphp




@include('framework.header')


    <a href="#" onclick="window.history.back()" class="govuk-back-link">Back</a>

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Providing your bank account details</h1>
                                <p class="govuk-body">Providing your bank account details now will speed up the payment process if your claim is successful.
                       If you would prefer not to provide your account details now, we will contact you again if any money
                       is due to you after your claim is assessed, although this will mean any payment will take longer
                       to be received by you.</p>
                       <p class="govuk-body">
                           <strong>Note for Serving Personnel only:</strong>
                           If you are currently serving and receive your pay via the JPA system, we will pay any money due into the account your salary is paid into.
                       </p>

            <form method="post" enctype="multipart/form-data" novalidate>
            @csrf
                                                    <div class="govuk-form-group ">
    <a id="/payment-details/bank-details/bank-details"></a>
    <fieldset class="govuk-fieldset">
                                    <legend
                    class="govuk-fieldset__legend govuk-fieldset__legend--m">
                    <h1 class
                    ="govuk-fieldset__heading">Do you wish to provide your bank account details? (required)</h1>
                </legend>
                                            <div
            class="govuk-radios"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/payment-details/bank-details/bank-details-yes" name="/payment-details/bank-details/bank-details" type="radio"
           value="Yes"            >
    <label class="govuk-label govuk-radios__label" for="/payment-details/bank-details/bank-details-yes">Yes</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/payment-details/bank-details/bank-details-no-i-am-still-serving-so-any-payments-will-be-made-into-my-j-p-a-salary-account" name="/payment-details/bank-details/bank-details" type="radio"
           value="No I am still serving so any payments will be made into my JPA salary account"            >
    <label class="govuk-label govuk-radios__label" for="/payment-details/bank-details/bank-details-no-i-am-still-serving-so-any-payments-will-be-made-into-my-j-p-a-salary-account">No I am still serving so any payments will be made into my JPA salary account</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/payment-details/bank-details/bank-details-no-i-do-not-want-to-provide-details-now.-please-contact-me-again-if-my-claim-is-successful" name="/payment-details/bank-details/bank-details" type="radio"
           value="No I do not want to provide details now.  Please contact me again if my claim is successful"            >
    <label class="govuk-label govuk-radios__label" for="/payment-details/bank-details/bank-details-no-i-do-not-want-to-provide-details-now.-please-contact-me-again-if-my-claim-is-successful">No I do not want to provide details now.  Please contact me again if my claim is successful</label>
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
