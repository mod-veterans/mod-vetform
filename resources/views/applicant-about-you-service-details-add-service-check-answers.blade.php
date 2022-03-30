@include('framework.functions')
@php


$userID = $_SESSION['vets-user'];
$data = getData($userID);


//this gets teh current record ID to edit and sets it for reference
if (empty($_GET['servicerecord'])) {

    if (empty($data['settings']['service-details-record-num'])) {
        header("Location: /applicant/about-you/service-details");
        die();
    } else {
        $thisRecord = $data['settings']['service-details-record-num'];
    }

} else {
    $thisRecord = cleanRecordID($_GET['servicerecord']);
    $data['settings']['service-details-record-num'] = $thisRecord;
}





if (!empty($_POST)) {

    $data['sections']['service-details']['completed'] = TRUE;

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
                                <h2 class="govuk-heading-m">Service details</h2>
        <dl class="govuk-summary-list govuk-!-margin-bottom-9">
@php
if (!empty($data['sections']['service-details']['records'][$thisRecord]['nameinservice'])) {
    $nameshow = $data['sections']['service-details']['records'][$thisRecord]['nameinservice'];
    if ($data['sections']['service-details']['records'][$thisRecord]['donotwanttodisclose'] == 'Yes') {
        $nameshow = 'Would rather not disclose';
    }
} else {
    $nameshow = 'no different name';
}

@endphp

 @if(!empty($data['sections']['service-details']['records'][$thisRecord]['nameinservice']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Did you have a different name during this period of service?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['service-details']['records'][$thisRecord]['differentname'] ?? '' }}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/service-details/add-service/name/?return=/applicant/about-you/service-details/add-service/check-answers&amp;stack=1ec28038-9ec7-6d98-bcbf-eeee0aff0985#afcs/about-you/service-details/service-name/name-in-service">Change<span
                        class="govuk-visually-hidden"> Enter the full name in service</span></a>
            </dd>
        </div>

            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Enter the full name in service</dt>
            <dd class="govuk-summary-list__value">
                                    {{$nameshow ?? 'Would rather not disclose' }}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/service-details/add-service/name/?return=/applicant/about-you/service-details/add-service/check-answers&amp;stack=1ec28038-9ec7-6d98-bcbf-eeee0aff0985#afcs/about-you/service-details/service-name/name-in-service">Change<span
                        class="govuk-visually-hidden"> Enter the full name in service</span></a>
            </dd>
        </div>
@endif
 @if(!empty($data['sections']['service-details']['records'][$thisRecord]['servicenumber']))



            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key"`>Service number</dt>
            <dd class="govuk-summary-list__value">
                                    {{ $data['sections']['service-details']['records'][$thisRecord]['servicenumber'] ?? '' }}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/service-details/add-service/service-number/?return=/applicant/about-you/service-details/add-service/check-answers&amp;stack=1ec28038-9ec7-6d98-bcbf-eeee0aff0985#afcs/about-you/service-details/service-number/service-number">Change<span
                        class="govuk-visually-hidden"> Enter the service number</span></a>
            </dd>
        </div>
@endif
 @if(!empty($data['sections']['service-details']['records'][$thisRecord]['servicebranch']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Service branch</dt>
            <dd class="govuk-summary-list__value">
                                    {{ $data['sections']['service-details']['records'][$thisRecord]['servicebranch'] ?? '' }}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/service-details/add-service/branch-service/?return=/applicant/about-you/service-details/add-service/check-answers&amp;stack=1ec28038-9ec7-6d98-bcbf-eeee0aff0985#afcs/about-you/service-details/service-branch/service-branch">Change<span
                        class="govuk-visually-hidden"> Select your service branch</span></a>
            </dd>
        </div>
@endif
 @if(!empty($data['sections']['service-details']['records'][$thisRecord]['servicetype']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Service type?</dt>
            <dd class="govuk-summary-list__value">
                                    {{ $data['sections']['service-details']['records'][$thisRecord]['servicetype'] ?? '' }}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/service-details/add-service/service-type/?return=/applicant/about-you/service-details/add-service/check-answers&amp;stack=1ec28038-9ec7-6d98-bcbf-eeee0aff0985#afcs/about-you/service-details/service-type/service-type">Change<span
                        class="govuk-visually-hidden"> What was/is your service type?</span></a>
            </dd>
        </div>
@endif
 @if(!empty($data['sections']['service-details']['records'][$thisRecord]['service-rank']))

            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Service rank</dt>
            <dd class="govuk-summary-list__value">
                                    {{ $data['sections']['service-details']['records'][$thisRecord]['service-rank'] ?? '' }}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/service-details/add-service/rank/?return=/applicant/about-you/service-details/add-service/check-answers&amp;stack=1ec28038-9ec7-6d98-bcbf-eeee0aff0985#afcs/about-you/service-details/service-rank/service-rank">Change<span
                        class="govuk-visually-hidden"> Service rank</span></a>
            </dd>
        </div>
@endif
 @if(!empty($data['sections']['service-details']['records'][$thisRecord]['specialism']))

            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Service trade</dt>
            <dd class="govuk-summary-list__value">
                                    {{ $data['sections']['service-details']['records'][$thisRecord]['specialism'] ?? '' }}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/service-details/add-service/specialism/?return=/applicant/about-you/service-details/add-service/check-answers&amp;stack=1ec28038-9ec7-6d98-bcbf-eeee0aff0985#afcs/about-you/service-details/service-trade/service-trade">Change<span
                        class="govuk-visually-hidden"> Service trade</span></a>
            </dd>
        </div>
@endif
 @if(!empty($data['sections']['service-details']['records'][$thisRecord]['service-enlistmentdate']['year']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Enlistment Date</dt>
            <dd class="govuk-summary-list__value">
                                    {{ $data['sections']['service-details']['records'][$thisRecord]['service-enlistmentdate']['day'] ?? '--' }} / {{ $data['sections']['service-details']['records'][$thisRecord]['service-enlistmentdate']['month'] ?? '--' }} / {{ $data['sections']['service-details']['records'][$thisRecord]['service-enlistmentdate']['year'] ?? '--' }}

  @php
 if ($data['sections']['service-details']['records'][$thisRecord]['service-enlistmentdate']['approximate'] == 'Yes') {
 echo '(This date is approximate)';
 }
 @endphp

                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/service-details/add-service/enlistment-date/?return=/applicant/about-you/service-details/add-service/check-answers&amp;stack=1ec28038-9ec7-6d98-bcbf-eeee0aff0985#afcs/about-you/service-details/service-enlistment-date/enlistment-date">Change<span
                        class="govuk-visually-hidden"> Date of enlistment</span></a>
            </dd>
        </div>
@endif
 @if(!empty($data['sections']['service-details']['records'][$thisRecord]['service-dischargedate']['year']))

            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Discharge date</dt>
            <dd class="govuk-summary-list__value">
                                    {{ $data['sections']['service-details']['records'][$thisRecord]['service-dischargedate']['day'] ?? '' }} / {{ $data['sections']['service-details']['records'][$thisRecord]['service-dischargedate']['month'] ?? '' }} / {{ $data['sections']['service-details']['records'][$thisRecord]['service-dischargedate']['year'] ?? '' }}

 @php
 if ($data['sections']['service-details']['records'][$thisRecord]['service-dischargedate']['approximate'] == 'Yes') {
 echo '(This date is approximate)';
 }
 @endphp

                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/service-details/add-service/discharge-date/?return=/applicant/about-you/service-details/add-service/check-answers&amp;stack=1ec28038-9ec7-6d98-bcbf-eeee0aff0985#afcs/about-you/service-details/service-enlistment-date/enlistment-date">Change<span
                        class="govuk-visually-hidden"> Discharge date</span></a>
            </dd>
        </div>
@endif
 @if(!empty($data['sections']['service-details']['records'][$thisRecord]['service-dischargedate']['stillserving']))

            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Still serving</dt>
            <dd class="govuk-summary-list__value">
                                    {{ $data['sections']['service-details']['records'][$thisRecord]['service-dischargedate']['stillserving'] ?? '' }}

                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/service-details/add-service/discharge-date/?return=/applicant/about-you/service-details/add-service/check-answers&amp;stack=1ec28038-9ec7-6d98-bcbf-eeee0aff0985#afcs/about-you/service-details/service-discharge/service-is-serving">Change<span
                        class="govuk-visually-hidden"> I am still serving</span></a>
            </dd>
        </div>
@endif
 @if(!empty($data['sections']['service-details']['records'][$thisRecord]['service-dischargedate']['dischargereason']))

            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Discharge reason</dt>
            <dd class="govuk-summary-list__value">
                                    {{ $data['sections']['service-details']['records'][$thisRecord]['service-dischargedate']['dischargereason'] ?? 'Not asked' }}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/service-details/add-service/discharge-reason/?return=/applicant/about-you/service-details/add-service/check-answers&amp;stack=1ec28038-9ec7-6d98-bcbf-eeee0aff0985#afcs/about-you/service-details/service-discharge/service-is-serving">Change<span
                        class="govuk-visually-hidden"> I am still serving</span></a>
            </dd>
        </div>
@endif
 @if(!empty($data['sections']['service-details']['records'][$thisRecord]['unit-address']['address1']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Last Unit - Base, Building and Street</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['service-details']['records'][$thisRecord]['unit-address']['address1'] ?? '' }}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/service-details/add-service/last-unit-address/?return=/applicant/about-you/service-details/add-service/check-answers&amp;stack=1ec28038-9ec7-6d98-bcbf-eeee0aff0985#afcs/about-you/service-details/unit-address/address-line-1">Change<span
                        class="govuk-visually-hidden">Last unit address - Base, Building and Street</span></a>
            </dd>
        </div>
@endif
 @if(!empty($data['sections']['service-details']['records'][$thisRecord]['unit-address']['address2']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Building and street line 2 of 2</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['service-details']['records'][$thisRecord]['unit-address']['address2'] ?? '' }}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/service-details/add-service/last-unit-address/?return=/applicant/about-you/service-details/add-service/check-answers&amp;stack=1ec28038-9ec7-6d98-bcbf-eeee0aff0985#afcs/about-you/service-details/unit-address/address-line-2">Change<span
                        class="govuk-visually-hidden"> Building and street line 2 of 2</span></a>
            </dd>
        </div>
@endif
 @if(!empty($data['sections']['service-details']['records'][$thisRecord]['unit-address']['town']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Town or city</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['service-details']['records'][$thisRecord]['unit-address']['town'] ?? '' }}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/service-details/add-service/last-unit-address/?return=/applicant/about-you/service-details/add-service/check-answers&amp;stack=1ec28038-9ec7-6d98-bcbf-eeee0aff0985#afcs/about-you/service-details/unit-address/town">Change<span
                        class="govuk-visually-hidden"> Town or city</span></a>
            </dd>
        </div>
@endif
 @if(!empty($data['sections']['service-details']['records'][$thisRecord]['unit-address']['county']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">County</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['service-details']['records'][$thisRecord]['unit-address']['county'] ?? '' }}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/service-details/add-service/last-unit-address/?return=/applicant/about-you/service-details/add-service/check-answers&amp;stack=1ec28038-9ec7-6d98-bcbf-eeee0aff0985#afcs/about-you/service-details/unit-address/county">Change<span
                        class="govuk-visually-hidden"> County</span></a>
            </dd>
        </div>
 @endif
 @if(!empty($data['sections']['service-details']['records'][$thisRecord]['unit-address']['country']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Country</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['service-details']['records'][$thisRecord]['unit-address']['country'] ?? '' }}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/service-details/add-service/last-unit-address/?return=/applicant/about-you/service-details/add-service/check-answers&amp;stack=1ec28038-9ec7-6d98-bcbf-eeee0aff0985#afcs/about-you/service-details/unit-address/country">Change<span
                        class="govuk-visually-hidden"> Country</span></a>
            </dd>
        </div>
 @endif
 @if(!empty($data['sections']['service-details']['records'][$thisRecord]['unit-address']['postcode']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Postcode</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['service-details']['records'][$thisRecord]['unit-address']['postcode'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/about-you/service-details/add-service/last-unit-address?return=/applicant/about-you/service-details/add-service/check-answers&amp;stack=1ec28038-9ec7-6d98-bcbf-eeee0aff0985#afcs/about-you/service-details/unit-address/postcode">Change<span
                        class="govuk-visually-hidden"> Postcode</span></a>
            </dd>
        </div>
@endif
    </dl>
                    <a class="govuk-button govuk-!-margin-top-5" data-module="govuk-button"
               href="/applicant/about-you/service-details">
                Add another period of service
            </a>
            <p class="govuk-body">or</p>
    <form method="post" enctype="multipart/form-data" novalidate>
    @csrf
        <div class="govuk-form-group">
            <button class="govuk-button govuk-!-margin-right-2" data-module="govuk-button" name="save and continue" value="save and continue">Save and continue</button>
        </div>
    </form>
            </div>
        </div>
    </main>
</div>




@include('framework.footer')
