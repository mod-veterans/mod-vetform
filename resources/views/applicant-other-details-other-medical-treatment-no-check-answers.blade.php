@include('framework.functions')
@php

if (!empty($_POST)) {
    $userID = $_SESSION['vets-user'];
    $data = getData($userID);

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
            <dt class="govuk-summary-list__key">Have you had any further hospital or medical treatment?</dt>
            <dd class="govuk-summary-list__value">
                                    No
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/other-details/other-medical-treatment/?return=/applicant/other-details/other-medical-treatment/no-check-answers&amp;stack=#/treatment-status/treatment-status">Change<span
                        class="govuk-visually-hidden"> Have you had any further hospital or medical treatment?</span></a>
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
