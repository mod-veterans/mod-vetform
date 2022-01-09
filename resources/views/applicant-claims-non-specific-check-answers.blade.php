@include('framework.functions')
@php



    $userID = $_SESSION['vets-user'];
    $data = getData($userID);


//this gets teh current record ID to edit and sets it for reference
if (empty($_GET['claimrecord'])) {

    if (empty($data['settings']['claim-record-num'])) {
        header("Location: /applicant/claims");
        die();
    } else {
        $thisRecord = $data['settings']['claim-record-num'];
    }

} else {
    $thisRecord = cleanRecordID($_GET['claimrecord']);
    $data['settings']['claim-record-num'] = $thisRecord;
}



if (!empty($_POST)) {
    $userID = $_SESSION['vets-user'];
    $data = getData($userID);

    $data['sections']['claims']['completed'] = TRUE;

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
                                <h2 class="govuk-heading-m">Claim details</h2>
        <dl class="govuk-summary-list govuk-!-margin-bottom-9">
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Type of medical condition</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['type'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/type?return=/applicant/claims/non-specific/check-answers&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-illness/claim-illness">Change<span
                        class="govuk-visually-hidden"> Type of medical condition</span></a>
            </dd>
        </div>

            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">What medical condition(s) are you claiming for?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['non-specific']['condition'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/non-specific?return=/applicant/claims/non-specific/check-answers&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-non-sporting-medical-condition/claim-accident-non-sporting-medical-condition">Change<span
                        class="govuk-visually-hidden"> What medical condition(s) are you claiming for?</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">What medical condition(s) are you claiming for?</dt>
            <dd class="govuk-summary-list__value">
                                    plpplpl
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="https://modvets-dev2.london.cloudapps.digital/your-claim/claim-details/claim-accident-sporting-medical-condition/?return=/applicant/claims/non-specific/check-answers&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-medical-condition/claim-accident-sporting-medical-condition">Change<span
                        class="govuk-visually-hidden"> What medical condition(s) are you claiming for?</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Name of the Medical Practitioner (if known)</dt>
            <dd class="govuk-summary-list__value">
                                   {{$data['sections']['claims']['records'][$thisRecord]['non-specific']['hospital-address']['name'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/non-specific/medical-practitioner?return=/applicant/claims/non-specific/check-answers&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-practitioner">Change<span
                        class="govuk-visually-hidden"> Name of the Medical Practitioner (if known)</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Building and street</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['non-specific']['hospital-address']['address1'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/non-specific/medical-practitioner?return=/applicant/claims/non-specific/check-answers&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__address-line-1">Change<span
                        class="govuk-visually-hidden"> Building and street</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Building and street line 2 of 2</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['non-specific']['hospital-address']['address2'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/non-specific/medical-practitioner/?return=/applicant/claims/non-specific/check-answers&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__address-line-2">Change<span
                        class="govuk-visually-hidden"> Building and street line 2 of 2</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Town or city</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['non-specific']['hospital-address']['town'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/non-specific/medical-practitioner/?return=/applicant/claims/non-specific/check-answers&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__town">Change<span
                        class="govuk-visually-hidden"> Town or city</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">County</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['non-specific']['hospital-address']['county'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/non-specific/medical-practitioner/?return=/applicant/claims/non-specific/check-answers&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__county">Change<span
                        class="govuk-visually-hidden"> County</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Country</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['non-specific']['hospital-address']['country'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/non-specific/medical-practitioner/?return=/applicant/claims/non-specific/check-answers&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__country">Change<span
                        class="govuk-visually-hidden"> Country</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Postcode</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['non-specific']['hospital-address']['postcode'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/non-specific/medical-practitioner/?return=/applicant/claims/non-specific/check-answers&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__postcode">Change<span
                        class="govuk-visually-hidden"> Postcode</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Telephone number</dt>
            <dd class="govuk-summary-list__value">
                                {{$data['sections']['claims']['records'][$thisRecord]['non-specific']['hospital-address']['telephone'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/non-specific/medical-practitioner/?return=/applicant/claims/non-specific/check-answers&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-number">Change<span
                        class="govuk-visually-hidden"> Telephone number</span></a>
            </dd>
        </div>

            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Email</dt>
            <dd class="govuk-summary-list__value">
                                {{$data['sections']['claims']['records'][$thisRecord]['non-specific']['hospital-address']['email'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/non-specific/medical-practitioner/?return=/applicant/claims/non-specific/check-answers&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-number">Change<span
                        class="govuk-visually-hidden"> Email</span></a>
            </dd>
        </div>




            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">What was the date your condition started?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['condition-start-date']['day'] ?? ''}} / {{$data['sections']['claims']['records'][$thisRecord]['condition-start-date']['month'] ?? ''}} / {{$data['sections']['claims']['records'][$thisRecord]['condition-start-date']['year'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/non-specific/date/?return=/applicant/claims/non-specific/check-answers&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-date/date-of-injury-incident">Change<span
                        class="govuk-visually-hidden"> What was the date your condition started?</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Is this date approximate?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['condition-start-date']['approximate'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/non-specific/date/?return=/applicant/claims/non-specific/check-answers&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-activity/activity">Change<span
                        class="govuk-visually-hidden"> Is this date approximate?</span></a>
            </dd>
        </div>




            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">What is your illness/condition related to</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['related-conditions'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/non-specific/illness-related/?return=/applicant/claims/non-specific/check-answers&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-related/sporting-related">Change<span
                        class="govuk-visually-hidden"> What is your illness/condition related to</span></a>
            </dd>
        </div>


        <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Is illness/condition due to exposure to</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['related-exposure'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/non-specific/exposure-related/?return=/applicant/claims/non-specific/check-answers&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-related/sporting-related">Change<span
                        class="govuk-visually-hidden"> Is illness/condition due to exposure to</span></a>
            </dd>
        </div>


@php
    if (!empty($data['sections']['claims']['records'][$thisRecord]['exposure-date'])) {
@endphp



        <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Chemical Exposure - what substances were you exposed to?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['exposure-date']['substances'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/non-specific/chemical-exposure/?return=/applicant/claims/non-specific/check-answers">Change<span
                        class="govuk-visually-hidden"> Chemical Exposure - what substances were you exposed to?</span></a>
            </dd>
        </div>

        <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Chemical Exposure - date of first exposure?</dt>
            <dd class="govuk-summary-list__value">
                                     {{$data['sections']['claims']['records'][$thisRecord]['exposure-date']['day'] ?? ''}} / {{$data['sections']['claims']['records'][$thisRecord]['exposure-date']['month'] ?? ''}} / {{$data['sections']['claims']['records'][$thisRecord]['exposure-date']['year'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/non-specific/chemical-exposure/?return=/applicant/claims/non-specific/check-answers">Change<span
                        class="govuk-visually-hidden"> Chemical Exposure - date of first exposure?</span></a>
            </dd>
        </div>

        <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Chemical Exposure - length of exposure?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['exposure-date']['length'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/non-specific/chemical-exposure/?return=/applicant/claims/non-specific/check-answers">Change<span
                        class="govuk-visually-hidden"> Chemical Exposure - length of exposure?</span></a>
            </dd>
        </div>






@php
}
@endphp


            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">When did you first seek medical attention for the condition(s)?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['medical-attention']['day'] ?? ''}} / {{$data['sections']['claims']['records'][$thisRecord]['medical-attention']['month'] ?? ''}} / {{$data['sections']['claims']['records'][$thisRecord]['medical-attention']['year'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/non-specific/medical-attention-date/?return=/applicant/claims/non-specific/check-answers">Change<span
                        class="govuk-visually-hidden">When did you first seek medical attention for the condition(s)?</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Is this date approximate?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['medical-attention']['approximate'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/non-specific/medical-attention-date/?return=/applicant/claims/non-specific/check-answers">Change<span
                        class="govuk-visually-hidden"> Is this date approximate?</span></a>
            </dd>
        </div>

            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Were you downgraded for any of the conditions on this claim?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['downgraded'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/non-specific/downgraded/?return=/applicant/claims/non-specific/check-answers">Change<span
                        class="govuk-visually-hidden"> Were you downgraded for any of the conditions on this claim?</span></a>
            </dd>
        </div>

@php
if ($data['sections']['claims']['records'][$thisRecord]['downgraded'] == 'Yes') {
@endphp


            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Date downgraded from</dt>
            <dd class="govuk-summary-list__value">
                                   {{$data['sections']['claims']['records'][$thisRecord]['non-specific']['downgraded']['fromday'] ?? ''}} / {{$data['sections']['claims']['records'][$thisRecord]['non-specific']['downgraded']['frommonth'] ?? ''}} / {{$data['sections']['claims']['records'][$thisRecord]['non-specific']['downgraded']['fromyear'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/non-specific/downgraded/when/?return=/applicant/claims/non-specific/check-answers">Change<span
                        class="govuk-visually-hidden"> Date downgraded from</span></a>
            </dd>
        </div>

            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Date downgraded to</dt>
            <dd class="govuk-summary-list__value">
                                   {{$data['sections']['claims']['records'][$thisRecord]['non-specific']['downgraded']['today'] ?? ''}} / {{$data['sections']['claims']['records'][$thisRecord]['non-specific']['downgraded']['tomonth'] ?? ''}} / {{$data['sections']['claims']['records'][$thisRecord]['non-specific']['downgraded']['toyear'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/non-specific/downgraded/when/?return=/applicant/claims/non-specific/check-answers">Change<span
                        class="govuk-visually-hidden"> Date downgraded to</span></a>
            </dd>
        </div>

            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Downgrade dates approximate?</dt>
            <dd class="govuk-summary-list__value">
                                   {{$data['sections']['claims']['records'][$thisRecord]['non-specific']['downgraded']['datesapproximate'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/non-specific/downgraded/when/?return=/applicant/claims/non-specific/check-answers">Change<span
                        class="govuk-visually-hidden"> Downgrade dates approximate? </span></a>
            </dd>
        </div>

            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Are you still downgraded?</dt>
            <dd class="govuk-summary-list__value">
                                   {{$data['sections']['claims']['records'][$thisRecord]['non-specific']['downgraded']['stilldowngraded'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/non-specific/downgraded/when/?return=/applicant/claims/non-specific/check-answers">Change<span
                        class="govuk-visually-hidden"> are you still downgraded? </span></a>
            </dd>
        </div>

        <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">What medical category were you downgraded from?</dt>
            <dd class="govuk-summary-list__value">
                                   {{$data['sections']['claims']['records'][$thisRecord]['non-specific']['medical-categories']['frommedical'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/non-specific/downgraded/detail/?return=/applicant/claims/non-specific/check-answers">Change<span
                        class="govuk-visually-hidden"> What medical category were you downgraded from?</span></a>
            </dd>
        </div>

        <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">What medical category were you downgraded to?</dt>
            <dd class="govuk-summary-list__value">
                                   {{$data['sections']['claims']['records'][$thisRecord]['non-specific']['medical-categories']['tomedical'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/non-specific/downgraded/detail/?return=/applicant/claims/non-specific/check-answers">Change<span
                        class="govuk-visually-hidden"> What medical category were you downgraded to?</span></a>
            </dd>
        </div>

        <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Were you downgraded and upgraded more than once within different categories?</dt>
            <dd class="govuk-summary-list__value">
                                   {{$data['sections']['claims']['records'][$thisRecord]['non-specific']['medical-categories']['multiple'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/non-specific/downgraded/detail/?return=/applicant/claims/non-specific/check-answers">Change<span
                        class="govuk-visually-hidden">Were you downgraded and upgraded more than once within different categories?</span></a>
            </dd>
        </div>










@php
}
@endphp




            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Why is your condition related to your armed forces service?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['non-specific']['why'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/non-specific/why-related/?return=/applicant/claims/non-specific/check-answers">Change<span
                        class="govuk-visually-hidden"> Why is your condition related to your armed forces service?</span></a>
            </dd>
        </div>










    </dl>
                    <a class="govuk-button govuk-!-margin-top-5" data-module="govuk-button"
               href="/applicant/claims">
                Add another claim
            </a>
            <br />
            Or
            <br><br />
    <form method="post" enctype="multipart/form-data" novalidate>
    @csrf
        <div class="govuk-form-group">
            <button class="govuk-button govuk-!-margin-right-2" data-module="govuk-button">Save and Continue</button>
        </div>
    </form>
            </div>
        </div>
    </main>
</div>



@include('framework.footer')
