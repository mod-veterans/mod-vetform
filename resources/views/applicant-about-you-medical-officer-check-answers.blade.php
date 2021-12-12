@include('framework.functions')
@php


    $userID = $_SESSION['vets-user'];
    $data = getData($userID);


if (!empty($_POST)) {
    $userID = $_SESSION['vets-user'];
    $data = getData($userID);

    $data['sections']['about-you']['medical-officer']['completed'] = TRUE;

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
                                <h2 class="govuk-heading-m">Medical Officer</h2>
        <dl class="govuk-summary-list govuk-!-margin-bottom-9">
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Medical Officer or GP&#039;s full name (if known)</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['about-you']['medical-officer']['contactname'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/medical-officer/?return=/applicant/about-you/medical-officer/check-answers&amp;stack=#afcs/about-you/medical-officer/medical-officer-contact/contact-name">Change<span
                        class="govuk-visually-hidden"> Medical Officer or GP&#039;s full name (if known)</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Building and street</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['about-you']['medical-officer']['address1'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/medical-officer/?return=/applicant/about-you/medical-officer/check-answers&amp;stack=#afcs/about-you/medical-officer/medical-officer-contact/address-line-1">Change<span
                        class="govuk-visually-hidden"> Building and street</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Building and street line 2 of 2</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['about-you']['medical-officer']['address2'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/medical-officer/?return=/applicant/about-you/medical-officer/check-answers&amp;stack=#afcs/about-you/medical-officer/medical-officer-contact/address-line-2">Change<span
                        class="govuk-visually-hidden"> Building and street line 2 of 2</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Town or city</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['about-you']['medical-officer']['town'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/medical-officer/?return=/applicant/about-you/medical-officer/check-answers&amp;stack=#afcs/about-you/medical-officer/medical-officer-contact/town">Change<span
                        class="govuk-visually-hidden"> Town or city</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">County</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['about-you']['medical-officer']['county'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/medical-officer/?return=/applicant/about-you/medical-officer/check-answers&amp;stack=#afcs/about-you/medical-officer/medical-officer-contact/county">Change<span
                        class="govuk-visually-hidden"> County</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Country</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['about-you']['medical-officer']['country'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/medical-officer/?return=/applicant/about-you/medical-officer/check-answers&amp;stack=#afcs/about-you/medical-officer/medical-officer-contact/country">Change<span
                        class="govuk-visually-hidden"> Country</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Postcode</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['about-you']['medical-officer']['postcode'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/medical-officer/?return=/applicant/about-you/medical-officer/check-answers&amp;stack=#afcs/about-you/medical-officer/medical-officer-contact/postcode">Change<span
                        class="govuk-visually-hidden"> Postcode</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Telephone number</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['about-you']['medical-officer']['telephonenumber'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/medical-officer/?return=/applicant/about-you/medical-officer/check-answers&amp;stack=#afcs/about-you/medical-officer/medical-officer-contact/contact-number">Change<span
                        class="govuk-visually-hidden"> Telephone number</span></a>
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
