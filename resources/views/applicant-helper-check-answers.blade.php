@include('framework.functions')
@php


    $userID = $_SESSION['vets-user'];
    $data = getData($userID);


if (!empty($_POST)) {
    $userID = $_SESSION['vets-user'];
    $data = getData($userID);

    $data['sections']['applicant-who']['completed'] = TRUE;

    storeData($userID,$data);

    header("Location: /tasklist");
    die();
}

$page_title = 'Check your answers';

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
                                    {{@$data['sections']['applicant-who']['who is making this application']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/?return=/applicant/helper/check-answers&amp;stack=#/applicant/applicant-selection/nominated-applicant">Change<span
                        class="govuk-visually-hidden"> Who is making this application?</span></a>
            </dd>
        </div>


        @if(!empty($data['sections']['applicant-who']['helper']['epaw']['served']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Have you ever served in or supported the Special Forces?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['applicant-who']['helper']['epaw']['served']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/helper/epaw/?return=/applicant/helper/check-answers">Change<span
                        class="govuk-visually-hidden">Have you ever served in or supported the Special Forces?</span></a>
            </dd>
        </div>
        @endif
         @if(!empty($data['sections']['applicant-who']['helper']['epaw']['epaw-reference-1']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">EPAW reference number</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['applicant-who']['helper']['epaw']['epaw-reference-1']}} - {{$data['sections']['applicant-who']['helper']['epaw']['epaw-reference-2']}} / {{$data['sections']['applicant-who']['helper']['epaw']['epaw-reference-3']}} / {{$data['sections']['applicant-who']['helper']['epaw']['epaw-reference-4']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/helper/epaw/?return=/applicant/helper/check-answers">Change<span
                        class="govuk-visually-hidden">EPAW reference number</span></a>
            </dd>
        </div>
        @endif

    @if(!empty($data['sections']['applicant-who']['helper']['name']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Name of assistant making this claim</dt>
            <dd class="govuk-summary-list__value">
                                    {{@$data['sections']['applicant-who']['helper']['name']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/helper/name/?return=/applicant/helper/check-answers&amp;stack=#/applicant/helper-details/helper-name">Change<span
                        class="govuk-visually-hidden"> Name of assistant making this claim</span></a>
            </dd>
        </div>
        @endif

    @if(!empty($data['sections']['applicant-who']['helper']['relationship']))

            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Relationship to claimant</dt>
            <dd class="govuk-summary-list__value">
                                    {{@$data['sections']['applicant-who']['helper']['relationship']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/helper/relationship/?return=/applicant/helper/check-answers&amp;stack=#/applicant/helper-relationship/helper-relationship">Change<span
                        class="govuk-visually-hidden"> Relationship to claimant</span></a>
            </dd>
        </div>
        @endif


    @if(!empty($data['sections']['applicant-who']['helper']['relationship-when']))

            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">When did the person you are helping first contact you?</dt>
            <dd class="govuk-summary-list__value">
                                    {{@$data['sections']['applicant-who']['helper']['relationship-when']['whendate'] }}
                                    {{@$data['sections']['applicant-who']['helper']['relationship-when']['dontknow']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/helper/relationship/when/?return=/applicant/helper/check-answers&amp;stack=#/date-contacted-day">Change<span
                        class="govuk-visually-hidden"> Relationship to claimant</span></a>
            </dd>
        </div>
        @endif






    @if(!empty($data['sections']['applicant-who']['helper']['declaration']))

            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Assisted claim declaration understood</dt>
            <dd class="govuk-summary-list__value">
                                    {{@$data['sections']['applicant-who']['helper']['declaration']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/helper/declaration/?return=/applicant/helper/check-answers&amp;stack=#/applicant/helper-declaration/helper-declaration-agreed">Change<span
                        class="govuk-visually-hidden"> I confirm I have read and understood the above requirements.</span></a>
            </dd>

        </div>
    @endif

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
