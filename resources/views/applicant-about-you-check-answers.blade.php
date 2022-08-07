@include('framework.functions')
@php


    $userID = $_SESSION['vets-user'];
    $data = getData($userID);


if (!empty($_POST)) {
    $userID = $_SESSION['vets-user'];
    $data = getData($userID);

    $data['sections']['about-you']['completed'] = TRUE;

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
                                <h2 class="govuk-heading-m">Personal details</h2>
        <dl class="govuk-summary-list govuk-!-margin-bottom-9">
            @if(!empty($data['sections']['about-you']['name']['lastname']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Surname or family name</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['about-you']['name']['lastname']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/name/?return=/applicant/about-you/check-answers&amp;stack=#afcs/about-you/personal-details/your-name/last-name">Change<span
                        class="govuk-visually-hidden"> Surname or family name</span></a>
            </dd>
        </div>
            @endif
             @if(!empty($data['sections']['about-you']['name']['firstname']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">All other names in full</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['about-you']['name']['firstname']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/name/?return=/applicant/about-you/check-answers&amp;stack=#afcs/about-you/personal-details/your-name/other-names">Change<span
                        class="govuk-visually-hidden"> All other names in full</span></a>
            </dd>
        </div>
        @endif

              @if(!empty($data['sections']['about-you']['name']['title']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Title</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['about-you']['name']['title']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/name/?return=/applicant/about-you/check-answers&amp;stack=#afcs/about-you/personal-details/your-name/title">Change<span
                        class="govuk-visually-hidden">Title</span></a>
            </dd>
        </div>
        @endif

        @if(!empty($data['sections']['about-you']['contact-address']['address1']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Address Building and street</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['about-you']['contact-address']['address1']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/contact-address/?return=/applicant/about-you/check-answers&amp;stack=#afcs/about-you/personal-details/contact-address/address-line-1">Change<span
                        class="govuk-visually-hidden"> Building and street</span></a>
            </dd>
        </div>
        @endif
        @if(!empty($data['sections']['about-you']['contact-address']['address2']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Building and street line 2 of 2</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['about-you']['contact-address']['address2']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/contact-address/?return=/applicant/about-you/check-answers&amp;stack=#afcs/about-you/personal-details/contact-address/address-line-2">Change<span
                        class="govuk-visually-hidden"> Building and street line 2 of 2</span></a>
            </dd>
        </div>
        @endif
        @if(!empty($data['sections']['about-you']['contact-address']['town']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Town or city</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['about-you']['contact-address']['town']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/contact-address/?return=/applicant/about-you/check-answers&amp;stack=#afcs/about-you/personal-details/contact-address/town">Change<span
                        class="govuk-visually-hidden"> Town or city</span></a>
            </dd>
        </div>
        @endif
        @if(!empty($data['sections']['about-you']['contact-address']['county']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">County</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['about-you']['contact-address']['county']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/contact-address/?return=/applicant/about-you/check-answers&amp;stack=#afcs/about-you/personal-details/contact-address/county">Change<span
                        class="govuk-visually-hidden"> County</span></a>
            </dd>
        </div>
        @endif
        @if(!empty($data['sections']['about-you']['contact-address']['country']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Country</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['about-you']['contact-address']['country']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/contact-address/?return=/applicant/about-you/check-answers&amp;stack=#afcs/about-you/personal-details/contact-address/country">Change<span
                        class="govuk-visually-hidden"> Country</span></a>
            </dd>
        </div>
        @endif
        @if(!empty($data['sections']['about-you']['contact-address']['postcode']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Postcode</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['about-you']['contact-address']['postcode']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/contact-address/?return=/applicant/about-you/check-answers&amp;stack=#afcs/about-you/personal-details/contact-address/postcode">Change<span
                        class="govuk-visually-hidden"> Postcode</span></a>
            </dd>
        </div>
        @endif
        @if(!empty($data['sections']['about-you']['dob']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Date of birth</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['about-you']['dob']['day']}} / {{$data['sections']['about-you']['dob']['month']}} / {{$data['sections']['about-you']['dob']['year']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/dob/?return=/applicant/about-you/check-answers&amp;stack=#afcs/about-you/personal-details/date-of-birth/date-of-birth">Change<span
                        class="govuk-visually-hidden"> Date of birth</span></a>
            </dd>
        </div>
        @endif

            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Mobile telephone number?</dt>
            <dd class="govuk-summary-list__value">
            @php
            if ($data['sections']['about-you']['telephonenumber']['doyouhavemobile'] == 'No') { echo 'No';}
            elseif ($data['sections']['about-you']['telephonenumber']['doyouhavemobile'] == 'Yes') { echo $data['sections']['about-you']['telephonenumber']['mobile']; }
            @endphp

                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/telephone-number/?return=/applicant/about-you/check-answers&amp;stack=#afcs/about-you/personal-details/contact-number/mobile-number">Change<span
                        class="govuk-visually-hidden"> Mobile telephone number</span></a>
            </dd>
        </div>


         @if(!empty($data['sections']['about-you']['telephonenumber']['mobilepermission']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Can we contact you via text message about your claim?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['about-you']['telephonenumber']['mobilepermission']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/mobile-permission/?return=/applicant/about-you/check-answers&amp;stack=#afcs/about-you/personal-details/email-address/email-address">Change<span
                        class="govuk-visually-hidden"> Can we contact you via text message about your claim</span></a>
            </dd>
        </div>
        @endif


            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Alternative telephone number:</dt>
            <dd class="govuk-summary-list__value">
            @php
            if (empty($data['sections']['about-you']['telephonenumber']['doyouhavealternative'])) { echo ''; }
            elseif ($data['sections']['about-you']['telephonenumber']['doyouhavealternative'] == 'No') { echo 'No';}
            elseif ($data['sections']['about-you']['telephonenumber']['doyouhavealternative'] == 'Yes') { echo $data['sections']['about-you']['telephonenumber']['telephone']; }
            @endphp
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/alternative-number/?return=/applicant/about-you/check-answers&amp;stack=#afcs/about-you/personal-details/contact-number/mobile-number">Change<span
                        class="govuk-visually-hidden"> alternative number</span></a>
            </dd>
        </div>
        @if(!empty($data['sections']['about-you']['email']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">What is your email address</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['about-you']['email']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/email-address/?return=/applicant/about-you/check-answers&amp;stack=#afcs/about-you/personal-details/email-address/email-address">Change<span
                        class="govuk-visually-hidden"> What is your email address</span></a>
            </dd>
        </div>
        @endif


        @if(!empty($data['sections']['about-you']['email-address']['emailpermission']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Can we contact you via email about your claim?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['about-you']['email-address']['emailpermission']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/email-permission/?return=/applicant/about-you/check-answers&amp;stack=#afcs/about-you/personal-details/email-address/email-address">Change<span
                        class="govuk-visually-hidden"> Can we contact you via email about your claim</span></a>
            </dd>
        </div>
        @endif


        @if(!empty($data['sections']['about-you']['ninumber']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">NI Number</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['about-you']['ninumber']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/ni-number/?return=/applicant/about-you/check-answers&amp;stack=#afcs/about-you/personal-details/national-insurance/ni-number">Change<span
                        class="govuk-visually-hidden"> NI Number</span></a>
            </dd>
        </div>
        @endif
        @if(!empty($data['sections']['about-you']['pensionscheme']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Pension scheme</dt>
            <dd class="govuk-summary-list__value">
                                            {{$data['sections']['about-you']['pensionscheme']}}<br>
                                                </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/pension-scheme/?return=/applicant/about-you/check-answers&amp;stack=#afcs/about-you/personal-details/pension-scheme/pension-scheme">Change<span
                        class="govuk-visually-hidden"> Pension scheme</span></a>
            </dd>
        </div>
        @endif
        @if(!empty($data['sections']['about-you']['previous-claim']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Previous claim made</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['about-you']['previous-claim']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/previous-claim/?return=/applicant/about-you/check-answers&amp;stack=#afcs/about-you/personal-details/previous-claim/previous-claim">Change<span
                        class="govuk-visually-hidden"> Previously made a claim</span></a>
            </dd>
        </div>
        @endif
        @if(!empty($data['sections']['about-you']['refnum']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Previous claim reference number</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['about-you']['refnum']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/previous-claim/claim-number/?return=/applicant/about-you/check-answers&amp;stack=#afcs/about-you/personal-details/previous-claim-reference/previous-claim-reference">Change<span
                        class="govuk-visually-hidden"> Previous claim reference number</span></a>
            </dd>
        </div>
        @endif
        @if(!empty($data['sections']['about-you']['epaw']['served']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Express Prior Authority in Writing (EPAW) reference</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['about-you']['epaw']['served']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/epaw-reference/?return=/applicant/about-you/check-answers&amp;stack=#afcs/about-you/personal-details/epaw-number">Change<span
                        class="govuk-visually-hidden"> PExpress Prior Authority in Writing (EPAW) reference</span></a>
            </dd>
        </div>
        @endif
         @if(!empty($data['sections']['about-you']['epaw']['epaw-reference-1']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">EPAW reference number</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['about-you']['epaw']['epaw-reference-1'] ?? ''}} - {{$data['sections']['about-you']['epaw']['epaw-reference-2'] ?? ''}} / {{$data['sections']['about-you']['epaw']['epaw-reference-3'] ?? ''}} / {{$data['sections']['about-you']['epaw']['epaw-reference-4'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/epaw-reference/?return=/applicant/about-you/check-answers&amp;stack=#afcs/about-you/personal-details/epaw-reference">Change<span
                        class="govuk-visually-hidden">EPAW reference number</span></a>
            </dd>
        </div>
        @endif




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
