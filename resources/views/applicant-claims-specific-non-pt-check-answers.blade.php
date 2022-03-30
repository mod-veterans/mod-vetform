@include('framework.functions')
@php



    $userID = $_SESSION['vets-user'];
    $data = getData($userID);


if (empty($data['sections'])) {
header("Location: /tasklist");
die;
}


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

         @if(!empty($data['sections']['claims']['records'][$thisRecord]['type']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Type of medical condition</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['type'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/type?return=/applicant/claims/specific/non-pt/check-answers&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-illness/claim-illness">Change<span
                        class="govuk-visually-hidden"> Type of medical condition</span></a>
            </dd>
        </div>
         @endif
         @if(!empty($data['sections']['claims']['records'][$thisRecord]['specific']['pt-related']))

            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Was the incident or accident related to sport, adventure training or physical training?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['pt-related'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific?return=/applicant/claims/specific/non-pt/check-answers">Change<span
                        class="govuk-visually-hidden"> Was the incident or accident related to sport, adventure training or physical training?</span></a>
            </dd>
        </div>
         @endif
         @if(!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['conditions']))


            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">What medical condition(s) are you claiming for?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['conditions'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/non-pt/medical?return=/applicant/claims/specific/non-pt/check-answers&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-non-sporting-medical-condition/claim-accident-non-sporting-medical-condition">Change<span
                        class="govuk-visually-hidden"> What medical condition(s) are you claiming for?</span></a>
            </dd>
        </div>
         @endif
         @if(!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['hospital-address']['name']))

            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Diagnosing Medical Practitioner (if known)</dt>
            <dd class="govuk-summary-list__value">
                                   {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['hospital-address']['name'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/non-pt/medical/practitioner?return=/applicant/claims/specific/non-pt/check-answers&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-practitioner">Change<span
                        class="govuk-visually-hidden"> Name of the Medical Practitioner (if known)</span></a>
            </dd>
        </div>
         @endif
         @if(!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['hospital-address']['address1']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Practice, Building and street</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['hospital-address']['address1'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/non-pt/medical/practitioner?return=/applicant/claims/specific/non-pt/check-answers&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__address-line-1">Change<span
                        class="govuk-visually-hidden">Practice, Building and street</span></a>
            </dd>
        </div>
         @endif
         @if(!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['hospital-address']['address2']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Building and street line 2 of 2</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['hospital-address']['address2'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/non-pt/medical/practitioner/?return=/applicant/claims/specific/non-pt/check-answers&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__address-line-2">Change<span
                        class="govuk-visually-hidden"> Building and street line 2 of 2</span></a>
            </dd>
        </div>
         @endif
         @if(!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['hospital-address']['town']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Town or city</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['hospital-address']['town'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/non-pt/medical/practitioner/?return=/applicant/claims/specific/non-pt/check-answers&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__town">Change<span
                        class="govuk-visually-hidden"> Town or city</span></a>
            </dd>
        </div>
         @endif
         @if(!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['hospital-address']['county']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">County</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['hospital-address']['county'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/non-pt/medical/practitioner/?return=/applicant/claims/specific/non-pt/check-answers&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__county">Change<span
                        class="govuk-visually-hidden"> County</span></a>
            </dd>
        </div>
         @endif
         @if(!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['hospital-address']['country']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Country</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['hospital-address']['country'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/non-pt/medical/practitioner/?return=/applicant/claims/specific/non-pt/check-answers&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__country">Change<span
                        class="govuk-visually-hidden"> Country</span></a>
            </dd>
        </div>
         @endif
         @if(!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['hospital-address']['postcode']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Postcode</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['hospital-address']['postcode'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/non-pt/medical/practitioner/?return=/applicant/claims/specific/non-pt/check-answers&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__postcode">Change<span
                        class="govuk-visually-hidden"> Postcode</span></a>
            </dd>
        </div>
         @endif
         @if(!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['hospital-address']['telephone']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Telephone number</dt>
            <dd class="govuk-summary-list__value">
                                {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['hospital-address']['telephone'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/non-pt/medical/practitioner/?return=/applicant/claims/specific/non-pt/check-answers">Change<span
                        class="govuk-visually-hidden"> Telephone number</span></a>
            </dd>
        </div>
         @endif
         @if(!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['hospital-address']['email']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Email</dt>
            <dd class="govuk-summary-list__value">
                                {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['hospital-address']['email'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/non-pt/medical/practitioner/?return=/applicant/claims/specific/non-pt/check-answers">Change<span
                        class="govuk-visually-hidden"> Email</span></a>
            </dd>
        </div>

         @endif
         @if(!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['condition-start-date']['year']))


            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">What was the date your condition started?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['condition-start-date']['day'] ?? ''}} / {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['condition-start-date']['month'] ?? ''}} / {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['condition-start-date']['year'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/non-pt/date/?return=/applicant/claims/specific/non-pt/check-answers">Change<span
                        class="govuk-visually-hidden"> What was the date your condition started?</span></a>
            </dd>
        </div>
         @endif
         @if(!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['condition-start-date']['approximate']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Approximate date</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['condition-start-date']['approximate'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/non-pt/date/?return=/applicant/claims/specific/non-pt/check-answers">Change<span
                        class="govuk-visually-hidden"> Is this date approximate?</span></a>
            </dd>
        </div>
         @endif
         @if(!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['on-duty']))

            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Were you on duty at the time of the incident?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['on-duty'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/non-pt/on-duty/?return=/applicant/claims/specific/non-pt/check-answers">Change<span
                        class="govuk-visually-hidden"> Were you on duty at the time of incident?</span></a>
            </dd>
        </div>

         @endif
         @if(!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['report-incident']))

            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Did you report the incident?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['report-incident'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/non-pt/report/?return=/applicant/claims/specific/non-pt/check-answers">Change<span
                        class="govuk-visually-hidden"> Did you report the incident?</span></a>
            </dd>
        </div>

@endif

@php
if ($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['report-incident'] == 'Yes') {
@endphp

            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Who did you report the incident to?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['who-reported'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/non-pt/incident-report/?return=/applicant/claims/specific/non-pt/check-answers">Change<span
                        class="govuk-visually-hidden"> Who did you report the incident to?</span></a>
            </dd>
        </div>

@php
}
@endphp

         @if(!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['accident-form']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Was an accident form completed?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['accident-form'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/non-pt/accident-form/?return=/applicant/claims/specific/non-pt/check-answers">Change<span
                        class="govuk-visually-hidden"> Was an accident form completed?</span></a>
            </dd>
        </div>

          @endif
         @if(!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['where-were-you']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Where were you when the incident happened?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['where-were-you'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/non-pt/where-were-you/?return=/applicant/claims/specific/non-pt/check-answers">Change<span
                        class="govuk-visually-hidden"> Where were you when the incident happened?</span></a>
            </dd>
        </div>

          @endif
         @if(!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['rta']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Was the incident a road traffic accident?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['rta'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/non-pt/rta/?return=/applicant/claims/specific/non-pt/check-answers">Change<span
                        class="govuk-visually-hidden"> Was the incident a road traffic accident?</span></a>
            </dd>
        </div>

@endif

@php
if ($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['rta'] == 'Yes') {
@endphp


         @if(!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['journey-reason']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">What was the reason for your journey?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['journey-reason'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/non-pt/rta/journey-reason/?return=/applicant/claims/specific/non-pt/check-answers">Change<span
                        class="govuk-visually-hidden"> What was the reason for your journey?</span></a>
            </dd>
        </div>

          @endif
         @if(!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['journey-start']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Where did your journey start?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['journey-start'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/non-pt/rta/journey-start/?return=/applicant/claims/specific/non-pt/check-answers">Change<span
                        class="govuk-visually-hidden"> Where did your journey start?</span></a>
            </dd>
        </div>

          @endif
         @if(!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['journey-end']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Where did your journey end?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['journey-end'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/non-pt/rta/journey-end/?return=/applicant/claims/specific/non-pt/check-answers">Change<span
                        class="govuk-visually-hidden"> Where did your journey end?</span></a>
            </dd>
        </div>

          @endif



@php
}
@endphp
@if(!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['police-reported']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Police reference</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['police-reported'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/non-pt/police-report/?return=/applicant/claims/specific/non-pt/check-answers">Change<span
                        class="govuk-visually-hidden"> Was the incident reported to the civilian or military police?</span></a>
            </dd>
        </div>
@endif

@php
if ($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['police-reported'] == 'Yes') {
@endphp

            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Police reference?</dt>
            <dd class="govuk-summary-list__value">
                        Civilian Case Ref: {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['police-report']['civilian-ref'] ?? 'N/A'}}<br />
                        Military Case Ref: {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['police-report']['military-ref'] ?? 'N/A'}}<br />
                        I don't know: {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['police-report']['dontknow'] ?? 'N/A'}}<br />


                               </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/non-pt/police-report/reference-number/?return=/applicant/claims/specific/non-pt/check-answers">Change<span
                        class="govuk-visually-hidden"> Was the incident reported to the civilian or military police?</span></a>
            </dd>
        </div>

@php
}
@endphp


         @if(!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['authorised-leave']))

            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Were you on authorised leave?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['authorised-leave'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/non-pt/authorised-leave/?return=/applicant/claims/specific/non-pt/check-answers">Change<span
                        class="govuk-visually-hidden"> Were you on authorised leave at the time of the accident?</span></a>
            </dd>
        </div>


          @endif
         @if(!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['witnesses']))

        <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Were there any witnesses?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['witnesses'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/witnesses/?return=/applicant/claims/specific/non-pt/check-answers">Change<span
                        class="govuk-visually-hidden">Were there any witnesses?</span></a>
            </dd>
        </div>

          @endif
         @if(!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['firstaid']))

        <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Did you receive first aid treatment?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['firstaid'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/first-aid/?return=/applicant/claims/specific/non-pt/check-answers">Change<span
                        class="govuk-visually-hidden">Did you receive first aid treatment at the time?</span></a>
            </dd>
        </div>


          @endif
         @if(!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['hospital']))
        <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Did you go to, or were you taken to, a hospital or medical facility?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['hospital'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/hospital/?return=/applicant/claims/specific/non-pt/check-answers">Change<span
                        class="govuk-visually-hidden">Did you go to, or were you taken to, a hospital or medical facility?</span></a>
            </dd>
        </div>

@endif
@php
if ($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['hospital'] == 'Yes') {
@endphp


         @if(!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['first-aid-hospital-address']['name']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Name of hospital/Medical Practitioner (if known)</dt>
            <dd class="govuk-summary-list__value">
                                   {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['first-aid-hospital-address']['name'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/hospital/address?return=/applicant/claims/specific/non-pt/check-answers">Change<span
                        class="govuk-visually-hidden"> Name of the Medical Practitioner (if known)</span></a>
            </dd>
        </div>
        @endif
         @if(!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['first-aid-hospital-address']['address1']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Building and street</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['first-aid-hospital-address']['address1'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/hospital/address?return=/applicant/claims/specific/non-pt/check-answers">Change<span
                        class="govuk-visually-hidden"> Building and street</span></a>
            </dd>
        </div>
        @endif
         @if(!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['first-aid-hospital-address']['address2']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Building and street line 2 of 2</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['first-aid-hospital-address']['address2'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/hospital/address/?return=/applicant/claims/specific/non-pt/check-answers">Change<span
                        class="govuk-visually-hidden"> Building and street line 2 of 2</span></a>
            </dd>
        </div>
        @endif
         @if(!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['first-aid-hospital-address']['town']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Town or city</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['first-aid-hospital-address']['town'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/hospital/address/?return=/applicant/claims/specific/non-pt/check-answers">Change<span
                        class="govuk-visually-hidden"> Town or city</span></a>
            </dd>
        </div>
        @endif
         @if(!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['first-aid-hospital-address']['county']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">County</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['first-aid-hospital-address']['county'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/hospital/address/?return=/applicant/claims/specific/non-pt/check-answers">Change<span
                        class="govuk-visually-hidden"> County</span></a>
            </dd>
        </div>
        @endif
         @if(!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['first-aid-hospital-address']['country']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Country</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['first-aid-hospital-address']['country'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/hospital/address/?return=/applicant/claims/specific/non-pt/check-answers">Change<span
                        class="govuk-visually-hidden"> Country</span></a>
            </dd>
        </div>
        @endif
         @if(!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['first-aid-hospital-address']['postcode']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Postcode</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['first-aid-hospital-address']['postcode'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/hospital/address/?return=/applicant/claims/specific/non-pt/check-answers">Change<span
                        class="govuk-visually-hidden"> Postcode</span></a>
            </dd>
        </div>
        @endif
         @if(!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['first-aid-hospital-address']['telephone']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Telephone number</dt>
            <dd class="govuk-summary-list__value">
                                {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['first-aid-hospital-address']['telephone'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/hospital/address/?return=/applicant/claims/specific/non-pt/check-answers">Change<span
                        class="govuk-visually-hidden"> Telephone number</span></a>
            </dd>
        </div>
        @endif
         @if(!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['first-aid-hospital-address']['email']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Email</dt>
            <dd class="govuk-summary-list__value">
                                {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['first-aid-hospital-address']['email'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/hospital/address/?return=/applicant/claims/specific/non-pt/check-answers">Change<span
                        class="govuk-visually-hidden"> Email</span></a>
            </dd>
        </div>

        @endif




@php
}
@endphp

@if(!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['downgraded']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Were you downgraded for any of the conditions on this claim?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['downgraded'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/downgraded/?return=/applicant/claims/specific/non-pt/check-answers">Change<span
                        class="govuk-visually-hidden"> Were you downgraded for any of the conditions on this claim?</span></a>
            </dd>
        </div>

@endif

@php
if ($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['downgraded'] == 'Yes') {
@endphp


            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Date downgraded from</dt>
            <dd class="govuk-summary-list__value">
                                   {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['downgraded-start']['fromday'] ?? ''}} / {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['downgraded-start']['frommonth'] ?? ''}} / {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['downgraded-start']['fromyear'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/downgraded/when/?return=/applicant/claims/specific/non-pt/check-answers">Change<span
                        class="govuk-visually-hidden"> Date downgraded from</span></a>
            </dd>
        </div>

            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Approximate date</dt>
            <dd class="govuk-summary-list__value">
                                   {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['downgraded-start']['datesapproximate'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/downgraded/when/?return=/applicant/claims/specific/non-pt/check-answers">Change<span
                        class="govuk-visually-hidden"> Downgrade from date approximate? </span></a>
            </dd>
        </div>


            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Date downgraded to</dt>
            <dd class="govuk-summary-list__value">
                                   {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['downgraded-end']['today'] ?? ''}} / {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['downgraded-end']['tomonth'] ?? ''}} / {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['downgraded-end']['toyear'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/downgraded/end/?return=/applicant/claims/specific/non-pt/check-answers">Change<span
                        class="govuk-visually-hidden"> Date downgraded to</span></a>
            </dd>
        </div>

            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Approximate date</dt>
            <dd class="govuk-summary-list__value">
                                   {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['downgraded-end']['datesapproximate'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/downgraded/end/?return=/applicant/claims/specific/non-pt/check-answers">Change<span
                        class="govuk-visually-hidden"> Downgrade end date approximate? </span></a>
            </dd>
        </div>

            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Still downgraded?</dt>
            <dd class="govuk-summary-list__value">
                                   {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['downgraded-end']['stilldowngraded'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/downgraded/end/?return=/applicant/claims/specific/non-pt/check-answers">Change<span
                        class="govuk-visually-hidden"> are you still downgraded? </span></a>
            </dd>
        </div>

        <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">What medical category were you downgraded from?</dt>
            <dd class="govuk-summary-list__value">
                                   {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['medical-categories']['frommedical'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/downgraded/detail/?return=/applicant/claims/specific/non-pt/check-answers">Change<span
                        class="govuk-visually-hidden"> What medical category were you downgraded from?</span></a>
            </dd>
        </div>

        <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">What medical category were you downgraded to?</dt>
            <dd class="govuk-summary-list__value">
                                   {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['medical-categories']['tomedical'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/downgraded/detail/?return=/applicant/claims/specific/non-pt/check-answers">Change<span
                        class="govuk-visually-hidden"> What medical category were you downgraded to?</span></a>
            </dd>
        </div>

        <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">I was downgraded and upgraded more than once within different categories?</dt>
            <dd class="govuk-summary-list__value">
                                   {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['medical-categories']['multiple'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/downgraded/detail/?return=/applicant/claims/specific/non-pt/check-answers">Change<span
                        class="govuk-visually-hidden">Were you downgraded and upgraded more than once within different categories?</span></a>
            </dd>
        </div>










@php
}
@endphp




            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Why is your condition related to your armed forces service?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['why'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/why-related/?return=/applicant/claims/specific/non-pt/check-answers">Change<span
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
