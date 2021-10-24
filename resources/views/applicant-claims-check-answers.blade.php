@include('framework.functions')
@php

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
                                    A condition, injury or illness that is the result of a specific accident or incident
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="https://modvets-dev2.london.cloudapps.digital/your-claim/claim-details/claim-illness/?return=summarise&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-illness/claim-illness">Change<span
                        class="govuk-visually-hidden"> Type of medical condition</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Were you downgraded for any of the conditions on this claim?</dt>
            <dd class="govuk-summary-list__value">
                                    No
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="https://modvets-dev2.london.cloudapps.digital/your-claim/claim-details/claim-downgraded/?return=summarise&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-downgraded/claim-illness-downgraded">Change<span
                        class="govuk-visually-hidden"> Were you downgraded for any of the conditions on this claim?</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Why is your condition related to your armed forces service?</dt>
            <dd class="govuk-summary-list__value">
                                    [pl[lpl[plpl
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="https://modvets-dev2.london.cloudapps.digital/your-claim/claim-details/claim-illness-note/?return=summarise&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-illness-note/claim-illness-note">Change<span
                        class="govuk-visually-hidden"> Why is your condition related to your armed forces service?</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Was the Incident/Accident related to Sporting/Adventure Training/Physical Training?</dt>
            <dd class="govuk-summary-list__value">
                                    Yes
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="https://modvets-dev2.london.cloudapps.digital/your-claim/claim-details/claim-accident-condition/?return=summarise&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-condition/claim-accident-condition">Change<span
                        class="govuk-visually-hidden"> Was the Incident/Accident related to Sporting/Adventure Training/Physical Training?</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">What medical condition(s) are you claiming for?</dt>
            <dd class="govuk-summary-list__value">
                                    gigugiugug
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="https://modvets-dev2.london.cloudapps.digital/your-claim/claim-details/claim-accident-non-sporting-medical-condition/?return=summarise&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-non-sporting-medical-condition/claim-accident-non-sporting-medical-condition">Change<span
                        class="govuk-visually-hidden"> What medical condition(s) are you claiming for?</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">What medical condition(s) are you claiming for?</dt>
            <dd class="govuk-summary-list__value">
                                    plpplpl
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="https://modvets-dev2.london.cloudapps.digital/your-claim/claim-details/claim-accident-sporting-medical-condition/?return=summarise&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-medical-condition/claim-accident-sporting-medical-condition">Change<span
                        class="govuk-visually-hidden"> What medical condition(s) are you claiming for?</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Name of the Medical Practitioner (if known)</dt>
            <dd class="govuk-summary-list__value">
                                    plplp
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="https://modvets-dev2.london.cloudapps.digital/your-claim/claim-details/claim-accident-sporting-surgery-address/?return=summarise&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-practitioner">Change<span
                        class="govuk-visually-hidden"> Name of the Medical Practitioner (if known)</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Building and street</dt>
            <dd class="govuk-summary-list__value">
                                    lplpl
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="https://modvets-dev2.london.cloudapps.digital/your-claim/claim-details/claim-accident-sporting-surgery-address/?return=summarise&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__address-line-1">Change<span
                        class="govuk-visually-hidden"> Building and street</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Building and street line 2 of 2</dt>
            <dd class="govuk-summary-list__value">
                                    plpl
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="https://modvets-dev2.london.cloudapps.digital/your-claim/claim-details/claim-accident-sporting-surgery-address/?return=summarise&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__address-line-2">Change<span
                        class="govuk-visually-hidden"> Building and street line 2 of 2</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Town or city</dt>
            <dd class="govuk-summary-list__value">
                                    plpl
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="https://modvets-dev2.london.cloudapps.digital/your-claim/claim-details/claim-accident-sporting-surgery-address/?return=summarise&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__town">Change<span
                        class="govuk-visually-hidden"> Town or city</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">County</dt>
            <dd class="govuk-summary-list__value">
                                    pl
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="https://modvets-dev2.london.cloudapps.digital/your-claim/claim-details/claim-accident-sporting-surgery-address/?return=summarise&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__county">Change<span
                        class="govuk-visually-hidden"> County</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Country</dt>
            <dd class="govuk-summary-list__value">
                                    United Kingdom
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="https://modvets-dev2.london.cloudapps.digital/your-claim/claim-details/claim-accident-sporting-surgery-address/?return=summarise&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__country">Change<span
                        class="govuk-visually-hidden"> Country</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Postcode</dt>
            <dd class="govuk-summary-list__value">
                                    plplplpl
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="https://modvets-dev2.london.cloudapps.digital/your-claim/claim-details/claim-accident-sporting-surgery-address/?return=summarise&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__postcode">Change<span
                        class="govuk-visually-hidden"> Postcode</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Telephone number</dt>
            <dd class="govuk-summary-list__value">
                                    plpl
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="https://modvets-dev2.london.cloudapps.digital/your-claim/claim-details/claim-accident-sporting-surgery-address/?return=summarise&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-number">Change<span
                        class="govuk-visually-hidden"> Telephone number</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">What was the date of injury/incident?</dt>
            <dd class="govuk-summary-list__value">
                                    12 December 1212
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="https://modvets-dev2.london.cloudapps.digital/your-claim/claim-details/claim-accident-sporting-date/?return=summarise&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-date/date-of-injury-incident">Change<span
                        class="govuk-visually-hidden"> What was the date of injury/incident?</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">What was the activity?</dt>
            <dd class="govuk-summary-list__value">
                                    plplplpl
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="https://modvets-dev2.london.cloudapps.digital/your-claim/claim-details/claim-accident-sporting-activity/?return=summarise&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-activity/activity">Change<span
                        class="govuk-visually-hidden"> What was the activity?</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Were you representing your Unit?</dt>
            <dd class="govuk-summary-list__value">
                                    No
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="https://modvets-dev2.london.cloudapps.digital/your-claim/claim-details/claim-accident-sporting-authorise/?return=summarise&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-authorise/sporting-authorise">Change<span
                        class="govuk-visually-hidden"> Were you representing your Unit?</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Is your illness/condition related to</dt>
            <dd class="govuk-summary-list__value">
                                    Trade
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="https://modvets-dev2.london.cloudapps.digital/your-claim/claim-details/claim-accident-sporting-related/?return=summarise&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-related/sporting-related">Change<span
                        class="govuk-visually-hidden"> Is your illness/condition related to</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">What was the date of injury/incident?</dt>
            <dd class="govuk-summary-list__value">
                                    12 December 1212
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="https://modvets-dev2.london.cloudapps.digital/your-claim/claim-details/claim-accident-non-sporting-date/?return=summarise&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-non-sporting-date/date-of-injury-incident">Change<span
                        class="govuk-visually-hidden"> What was the date of injury/incident?</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Were you on duty at the time of incident?</dt>
            <dd class="govuk-summary-list__value">
                                    No
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/hospital/address/?return=summarise&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-non-sporting-duty/non-sporting-duty">Change<span
                        class="govuk-visually-hidden"> Were you on duty at the time of incident?</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Were you representing your Unit?</dt>
            <dd class="govuk-summary-list__value">
                                    No
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/witnesses/?return=summarise&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-witness/sporting-witnesses">Change<span
                        class="govuk-visually-hidden"> Were you representing your Unit?</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Did you receive first aid treatment at the time?</dt>
            <dd class="govuk-summary-list__value">
                                    No
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/first-aid/?return=summarise&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-first-aid/sporting-first-aid">Change<span
                        class="govuk-visually-hidden"> Did you receive first aid treatment at the time?</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Did you go to, or were you taken to, a hospital or medical facility?</dt>
            <dd class="govuk-summary-list__value">
                                    Yes
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/hospital/?return=summarise&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-hospital-facility/sporting-hospital-facility">Change<span
                        class="govuk-visually-hidden"> Did you go to, or were you taken to, a hospital or medical facility?</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Name of the Hospital (if known)</dt>
            <dd class="govuk-summary-list__value">
                                    pokpok
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/hospital/address/?return=summarise&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-hospital-address/claim-accident-sporting-hospital-address">Change<span
                        class="govuk-visually-hidden"> Name of the Hospital (if known)</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Building and street</dt>
            <dd class="govuk-summary-list__value">
                                    okpkpok
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/hospital/address/?return=summarise&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-hospital-address/claim-sporting-hospital-address__address-line-1">Change<span
                        class="govuk-visually-hidden"> Building and street</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Town or city</dt>
            <dd class="govuk-summary-list__value">
                                    okok
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/hospital/address/?return=summarise&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-hospital-address/claim-sporting-hospital-address__town">Change<span
                        class="govuk-visually-hidden"> Town or city</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">County</dt>
            <dd class="govuk-summary-list__value">
                                    okok
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/hospital/address/?return=summarise&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-hospital-address/claim-sporting-hospital-address__county">Change<span
                        class="govuk-visually-hidden"> County</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Country</dt>
            <dd class="govuk-summary-list__value">
                                    United Kingdom
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/hospital/address/?return=summarise&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-hospital-address/claim-sporting-hospital-address__country">Change<span
                        class="govuk-visually-hidden"> Country</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Postcode</dt>
            <dd class="govuk-summary-list__value">
                                    pkpkok
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/claims/specific/hospital/address/?return=summarise&amp;stack=1ec2bd9d-a819-66d8-92dd-eeee0aff6684#/claim-details/claim-accident-sporting-hospital-address/claim-sporting-hospital-address__postcode">Change<span
                        class="govuk-visually-hidden"> Postcode</span></a>
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
