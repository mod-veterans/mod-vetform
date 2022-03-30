@include('framework.functions')
@php



    $userID = $_SESSION['vets-user'];
    $data = getData($userID);

if (!empty($_POST)) {


    $data['sections']['other-compensation']['completed'] = TRUE;

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
                                <h2 class="govuk-heading-m">Other compensation</h2>
        <dl class="govuk-summary-list govuk-!-margin-bottom-9">
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Claiming or have you received compensation payments from other sources?</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['other-compensation']['received-compensation'] ?? ''}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/other-details/other-compensation?return=/applicant/other-details/other-compensation/no/check-answers&amp;stack=#/other-compensation/received-compensation/received-compensation">Change<span
                        class="govuk-visually-hidden"> Claiming or have you received compensation payments from other sources?</span></a>
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
