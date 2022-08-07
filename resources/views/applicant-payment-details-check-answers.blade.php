@include('framework.functions')
@php

    $userID = $_SESSION['vets-user'];
    $data = getData($userID);

if (!empty($_POST)) {


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

 @if(!empty($data['sections']['bank-account']['providebank']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Do you wish to provide your bank account details?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['bank-account']['providebank'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/payment-details/?return=/applicant/payment-details/check-answers&amp;stack=#/payment-details/bank-details/bank-details">Change<span
                        class="govuk-visually-hidden"> Do you wish to provide your bank account details?</span></a>
            </dd>
        </div>
@endif

@php
if ( (!empty($data['sections']['bank-account']['bank-address'])) && (!empty($data['sections']['bank-account']['providebank'])) && ($data['sections']['bank-account']['providebank'] == 'Yes') ) {
@endphp


 @if(!empty($data['sections']['bank-account']['banklocation']))

            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Where is your bank account?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['bank-account']['banklocation'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/payment-details/bank-location/uk/?return=/applicant/payment-details/check-answers&amp;stack=#/payment-details/bank-location/bank-location">Change<span
                        class="govuk-visually-hidden"> Do you wish to provide your bank account details?</span></a>
            </dd>
        </div>
@endif
 @if(!empty($data['sections']['bank-account']['bank-address']['bankname']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Name of bank, building society or other account provider</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['bank-account']['bank-address']['bankname'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/payment-details/bank-location/uk/?return=/applicant/payment-details/check-answers&amp;stack=#/payment-details/bank-united-kingdom/bank-name">Change<span
                        class="govuk-visually-hidden"> Name of bank, building society or other account provider</span></a>
            </dd>
        </div>
@endif
 @if(!empty($data['sections']['bank-account']['bank-address']['accountname']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Name on the account</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['bank-account']['bank-address']['accountname'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/payment-details/bank-location/uk/?return=/applicant/payment-details/check-answers&amp;stack=#/payment-details/bank-united-kingdom/bank-account-name">Change<span
                        class="govuk-visually-hidden"> Name on the account</span></a>
            </dd>
        </div>
@endif
 @if(!empty($data['sections']['bank-account']['bank-address']['sortcode']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Sort code</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['bank-account']['bank-address']['sortcode'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/payment-details/bank-location/uk/?return=/applicant/payment-details/check-answers&amp;stack=#/payment-details/bank-united-kingdom/bank-account-sort-code">Change<span
                        class="govuk-visually-hidden"> Sort code</span></a>
            </dd>
        </div>
@endif
 @if(!empty($data['sections']['bank-account']['bank-address']['accountnumber']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Account number</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['bank-account']['bank-address']['accountnumber'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/payment-details/bank-location/uk/?return=/applicant/payment-details/check-answers&amp;stack=#/payment-details/bank-united-kingdom/bank-account-number">Change<span
                        class="govuk-visually-hidden"> Account number</span></a>
            </dd>
        </div>
@endif
 @if(!empty($data['sections']['bank-account']['bank-address']['rollnumber']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Building society roll number</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['bank-account']['bank-address']['rollnumber'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/payment-details/bank-location/uk/?return=/applicant/payment-details/check-answers&amp;stack=#/payment-details/bank-united-kingdom/bank-account-roll-number">Change<span
                        class="govuk-visually-hidden"> Building society roll number</span></a>
            </dd>
        </div>
@endif
 @if(!empty($data['sections']['bank-account']['bank-address']['accountreason']))


            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">If this is not your bank account, tell us whose account it is and why you have chosen this account</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['bank-account']['bank-address']['accountreason'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/payment-details/bank-location/uk?return=/applicant/payment-details/check-answers&amp;stack=#/payment-details/bank-overseas/bank-account-confirmation">Change<span
                        class="govuk-visually-hidden"> If this is not your bank account, tell us whose account it is and why you have chosen this account</span></a>
            </dd>
        </div>
@endif

@php } @endphp



@php
if ( (!empty($data['sections']['bank-account']['overseas-bank-address'])) &&  (!empty($data['sections']['bank-account']['providebank'])) && ($data['sections']['bank-account']['providebank'] == 'Yes') ) {
@endphp


 @if(!empty($data['sections']['bank-account']['banklocation']))

            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Where is your bank account?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['bank-account']['banklocation'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/payment-details/bank-location/overseas/?return=/applicant/payment-details/check-answers&amp;stack=#/payment-details/bank-location/bank-location">Change<span
                        class="govuk-visually-hidden"> Do you wish to provide your bank account details?</span></a>
            </dd>
        </div>
 @endif
 @if(!empty($data['sections']['bank-account']['overseas-bank-address']['bankname']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Name of bank or other account provider</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['bank-account']['overseas-bank-address']['bankname'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/payment-details/bank-location/overseas/?return=/applicant/payment-details/check-answers&amp;stack=#/payment-details/bank-united-kingdom/bank-name">Change<span
                        class="govuk-visually-hidden"> Name of bank or other account provider</span></a>
            </dd>
        </div>
 @endif
 @if(!empty($data['sections']['bank-account']['overseas-bank-address']['accountname']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Name on the account</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['bank-account']['overseas-bank-address']['accountname'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/payment-details/bank-location/overseas/?return=/applicant/payment-details/check-answers&amp;stack=#/payment-details/bank-united-kingdom/bank-account-name">Change<span
                        class="govuk-visually-hidden"> Name on the account</span></a>
            </dd>
        </div>
 @endif

 @if(!empty($data['sections']['bank-account']['overseas-bank-address']['iban']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">International Bank Account Number (IBAN)</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['bank-account']['overseas-bank-address']['iban'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/payment-details/bank-location/overseas/?return=/applicant/payment-details/check-answers&amp;stack=#/payment-details/bank-overseas/bank-account-iban">Change<span
                        class="govuk-visually-hidden"> International Bank Account Number (IBAN)</span></a>
            </dd>
        </div>
 @endif
 @if(!empty($data['sections']['bank-account']['overseas-bank-address']['bsbcode']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">BSB Code</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['bank-account']['overseas-bank-address']['bsbcode'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/payment-details/bank-location/overseas/?return=/applicant/payment-details/check-answers&amp;stack=#/payment-details/bank-overseas/bank-account-bic">Change<span
                        class="govuk-visually-hidden"> BSB Code</span></a>
            </dd>
        </div>


 @endif
 @if(!empty($data['sections']['bank-account']['overseas-bank-address']['swiftcode']))

            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Bank Identifier Code (BIC)</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['bank-account']['overseas-bank-address']['swiftcode'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/payment-details/bank-location/overseas/?return=/applicant/payment-details/check-answers&amp;stack=#/payment-details/bank-overseas/bank-account-bic">Change<span
                        class="govuk-visually-hidden"> Bank Identifier Code (BIC)</span></a>
            </dd>
        </div>
 @endif
 @if(!empty($data['sections']['bank-account']['overseas-bank-address']['transitroute']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Transit Routing Number</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['bank-account']['overseas-bank-address']['transitroute'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/payment-details/bank-location/overseas/?return=/applicant/payment-details/check-answers&amp;stack=#/payment-details/bank-overseas/bank-account-bic">Change<span
                        class="govuk-visually-hidden">Transit Routing Number</span></a>
            </dd>
        </div>
 @endif
 @if(!empty($data['sections']['bank-account']['overseas-bank-address']['typeofaccount']))

            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Type of account</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['bank-account']['overseas-bank-address']['typeofaccount'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/payment-details/bank-location/overseas/?return=/applicant/payment-details/check-answers&amp;stack=#/payment-details/bank-overseas/bank-account-bic">Change<span
                        class="govuk-visually-hidden">Type of account</span></a>
            </dd>
        </div>

 @endif
 @if(!empty($data['sections']['bank-account']['overseas-bank-address']['accountreason']))

            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">If this is not your bank account, tell us whose account it is and why you have chosen this account</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['bank-account']['overseas-bank-address']['accountreason'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/payment-details/bank-location/overseas?return=/applicant/payment-details/check-answers&amp;stack=#/payment-details/bank-overseas/bank-account-confirmation">Change<span
                        class="govuk-visually-hidden"> If this is not your bank account, tell us whose account it is and why you have chosen this account</span></a>
            </dd>
        </div>
 @endif


@php } @endphp










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
