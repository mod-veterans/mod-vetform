@php


@endphp




@include('framework.header')


    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Uploading supporting documents</h1>
                                <dl class="govuk-summary-list">
                                    <div class="govuk-summary-list__row">
                        <dt class="govuk-summary-list__value">
                                                                                                JPG_1415116658.JPG
                                                                                    </dt>
                        <dd class="govuk-summary-list__actions">
                            <a class="govuk-link govuk-warning govuk-!-margin-right-5"
                               href="https://modvets-dev2.london.cloudapps.digital/stack/drop?stack=%2Fdocuments&amp;id=1ec2c087-e7a2-69ac-b355-eeee0aff6684">Delete<span
                                    class="govuk-visually-hidden"> name</span>
                            </a>
                            <a class="govuk-link"
                               href="https://modvets-dev2.london.cloudapps.digital/supporting-documents/documents?stack=1ec2c087-e7a2-69ac-b355-eeee0aff6684">
                                Change<span class="govuk-visually-hidden"> name</span>
                            </a>
                        </dd>
                    </div>
                            </dl>

                <div class="govuk-form-group govuk-!-margin-top-4">
            <a class="govuk-button" href="/applicant/supporting-documents/upload">
                Upload another document
            </a>
            <br>
            Or
            <br />
            <br />
            <a class="govuk-button" href="/applicant/supporting-documents/comments">Save and continue</a>
        </div>
            </div>
        </div>
    </main>
</div>




@include('framework.footer')
