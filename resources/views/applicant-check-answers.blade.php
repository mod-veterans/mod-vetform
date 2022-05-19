@include('framework.functions')
@php


    $userID = $_SESSION['vets-user'];
    $data = getData($userID);


if (!empty($_POST)) {


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
                                    I am applying for myself
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant">Change<span
                        class="govuk-visually-hidden"> Who is making this application?</span></a>
            </dd>
        </div>


        @if(!empty($data['sections']['applicant-who']['apply-yourself']['epaw']['served']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Have you ever served in or supported the Special Forces?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['applicant-who']['apply-yourself']['epaw']['served']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/epaw/?return=/applicant/check-answers">Change<span
                        class="govuk-visually-hidden"> PExpress Prior Authority in Writing (EPAW) reference</span></a>
            </dd>
        </div>
        @endif
         @if(!empty($data['sections']['applicant-who']['apply-yourself']['epaw']['epaw-reference']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">EPAW reference number</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['applicant-who']['apply-yourself']['epaw']['epaw-reference']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/epaw?return=/applicant/check-answers">Change<span
                        class="govuk-visually-hidden">EPAW reference number</span></a>
            </dd>
        </div>
        @endif





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
