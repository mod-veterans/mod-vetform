@php


if (!empty($_POST)) {


    if ($_POST['afcs/about-you/personal-details/previous-claim/previous-claim'] == 'Yes') {
    header("Location: /applicant/about-you/previous-claim/claim-number");
    die();

    } else {
    header("Location: /applicant/about-you/save-return");
    die();

    }

}

@endphp




@include('framework.header')


    <a href="#" onclick="window.history.back()" class="govuk-back-link">Back</a>

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Check your answers</h1>
                                <h2 class="govuk-heading-m">Personal details</h2>
        <dl class="govuk-summary-list govuk-!-margin-bottom-9">
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Surname or family name</dt>
            <dd class="govuk-summary-list__value">
                                    opkok
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/contact-address/?return=summarise&amp;stack=#afcs/about-you/personal-details/your-name/last-name">Change<span
                        class="govuk-visually-hidden"> Surname or family name</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">All other names in full</dt>
            <dd class="govuk-summary-list__value">
                                    pokpk
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/contact-address/?return=summarise&amp;stack=#afcs/about-you/personal-details/your-name/other-names">Change<span
                        class="govuk-visually-hidden"> All other names in full</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Building and street</dt>
            <dd class="govuk-summary-list__value">
                                    pkok
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/contact-address/?return=summarise&amp;stack=#afcs/about-you/personal-details/contact-address/address-line-1">Change<span
                        class="govuk-visually-hidden"> Building and street</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Building and street line 2 of 2</dt>
            <dd class="govuk-summary-list__value">
                                    pokp
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/contact-address/?return=summarise&amp;stack=#afcs/about-you/personal-details/contact-address/address-line-2">Change<span
                        class="govuk-visually-hidden"> Building and street line 2 of 2</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Town or city</dt>
            <dd class="govuk-summary-list__value">
                                    okk
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/contact-address/?return=summarise&amp;stack=#afcs/about-you/personal-details/contact-address/town">Change<span
                        class="govuk-visually-hidden"> Town or city</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">County</dt>
            <dd class="govuk-summary-list__value">
                                    pkpk
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/contact-address/?return=summarise&amp;stack=#afcs/about-you/personal-details/contact-address/county">Change<span
                        class="govuk-visually-hidden"> County</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Country</dt>
            <dd class="govuk-summary-list__value">
                                    United Kingdom
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/contact-address/?return=summarise&amp;stack=#afcs/about-you/personal-details/contact-address/country">Change<span
                        class="govuk-visually-hidden"> Country</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Postcode</dt>
            <dd class="govuk-summary-list__value">
                                    opkkko
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/contact-address/?return=summarise&amp;stack=#afcs/about-you/personal-details/contact-address/postcode">Change<span
                        class="govuk-visually-hidden"> Postcode</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Date of birth</dt>
            <dd class="govuk-summary-list__value">
                                    12 December 1212
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/dob/?return=summarise&amp;stack=#afcs/about-you/personal-details/date-of-birth/date-of-birth">Change<span
                        class="govuk-visually-hidden"> Date of birth</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Mobile telephone number</dt>
            <dd class="govuk-summary-list__value">
                                    0909090909
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/telephone-number/?return=summarise&amp;stack=#afcs/about-you/personal-details/contact-number/mobile-number">Change<span
                        class="govuk-visually-hidden"> Mobile telephone number</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">What is your email address</dt>
            <dd class="govuk-summary-list__value">
                                    plplplplpl@egopegjeogjpoj.com
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/email-address/?return=summarise&amp;stack=#afcs/about-you/personal-details/email-address/email-address">Change<span
                        class="govuk-visually-hidden"> What is your email address</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">NI Number</dt>
            <dd class="govuk-summary-list__value">
                                    QQ 12 34 56 C
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/ni-number/?return=summarise&amp;stack=#afcs/about-you/personal-details/national-insurance/ni-number">Change<span
                        class="govuk-visually-hidden"> NI Number</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Pension scheme</dt>
            <dd class="govuk-summary-list__value">
                                                            Don&#039;t Know<br>
                                                </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/pension-scheme/?return=summarise&amp;stack=#afcs/about-you/personal-details/pension-scheme/pension-scheme">Change<span
                        class="govuk-visually-hidden"> Pension scheme</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Previously made a claim</dt>
            <dd class="govuk-summary-list__value">
                                    Yes
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/previous-claim/?return=summarise&amp;stack=#afcs/about-you/personal-details/previous-claim/previous-claim">Change<span
                        class="govuk-visually-hidden"> Previously made a claim</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Previous claim reference number</dt>
            <dd class="govuk-summary-list__value">
                                    plpl
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/previous-claim/claim-number/?return=summarise&amp;stack=#afcs/about-you/personal-details/previous-claim-reference/previous-claim-reference">Change<span
                        class="govuk-visually-hidden"> Previous claim reference number</span></a>
            </dd>
        </div>
    </dl>
                    <a href="/tasklist" class="govuk-button" data-module="govuk-button">Continue</a>
            </div>
        </div>
    </main>
</div>




@include('framework.footer')
