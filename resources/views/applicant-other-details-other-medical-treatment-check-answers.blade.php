@include('framework.functions')
@php


$userID = $_SESSION['vets-user'];
$data = getData($userID);

//this gets teh current record ID to edit and sets it for reference
if (empty($_GET['medicalrecord'])) {

    if (empty($data['settings']['medical-treatment-record-num'])) {
        header("Location: /applicant/other-details/other-medical-treatment");
        die();
    } else {
        $thisRecord = $data['settings']['medical-treatment-record-num'];
    }

} else {
    $thisRecord = cleanRecordID($_GET['medicalrecord']);
    $data['settings']['medical-treatment-record-num'] = $thisRecord;
}





if (!empty($_POST)) {


    $data['sections']['other-medical']['completed'] = TRUE;

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
                                <h2 class="govuk-heading-m">Other medical treatment</h2>
        <dl class="govuk-summary-list govuk-!-margin-bottom-9">
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Hospital/Medical facility</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['medical-treatment']['records'][$thisRecord]['hospital-address']['name'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/other-details/other-medical-treatment/hospital-address/?return=/applicant/other-details/other-medical-treatment/check-answers#/other-medical-treatment-address/hospital-name">Change<span
                        class="govuk-visually-hidden"> Hospital name if known</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Building and street</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['medical-treatment']['records'][$thisRecord]['hospital-address']['address1'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/other-details/other-medical-treatment/hospital-address/?return=/applicant/other-details/other-medical-treatment/check-answers#/other-medical-treatment-address/address-line-1">Change<span
                        class="govuk-visually-hidden"> Building and street</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Building and street line 2 of 2</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['medical-treatment']['records'][$thisRecord]['hospital-address']['address2'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/other-details/other-medical-treatment/hospital-address/applicant/other-details/other-medical-treatment/hospital-address/?return=/applicant/other-details/other-medical-treatment/check-answers#/other-medical-treatment-address/address-line-2">Change<span
                        class="govuk-visually-hidden"> Building and street line 2 of 2</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Town or city</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['medical-treatment']['records'][$thisRecord]['hospital-address']['town'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/other-details/other-medical-treatment/hospital-address/?return=/applicant/other-details/other-medical-treatment/check-answers#/other-medical-treatment-address/town">Change<span
                        class="govuk-visually-hidden"> Town or city</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">County</dt>
            <dd class="govuk-summary-list__value">
                                {{$data['sections']['medical-treatment']['records'][$thisRecord]['hospital-address']['county'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/other-details/other-medical-treatment/hospital-address/?return=/applicant/other-details/other-medical-treatment/check-answers#/other-medical-treatment-address/county">Change<span
                        class="govuk-visually-hidden"> County</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Country</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['medical-treatment']['records'][$thisRecord]['hospital-address']['country'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/other-details/other-medical-treatment/hospital-address/?return=/applicant/other-details/other-medical-treatment/check-answers#/other-medical-treatment-address/country">Change<span
                        class="govuk-visually-hidden"> Country</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Postcode</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['medical-treatment']['records'][$thisRecord]['hospital-address']['postcode'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/other-details/other-medical-treatment/hospital-address/?return=/applicant/other-details/other-medical-treatment/check-answers#/other-medical-treatment-address/postcode">Change<span
                        class="govuk-visually-hidden"> Postcode</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Telephone number</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['medical-treatment']['records'][$thisRecord]['hospital-address']['telephone'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/other-details/other-medical-treatment/hospital-address/?return=/applicant/other-details/other-medical-treatment/check-answers#/other-medical-treatment-address/hospital-contact-number">Change<span
                        class="govuk-visually-hidden"> Telephone number</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Email</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['medical-treatment']['records'][$thisRecord]['hospital-address']['email'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/other-details/other-medical-treatment/hospital-address/?return=/applicant/other-details/other-medical-treatment/check-answers#/other-medical-treatment-address/hospital-email">Change<span
                        class="govuk-visually-hidden"> Email</span></a>
            </dd>
        </div>

            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Condition treated</dt>
            <dd class="govuk-summary-list__value">
                                   {{$data['sections']['medical-treatment']['records'][$thisRecord]['conditions'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/other-details/other-medical-treatment/condition/?return=/applicant/other-details/other-medical-treatment/check-answers#/other-medical-treatment-condition/other-medical-treatment-condition">Change<span
                        class="govuk-visually-hidden"> Condition treated</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Date your treatment started. If you are not sure, just enter a year.</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['medical-treatment']['records'][$thisRecord]['treatment-start']['day'] ?? ''}}
                                     {{$data['sections']['medical-treatment']['records'][$thisRecord]['treatment-start']['month'] ?? ''}}
                                    {{$data['sections']['medical-treatment']['records'][$thisRecord]['treatment-start']['year'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/other-details/other-medical-treatment/treatment-start/?return=/applicant/other-details/other-medical-treatment/check-answers#/other-medical-treatment-start-date/medical-treatment-start-date">Change<span
                        class="govuk-visually-hidden"> Date your treatment started. If you are not sure, just enter a year.</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">This date is approximate</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['medical-treatment']['records'][$thisRecord]['treatment-start']['approximate'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/other-details/other-medical-treatment/treatment-start/?return=/applicant/other-details/other-medical-treatment/check-answers#/other-medical-treatment-start-date/medical-treatment-start-date-estimated">Change<span
                        class="govuk-visually-hidden"> This date is approximate</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">I am still on a waiting list to attend</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['medical-treatment']['records'][$thisRecord]['treatment-start']['waiting-list'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/other-details/other-medical-treatment/treatment-end/?return=/applicant/other-details/other-medical-treatment/check-answers#/other-medical-treatment-end-date/medical-treatment-not-ended">Change<span
                        class="govuk-visually-hidden"> I am still on a waiting list to attend</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Date your treatment ended. If you are not sure, just enter a year.</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['medical-treatment']['records'][$thisRecord]['treatment-end']['day'] ?? ''}}
                                     {{$data['sections']['medical-treatment']['records'][$thisRecord]['treatment-end']['month'] ?? ''}}
                                    {{$data['sections']['medical-treatment']['records'][$thisRecord]['treatment-end']['year'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/other-details/other-medical-treatment/treatment-end/?return=/applicant/other-details/other-medical-treatment/check-answers#/other-medical-treatment-start-date/medical-treatment-start-date">Change<span
                        class="govuk-visually-hidden"> Date your treatment ended. If you are not sure, just enter a year.</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">This date is approximate</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['medical-treatment']['records'][$thisRecord]['treatment-end']['approximate'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/other-details/other-medical-treatment/treatment-end/?return=/applicant/other-details/other-medical-treatment/check-answers#/other-medical-treatment-start-date/medical-treatment-start-date-estimated">Change<span
                        class="govuk-visually-hidden"> This date is approximate</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">This treatment has not yet ended</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['medical-treatment']['records'][$thisRecord]['treatment-end']['waiting-list'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/other-details/other-medical-treatment/treatment-end/?return=/applicant/other-details/other-medical-treatment/check-answers#/other-medical-treatment-end-date/medical-treatment-not-ended">Change<span
                        class="govuk-visually-hidden"> This treatment has not yet ended</span></a>
            </dd>
        </div>



            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">What type of medical treatment did you receive?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['medical-treatment']['records'][$thisRecord]['type'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/other-details/other-medical-treatment/condition/type/?return=/applicant/other-details/other-medical-treatment/check-answers#/other-medical-treatment-type/other-medical-treatment-type">Change<span
                        class="govuk-visually-hidden"> What type of medical treatment did you receive?</span></a>
            </dd>
        </div>
    </dl>
                    <a class="govuk-button govuk-!-margin-top-5" data-module="govuk-button"
               href="/applicant/other-details/other-medical-treatment">
                Add another hospital/medical facility
            </a>
            <br>
            Or
            <br/><br />
    <form method="post" enctype="multipart/form-data" novalidate>
    @csrf
        <div class="govuk-form-group">
            <button class="govuk-button govuk-!-margin-right-2" data-module="govuk-button">Save and continue</button>
        </div>
    </form>
            </div>
        </div>
    </main>
</div>


@include('framework.footer')
