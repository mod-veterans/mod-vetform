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

    header("Location: /applicant/claims");
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
                <a class="govuk-link" href="/applicant/claims/type?return=/applicant/claims/specific/pt/check-answers&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-illness/claim-illness">Change<span
                        class="govuk-visually-hidden"> Type of medical condition</span></a>
            </dd>
        </div>

            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Was the incident or accident related to sport, adventure training or physical training?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['pt-related'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific?return=/applicant/claims/specific/pt/check-answers">Change<span
                        class="govuk-visually-hidden"> Was the incident or accident related to sport, adventure training or physical training?</span></a>
            </dd>
        </div>



            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">What medical condition(s) are you claiming for?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['conditions'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/pt/medical?return=/applicant/claims/specific/pt/check-answers&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-non-sporting-medical-condition/claim-accident-non-sporting-medical-condition">Change<span
                        class="govuk-visually-hidden"> What medical condition(s) are you claiming for?</span></a>
            </dd>
        </div>

            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Name of the Medical Practitioner (if known)</dt>
            <dd class="govuk-summary-list__value">
                                   {{$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['hospital-address']['name'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/pt/medical/practitioner?return=/applicant/claims/specific/pt/check-answers&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-practitioner">Change<span
                        class="govuk-visually-hidden"> Name of the Medical Practitioner (if known)</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Building and street</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['hospital-address']['address1'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/pt/medical/practitioner?return=/applicant/claims/specific/pt/check-answers&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__address-line-1">Change<span
                        class="govuk-visually-hidden"> Building and street</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Building and street line 2 of 2</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['hospital-address']['address2'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/pt/medical/practitioner/?return=/applicant/claims/specific/pt/check-answers&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__address-line-2">Change<span
                        class="govuk-visually-hidden"> Building and street line 2 of 2</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Town or city</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['hospital-address']['town'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/pt/medical/practitioner/?return=/applicant/claims/specific/pt/check-answers&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__town">Change<span
                        class="govuk-visually-hidden"> Town or city</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">County</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['hospital-address']['county'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/pt/medical/practitioner/?return=/applicant/claims/specific/pt/check-answers&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__county">Change<span
                        class="govuk-visually-hidden"> County</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Country</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['hospital-address']['country'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/pt/medical/practitioner/?return=/applicant/claims/specific/pt/check-answers&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__country">Change<span
                        class="govuk-visually-hidden"> Country</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Postcode</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['hospital-address']['postcode'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/pt/medical/practitioner/?return=/applicant/claims/specific/pt/check-answers&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__postcode">Change<span
                        class="govuk-visually-hidden"> Postcode</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Telephone number</dt>
            <dd class="govuk-summary-list__value">
                                {{$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['hospital-address']['telephone'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/pt/medical/practitioner/?return=/applicant/claims/specific/pt/check-answers&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-number">Change<span
                        class="govuk-visually-hidden"> Telephone number</span></a>
            </dd>
        </div>

            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Email</dt>
            <dd class="govuk-summary-list__value">
                                {{$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['hospital-address']['email'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/pt/medical/practitioner/?return=/applicant/claims/specific/pt/check-answers&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-number">Change<span
                        class="govuk-visually-hidden"> Email</span></a>
            </dd>
        </div>




            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">What was the date your condition started?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['condition-start-date']['day'] ?? ''}} / {{$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['condition-start-date']['month'] ?? ''}} / {{$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['condition-start-date']['year'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/pt/date/?return=/applicant/claims/specific/pt/check-answers">Change<span
                        class="govuk-visually-hidden"> What was the date your condition started?</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Is this date approximate?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['condition-start-date']['approximate'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/pt/date/?return=/applicant/claims/specific/pt/check-answers">Change<span
                        class="govuk-visually-hidden"> Is this date approximate?</span></a>
            </dd>
        </div>




            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">What is your illness/condition related to</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['related-conditions'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/non-specific/illness-related/?return=/applicant/claims/specific/pt/check-answers&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-related/sporting-related">Change<span
                        class="govuk-visually-hidden"> What is your illness/condition related to</span></a>
            </dd>
        </div>


        <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">What was the activity?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['activity'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/pt/activity/?return=/applicant/claims/specific/pt/check-answers">Change<span
                        class="govuk-visually-hidden"> What was the activity?</span></a>
            </dd>
        </div>


        <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Was the activity authorised or organised by the Armed Forces?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['authorised'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/pt/armed-forces-organised/?return=/applicant/claims/specific/pt/check-answers">Change<span
                        class="govuk-visually-hidden">Was the activity authorised or organised by the Armed Forces?</span></a>
            </dd>
        </div>

        <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Were you representing your Unit?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['representing'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/pt/unit-representation/?return=/applicant/claims/specific/pt/check-answers">Change<span
                        class="govuk-visually-hidden">Were you representing your Unit?</span></a>
            </dd>
        </div>

        <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Where were you when the incident happened?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['where'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/pt/condition-relation/?return=/applicant/claims/specific/pt/check-answers">Change<span
                        class="govuk-visually-hidden">Where were you when the incident happened?</span></a>
            </dd>
        </div>

        <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Were there any witnesses?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['witnesses'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/pt/witnesses/?return=/applicant/claims/specific/pt/check-answers">Change<span
                        class="govuk-visually-hidden">Were there any witnesses?</span></a>
            </dd>
        </div>

        <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Did you receive first aid treatment at the time?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['firstaid'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/pt/first-aid/?return=/applicant/claims/specific/pt/check-answers">Change<span
                        class="govuk-visually-hidden">Did you receive first aid treatment at the time?</span></a>
            </dd>
        </div>



        <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Did you go to, or were you taken to, a hospital or medical facility?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['hospital'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/pt/hospital/?return=/applicant/claims/specific/pt/check-answers">Change<span
                        class="govuk-visually-hidden">Did you go to, or were you taken to, a hospital or medical facility?</span></a>
            </dd>
        </div>

@php
if ($data['sections']['claims']['records'][$thisRecord]['specific']['pt']['hospital'] == 'Yes') {
@endphp



            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Name of the Medical Practitioner (if known)</dt>
            <dd class="govuk-summary-list__value">
                                   {{$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['first-aid-hospital-address']['name'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/pt/hospital/address?return=/applicant/claims/specific/pt/check-answers&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-practitioner">Change<span
                        class="govuk-visually-hidden"> Name of the Medical Practitioner (if known)</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Building and street</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['first-aid-hospital-address']['address1'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/pt/hospital/address?return=/applicant/claims/specific/pt/check-answers&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__address-line-1">Change<span
                        class="govuk-visually-hidden"> Building and street</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Building and street line 2 of 2</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['first-aid-hospital-address']['address2'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/pt/hospital/address/?return=/applicant/claims/specific/pt/check-answers&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__address-line-2">Change<span
                        class="govuk-visually-hidden"> Building and street line 2 of 2</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Town or city</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['first-aid-hospital-address']['town'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/pt/hospital/address/?return=/applicant/claims/specific/pt/check-answers&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__town">Change<span
                        class="govuk-visually-hidden"> Town or city</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">County</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['first-aid-hospital-address']['county'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/pt/hospital/address/?return=/applicant/claims/specific/pt/check-answers&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__county">Change<span
                        class="govuk-visually-hidden"> County</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Country</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['first-aid-hospital-address']['country'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/pt/hospital/address/?return=/applicant/claims/specific/pt/check-answers&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__country">Change<span
                        class="govuk-visually-hidden"> Country</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Postcode</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['first-aid-hospital-address']['postcode'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/pt/hospital/address/?return=/applicant/claims/specific/pt/check-answers&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__postcode">Change<span
                        class="govuk-visually-hidden"> Postcode</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Telephone number</dt>
            <dd class="govuk-summary-list__value">
                                {{$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['first-aid-hospital-address']['telephone'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/pt/hospital/address/?return=/applicant/claims/specific/pt/check-answers&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-number">Change<span
                        class="govuk-visually-hidden"> Telephone number</span></a>
            </dd>
        </div>

            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Email</dt>
            <dd class="govuk-summary-list__value">
                                {{$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['first-aid-hospital-address']['email'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/pt/hospital/address/?return=/applicant/claims/specific/pt/check-answers&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-number">Change<span
                        class="govuk-visually-hidden"> Email</span></a>
            </dd>
        </div>








@php
}
@endphp


            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Were you downgraded for any of the conditions on this claim?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['downgraded'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/pt/downgraded/?return=/applicant/claims/specific/pt/check-answers">Change<span
                        class="govuk-visually-hidden"> Were you downgraded for any of the conditions on this claim?</span></a>
            </dd>
        </div>

@php
if ($data['sections']['claims']['records'][$thisRecord]['specific']['pt']['downgraded'] == 'Yes') {
@endphp


            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Date downgraded from</dt>
            <dd class="govuk-summary-list__value">
                                   {{$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['downgraded-start']['fromday'] ?? ''}} / {{$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['downgraded-start']['frommonth'] ?? ''}} / {{$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['downgraded-start']['fromyear'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/pt/downgraded/when/?return=/applicant/claims/specific/pt/check-answers">Change<span
                        class="govuk-visually-hidden"> Date downgraded from</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Downgrade start date approximate?</dt>
            <dd class="govuk-summary-list__value">
                                   {{$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['downgraded-start']['datesapproximate'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/pt/downgraded/when/?return=/applicant/claims/specific/pt/check-answers">Change<span
                        class="govuk-visually-hidden"> Downgrade start date approximate? </span></a>
            </dd>
        </div>



            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Date downgraded to</dt>
            <dd class="govuk-summary-list__value">
                                   {{$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['downgraded-end']['today'] ?? ''}} / {{$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['downgraded-end']['tomonth'] ?? ''}} / {{$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['downgraded-end']['toyear'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/pt/downgraded/end/?return=/applicant/claims/specific/pt/check-answers">Change<span
                        class="govuk-visually-hidden"> Date downgraded to</span></a>
            </dd>
        </div>

            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Downgrade end date approximate?</dt>
            <dd class="govuk-summary-list__value">
                                   {{$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['downgraded-end']['datesapproximate'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/pt/downgraded/end/?return=/applicant/claims/specific/pt/check-answers">Change<span
                        class="govuk-visually-hidden"> Downgrade end date approximate? </span></a>
            </dd>
        </div>

            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Are you still downgraded?</dt>
            <dd class="govuk-summary-list__value">
                                   {{$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['downgraded-end']['stilldowngraded'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/pt/downgraded/end/?return=/applicant/claims/specific/pt/check-answers">Change<span
                        class="govuk-visually-hidden"> are you still downgraded? </span></a>
            </dd>
        </div>

        <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">What medical category were you downgraded from?</dt>
            <dd class="govuk-summary-list__value">
                                   {{$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['medical-categories']['frommedical'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/pt/downgraded/detail/?return=/applicant/claims/specific/pt/check-answers">Change<span
                        class="govuk-visually-hidden"> What medical category were you downgraded from?</span></a>
            </dd>
        </div>

        <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">What medical category were you downgraded to?</dt>
            <dd class="govuk-summary-list__value">
                                   {{$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['medical-categories']['tomedical'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/pt/downgraded/detail/?return=/applicant/claims/specific/pt/check-answers">Change<span
                        class="govuk-visually-hidden"> What medical category were you downgraded to?</span></a>
            </dd>
        </div>

        <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Were you downgraded and upgraded more than once within different categories?</dt>
            <dd class="govuk-summary-list__value">
                                   {{$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['medical-categories']['multiple'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/pt/downgraded/detail/?return=/applicant/claims/specific/pt/check-answers">Change<span
                        class="govuk-visually-hidden">Were you downgraded and upgraded more than once within different categories?</span></a>
            </dd>
        </div>










@php
}
@endphp




            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Why is your condition related to your armed forces service?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['why'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/pt/why-related/?return=/applicant/claims/specific/pt/check-answers">Change<span
                        class="govuk-visually-hidden"> Why is your condition related to your armed forces service?</span></a>
            </dd>
        </div>










    </dl>

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
