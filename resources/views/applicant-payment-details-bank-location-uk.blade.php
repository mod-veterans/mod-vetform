@php


if (!empty($_POST)) {


        header("Location: /applicant/payment-details/check-answers");
        die();


}



@endphp




@include('framework.header')



    <a href="#" onclick="window.history.back()" class="govuk-back-link">Back</a>

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">UK bank or building society account details</h1>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="/payment-details/bank-united-kingdom/bank-name">
        Name of bank, building society or other account provider
    </label>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/payment-details/bank-united-kingdom/bank-name" name="/payment-details/bank-united-kingdom/bank-name" type="text"
                   value=""
            >
</div>
                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="/payment-details/bank-united-kingdom/bank-account-name">
        Name on the account
    </label>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/payment-details/bank-united-kingdom/bank-account-name" name="/payment-details/bank-united-kingdom/bank-account-name" type="text"
         autocomplete="name"
                  value=""
            >
</div>
                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="/payment-details/bank-united-kingdom/bank-account-sort-code">
        Sort code
    </label>
    <div id="/payment-details/bank-united-kingdom/bank-account-sort-code-hint" class="govuk-hint">Must be 6 digits</div>
        <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/payment-details/bank-united-kingdom/bank-account-sort-code" name="/payment-details/bank-united-kingdom/bank-account-sort-code" type="numeric"
                   value=""
                aria-describedby="/payment-details/bank-united-kingdom/bank-account-sort-code-hint"
            >
</div>
                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="/payment-details/bank-united-kingdom/bank-account-number">
        Account number
    </label>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/payment-details/bank-united-kingdom/bank-account-number" name="/payment-details/bank-united-kingdom/bank-account-number" type="numeric"
                   value=""
            >
</div>
                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="/payment-details/bank-united-kingdom/bank-account-roll-number">
        Building society roll number
    </label>
    <div id="/payment-details/bank-united-kingdom/bank-account-roll-number-hint" class="govuk-hint">You can find it on your card, statement or passbook.</div>
        <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/payment-details/bank-united-kingdom/bank-account-roll-number" name="/payment-details/bank-united-kingdom/bank-account-roll-number" type="numeric"
                   value=""
                aria-describedby="/payment-details/bank-united-kingdom/bank-account-roll-number-hint"
            >
</div>
                                    <div class="govuk-character-count" data-module="govuk-character-count" data-maxlength="100">
    <div class="govuk-form-group">
        <label class="govuk-label" for="/payment-details/bank-united-kingdom/bank-account-confirmation">
        If this is not your bank account, please tell us whose account it is and why you have chosen this account
    </label>
                <textarea class="govuk-textarea  govuk-js-character-count " id="/payment-details/bank-united-kingdom/bank-account-confirmation"
                  name="/payment-details/bank-united-kingdom/bank-account-confirmation" rows="5"
                                    aria-describedby="/payment-details/bank-united-kingdom/bank-account-confirmation-info "></textarea>
                    <div id="/payment-details/bank-united-kingdom/bank-account-confirmation-info" class="govuk-hint govuk-character-count__message" aria-live="polite">
                You can enter up to 100 characters
            </div>
    </div>
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
