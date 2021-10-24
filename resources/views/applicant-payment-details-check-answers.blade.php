@include('framework.functions')
@php

if (!empty($_POST)) {
    $userID = $_SESSION['vets-user'];
    $data = getData($userID);

    $data['sections']['payment-details']['completed'] = TRUE;

    storeData($userID,$data);

    header("Location: /tasklist");
    die();
}

@endphp


@include('framework.header')


    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Check your answers</h1>
                                <h2 class="govuk-heading-m">Payment details</h2>
        <dl class="govuk-summary-list govuk-!-margin-bottom-9">
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Do you wish to provide your bank account details?</dt>
            <dd class="govuk-summary-list__value">
                                    Yes
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="https://modvets-dev2.london.cloudapps.digital/payment-details/payment-details/bank-details/?return=summarise&amp;stack=#/payment-details/bank-details/bank-details">Change<span
                        class="govuk-visually-hidden"> Do you wish to provide your bank account details?</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Do you wish to provide your bank account details?</dt>
            <dd class="govuk-summary-list__value">
                                    Overseas
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="https://modvets-dev2.london.cloudapps.digital/payment-details/payment-details/bank-location/?return=summarise&amp;stack=#/payment-details/bank-location/bank-location">Change<span
                        class="govuk-visually-hidden"> Do you wish to provide your bank account details?</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Name of bank, building society or other account provider</dt>
            <dd class="govuk-summary-list__value">
                                    plpl
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="https://modvets-dev2.london.cloudapps.digital/payment-details/payment-details/bank-united-kingdom/?return=summarise&amp;stack=#/payment-details/bank-united-kingdom/bank-name">Change<span
                        class="govuk-visually-hidden"> Name of bank, building society or other account provider</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Name on the account</dt>
            <dd class="govuk-summary-list__value">
                                    plpl
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="https://modvets-dev2.london.cloudapps.digital/payment-details/payment-details/bank-united-kingdom/?return=summarise&amp;stack=#/payment-details/bank-united-kingdom/bank-account-name">Change<span
                        class="govuk-visually-hidden"> Name on the account</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Sort code</dt>
            <dd class="govuk-summary-list__value">
                                    sdfghj
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="https://modvets-dev2.london.cloudapps.digital/payment-details/payment-details/bank-united-kingdom/?return=summarise&amp;stack=#/payment-details/bank-united-kingdom/bank-account-sort-code">Change<span
                        class="govuk-visually-hidden"> Sort code</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Account number</dt>
            <dd class="govuk-summary-list__value">
                                    gkgokpkpk
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="https://modvets-dev2.london.cloudapps.digital/payment-details/payment-details/bank-united-kingdom/?return=summarise&amp;stack=#/payment-details/bank-united-kingdom/bank-account-number">Change<span
                        class="govuk-visually-hidden"> Account number</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Building society roll number</dt>
            <dd class="govuk-summary-list__value">
                                    pkpk
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="https://modvets-dev2.london.cloudapps.digital/payment-details/payment-details/bank-united-kingdom/?return=summarise&amp;stack=#/payment-details/bank-united-kingdom/bank-account-roll-number">Change<span
                        class="govuk-visually-hidden"> Building society roll number</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Name on the account</dt>
            <dd class="govuk-summary-list__value">
                                    pk
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="https://modvets-dev2.london.cloudapps.digital/payment-details/payment-details/bank-overseas/?return=summarise&amp;stack=#/payment-details/bank-overseas/bank-account-name">Change<span
                        class="govuk-visually-hidden"> Name on the account</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Sort code</dt>
            <dd class="govuk-summary-list__value">
                                    989898
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="https://modvets-dev2.london.cloudapps.digital/payment-details/payment-details/bank-overseas/?return=summarise&amp;stack=#/payment-details/bank-overseas/bank-account-sort-code">Change<span
                        class="govuk-visually-hidden"> Sort code</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Account number</dt>
            <dd class="govuk-summary-list__value">
                                    980080808
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="https://modvets-dev2.london.cloudapps.digital/payment-details/payment-details/bank-overseas/?return=summarise&amp;stack=#/payment-details/bank-overseas/bank-account-number">Change<span
                        class="govuk-visually-hidden"> Account number</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">International Bank Account Number (IBAN)</dt>
            <dd class="govuk-summary-list__value">
                                    pk
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="https://modvets-dev2.london.cloudapps.digital/payment-details/payment-details/bank-overseas/?return=summarise&amp;stack=#/payment-details/bank-overseas/bank-account-iban">Change<span
                        class="govuk-visually-hidden"> International Bank Account Number (IBAN)</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Bank Identifier Code (BIC)</dt>
            <dd class="govuk-summary-list__value">
                                    pk
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="https://modvets-dev2.london.cloudapps.digital/payment-details/payment-details/bank-overseas/?return=summarise&amp;stack=#/payment-details/bank-overseas/bank-account-bic">Change<span
                        class="govuk-visually-hidden"> Bank Identifier Code (BIC)</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">If this is not your bank account, please tell us whose account it is and why you have chosen this account</dt>
            <dd class="govuk-summary-list__value">
                                    php
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="https://modvets-dev2.london.cloudapps.digital/payment-details/payment-details/bank-overseas/?return=summarise&amp;stack=#/payment-details/bank-overseas/bank-account-confirmation">Change<span
                        class="govuk-visually-hidden"> If this is not your bank account, please tell us whose account it is and why you have chosen this account</span></a>
            </dd>
        </div>
    </dl>
    <form method="post" enctype="multipart/form-data" novalidate>
    @csrf
        <div class="govuk-form-group">
            <button class="govuk-button govuk-!-margin-right-2" data-module="govuk-button">Continue</button>
        </div>
    </form>
            </div>
        </div>
    </main>
</div>



@include('framework.footer')
