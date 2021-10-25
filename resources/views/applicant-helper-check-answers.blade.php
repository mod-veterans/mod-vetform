@include('framework.functions')
@php

if (!empty($_POST)) {
    $userID = $_SESSION['vets-user'];
    $data = getData($userID);

    $data['sections']['applicant-who']['completed'] = TRUE;

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
                                <h2 class="govuk-heading-m">Who is making this application?</h2>
        <dl class="govuk-summary-list govuk-!-margin-bottom-9">
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Who is making this application?</dt>
            <dd class="govuk-summary-list__value">
                                    I am helping someone else make this application.
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/?return=summarise&amp;stack=#/applicant/applicant-selection/nominated-applicant">Change<span
                        class="govuk-visually-hidden"> Who is making this application?</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Name of assistant making this claim</dt>
            <dd class="govuk-summary-list__value">
                                    okok
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/helper/name/?return=summarise&amp;stack=#/applicant/helper-details/helper-name">Change<span
                        class="govuk-visually-hidden"> Name of assistant making this claim</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Relationship to claimant</dt>
            <dd class="govuk-summary-list__value">
                                    Friend
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/helper/relationiship/?return=summarise&amp;stack=#/applicant/helper-relationship/helper-relationship">Change<span
                        class="govuk-visually-hidden"> Relationship to claimant</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Assisted claim declaration understood</dt>
            <dd class="govuk-summary-list__value">
                                    Yes
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/helper/declaration/?return=summarise&amp;stack=#/applicant/helper-declaration/helper-declaration-agreed">Change<span
                        class="govuk-visually-hidden"> I confirm I have read and understood the above requirements.</span></a>
            </dd>
        </div>
    </dl>
<br />

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
