@include('framework.functions')
@php



    $userID = $_SESSION['vets-user'];
    $data = getData($userID);

if (!empty($_POST)) {


    $data['sections']['other-compensation']['completed'] = TRUE;

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
                                <h2 class="govuk-heading-m">Other compensation</h2>
        <dl class="govuk-summary-list govuk-!-margin-bottom-9">
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Are you claiming for or have you received compensation payments from other sources?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['other-compensation']['received-compensation'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/other-details/other-compensation?return=/applicant/other-details/other-compensation/check-answers&amp;stack=#/other-compensation/received-compensation/received-compensation">Change<span
                        class="govuk-visually-hidden"> Are you claiming for or have you received compensation payments from other sources?</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">What medical condition(s) have you received (or are you claiming) other compensation for?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['other-compensation']['conditions'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/other-details/other-compensation/conditions/?return=/applicant/other-details/other-compensation/check-answers&amp;stack=#/other-compensation/compensation-condition/medical-condition">Change<span
                        class="govuk-visually-hidden"> What medical condition(s) have you received (or are you claiming) other compensation for?</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Who did you claim from/amount?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['other-compensation']['outcome'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/other-details/other-compensation/outcome/?return=/applicant/other-details/other-compensation/check-answers&amp;stack=#/other-compensation/claim-outcome/claim-outcome-benefactor">Change<span
                        class="govuk-visually-hidden"> Who did you claim from/amount?</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Did you receive a payment as a result of this claim?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['other-compensation']['payment'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/other-details/other-compensation/payment/?return=/applicant/other-details/other-compensation/check-answers&amp;stack=#/other-compensation/claim-outcome/claim-outcome-payment-result">Change<span
                        class="govuk-visually-hidden"> Did you receive a payment as a result of this claim?</span></a>
            </dd>
        </div>

@php
if ( (!empty($data['sections']['other-compensation']['payment'])) && ($data['sections']['other-compensation']['payment'] == 'Yes') ) {
@endphp


            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Amount paid</dt>
            <dd class="govuk-summary-list__value">
                                   {{$data['sections']['other-compensation']['amount'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/other-details/other-compensation/amount-received/?return=/applicant/other-details/other-compensation/check-answers&amp;stack=#/other-compensation/other-payment-received/amount-paid">Change<span
                        class="govuk-visually-hidden"> Amount paid</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">What type of payment was this?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['other-compensation']['type'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/other-details/other-compensation/type/?return=/applicant/other-details/other-compensation/check-answers&amp;stack=#/other-compensation/claim-payment-type/claim-outcome-payment-type">Change<span
                        class="govuk-visually-hidden"> What type of payment was this?</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">When did you receive this payment?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['other-compensation']['payment-date']['day'] ?? '' }} {{$data['sections']['other-compensation']['payment-date']['month'] ?? '' }} {{$data['sections']['other-compensation']['payment-date']['year'] ?? '' }}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/other-details/other-compensation/when/?return=/applicant/other-details/other-compensation/check-answers&amp;stack=#/other-compensation/claim-payment-date/claim-payment-date">Change<span
                        class="govuk-visually-hidden"> When did you receive this payment?</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">This date is appoximate?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['other-compensation']['payment-date']['approximate'] ?? '' }}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/other-details/other-compensation/when/?return=/applicant/other-details/other-compensation/check-answers&amp;stack=#/other-compensation/claim-payment-date/claim-payment-approximate">Change<span
                        class="govuk-visually-hidden"> This date is approximate?</span></a>
            </dd>
        </div>




            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Did a solicitor help you with your claim for other compensation?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['other-compensation']['solicitorhelp'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/other-details/other-compensation/solicitor/?return=/applicant/other-details/other-compensation/check-answers&amp;stack=#/other-compensation/claim-solicitor-help/claim-solicitor-help">Change<span
                        class="govuk-visually-hidden"> Did a solicitor help you with your claim for other compensation?</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Solicitors&#039; full name</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['other-compensation']['solicitor-address']['fullname'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/other-details/other-compensation/solicitor/details/?return=/applicant/other-details/other-compensation/check-answers&amp;stack=#/other-compensation/claim-solicitor-details/claim-solicitor-contact-name">Change<span
                        class="govuk-visually-hidden"> Solicitors&#039; full name</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Building and street</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['other-compensation']['solicitor-address']['address1'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/other-details/other-compensation/solicitor/details/?return=/applicant/other-details/other-compensation/check-answers&amp;stack=#/other-compensation/claim-solicitor-details/claim-solicitor__address-line-1">Change<span
                        class="govuk-visually-hidden"> Building and street</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Building and street line 2 of 2</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['other-compensation']['solicitor-address']['address2'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/other-details/other-compensation/solicitor/details/?return=/applicant/other-details/other-compensation/check-answers&amp;stack=#/other-compensation/claim-solicitor-details/claim-solicitor__address-line-2">Change<span
                        class="govuk-visually-hidden"> Building and street line 2 of 2</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Town</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['other-compensation']['solicitor-address']['town'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/other-details/other-compensation/solicitor/details/?return=/applicant/other-details/other-compensation/check-answers&amp;stack=#/other-compensation/claim-solicitor-details/claim-solicitor__town">Change<span
                        class="govuk-visually-hidden"> Town</span></a>
            </dd>
        </div>

             <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">County</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['other-compensation']['solicitor-address']['county'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/other-details/other-compensation/solicitor/details/?return=/applicant/other-details/other-compensation/check-answers&amp;stack=#/other-compensation/claim-solicitor-details/claim-solicitor__county">Change<span
                        class="govuk-visually-hidden"> County</span></a>
            </dd>
        </div>

             <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Postcode</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['other-compensation']['solicitor-address']['postcode'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/other-details/other-compensation/solicitor/details/?return=/applicant/other-details/other-compensation/check-answers&amp;stack=#/other-compensation/claim-solicitor-details/claim-solicitor__postcode">Change<span
                        class="govuk-visually-hidden"> Postcode</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Country</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['other-compensation']['solicitor-address']['country'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/other-details/other-compensation/solicitor/details/?return=/applicant/other-details/other-compensation/check-answers&amp;stack=#/other-compensation/claim-solicitor-details/claim-solicitor__country">Change<span
                        class="govuk-visually-hidden"> Country</span></a>
            </dd>
        </div>

            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Contact number</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['other-compensation']['solicitor-address']['telephone'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/other-details/other-compensation/solicitor/details/?return=/applicant/other-details/other-compensation/check-answers&amp;stack=#/other-compensation/claim-solicitor-details/claim-solicitor__contact-number">Change<span
                        class="govuk-visually-hidden"> Contact number</span></a>
            </dd>
        </div>




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
