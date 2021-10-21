@php


if (!empty($_POST)) {



            header("Location: /applicant/legal-authority/authority-detail");
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
                                    No
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/nominate-a-representative/?stack=#/representative/representative-selection/nominated-representative">Change<span
                        class="govuk-visually-hidden"> Would you like to nominate a representative?</span></a>
            </dd>
        </div>
    </dl>
                    <a href="/tasklist" class="govuk-button" data-module="govuk-button">Continue</a>
            </div>
        </div>
    </main>
</div>



@include('framework.footer')
