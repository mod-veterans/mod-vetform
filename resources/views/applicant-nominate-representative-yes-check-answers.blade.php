@include('framework.functions')
@php

    $userID = $_SESSION['vets-user'];
    $data = getData($userID);


if (!empty($_POST)) {
    $userID = $_SESSION['vets-user'];
    $data = getData($userID);

    $data['sections']['nominate-representative']['completed'] = TRUE;

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
                                <h2 class="govuk-heading-m">Do you want to nominate a representative?</h2>
        <dl class="govuk-summary-list govuk-!-margin-bottom-9">
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Would you like to nominate a representative?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['nominate-representative']['nominate-representative']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/nominate-a-representative/?return=/applicant/nominate-a-representative-yes-check-answers&amp;stack=#/representative/representative-selection/nominated-representative">Change<span
                        class="govuk-visually-hidden"> Would you like to nominate a representative?</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Their full name</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['nominate-representative']['nominated representative']['fullname']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/nominate-a-representative-details/?return=/applicant/nominate-a-representative-yes-check-answers&amp;stack=#/representative/representative-address/representative-name">Change<span
                        class="govuk-visually-hidden"> Their full name</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Building and street</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['nominate-representative']['nominated representative']['address1']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/nominate-a-representative-details/?return=/applicant/nominate-a-representative-yes-check-answers&amp;stack=#/representative/representative-address/address-line-1">Change<span
                        class="govuk-visually-hidden"> Building and street</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Building and street line 2 of 2</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['nominate-representative']['nominated representative']['address2']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/nominate-a-representative-details/?return=/applicant/nominate-a-representative-yes-check-answers&amp;stack=#/representative/representative-address/address-line-2">Change<span
                        class="govuk-visually-hidden"> Building and street line 2 of 2</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Town or city</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['nominate-representative']['nominated representative']['town']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/nominate-a-representative-details/?return=/applicant/nominate-a-representative-yes-check-answers&amp;stack=#/representative/representative-address/town">Change<span
                        class="govuk-visually-hidden"> Town or city</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">County</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['nominate-representative']['nominated representative']['county']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/nominate-a-representative-details/?return=/applicant/nominate-a-representative-yes-check-answers&amp;stack=#/representative/representative-address/county">Change<span
                        class="govuk-visually-hidden"> County</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Country</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['nominate-representative']['nominated representative']['country']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/nominate-a-representative-details/?return=/applicant/nominate-a-representative-yes-check-answers&amp;stack=#/representative/representative-address/country">Change<span
                        class="govuk-visually-hidden"> Country</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Postcode</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['nominate-representative']['nominated representative']['postcode']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/nominate-a-representative-details/?return=/applicant/nominate-a-representative-yes-check-answers&amp;stack=#/representative/representative-address/postcode">Change<span
                        class="govuk-visually-hidden"> Postcode</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Telephone number</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['nominate-representative']['nominated representative']['nominee-number']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/nominate-a-representative-details/?return=/applicant/nominate-a-representative-yes-check-answers&amp;stack=#/representative/representative-address/representative-number">Change<span
                        class="govuk-visually-hidden"> Telephone number</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Email address</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['nominate-representative']['nominated representative']['email-address']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/nominate-a-representative-details/?return=/applicant/nominate-a-representative-yes-check-answers&amp;stack=#/representative/representative-address/representative-email-address">Change<span
                        class="govuk-visually-hidden"> Email address</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">What is your representative&#039;s role?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['nominate-representative']['nominated representative']['role']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/nominate-a-representative-role/?return=/applicant/nominate-a-representative-yes-check-answers&amp;stack=#/representative/representative-role/representative-role">Change<span
                        class="govuk-visually-hidden"> What is your representative&#039;s role?</span></a>
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
