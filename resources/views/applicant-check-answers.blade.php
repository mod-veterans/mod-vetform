@php


@endphp




@include('framework.header')

    <a href="#" onclick="window.history.back()" class="govuk-back-link">Back</a>

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Check your answers</h1>
                                <h2 class="govuk-heading-m">Who is making this application?</h2>
        <dl class="govuk-summary-list govuk-!-margin-bottom-9">
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Who is making this application?</dt>
            <dd class="govuk-summary-list__value">
                                    The person named on this claim is making the application.
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant">Change<span
                        class="govuk-visually-hidden"> Who is making this application?</span></a>
            </dd>
        </div>
    </dl>
                    <a href="/tasklist" class="govuk-button" data-module="govuk-button">Continue</a>
            </div>
        </div>
    </main>
</div>

@include('framework.footer')
