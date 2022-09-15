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

$page_title = 'Check your answers';

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
                <a class="govuk-link" href="/applicant/nominate-a-representative/?return=/applicant/nominate-a-representative-no-check-answers&stack=#/representative/representative-selection/nominated-representative">Change<span
                        class="govuk-visually-hidden"> Would you like to nominate a representative?</span></a>
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
