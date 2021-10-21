@php

if (!empty($_POST)) {

        header("Location: /applicant/claims/specific/non-pt/police-report");
        die();
}



@endphp




@include('framework.header')



    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Were you on a direct route?</h1>
                                <p class="govuk-body">A direct route means you took a reasonable route from start to end considering traffic conditions and did not divert for other reasons, for example, visiting a friend.   </p>

            <form method="post" enctype="multipart/form-data" novalidate>
            @csrf
                                                    <div class="govuk-form-group ">
    <a id="/claim-details/claim-accident-non-sporting-direct-route/non-sporting-direct-route"></a>
    <fieldset class="govuk-fieldset">
                                    <legend
                    class="govuk-fieldset__legend govuk-fieldset__legend--m govuk-visually-hidden">
                    <h1 class
                    ="govuk-fieldset__heading">Were you on a direct route? (required)</h1>
                </legend>
                                            <div
            class="govuk-radios govuk-radios--inline"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-direct-route/non-sporting-direct-route-yes" name="/claim-details/claim-accident-non-sporting-direct-route/non-sporting-direct-route" type="radio"
           value="Yes"            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-direct-route/non-sporting-direct-route-yes">Yes</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-direct-route/non-sporting-direct-route-no" name="/claim-details/claim-accident-non-sporting-direct-route/non-sporting-direct-route" type="radio"
           value="No"            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-direct-route/non-sporting-direct-route-no">No</label>
</div>

                    </div>
    </fieldset>
</div>



                <div class="govuk-form-group">
   <button class="govuk-button govuk-!-margin-right-2" data-module="govuk-button">Save and continue</button>
            <br><a href="/cancel" class="govuk-link"
           data-module="govuk-button">
            Cancel application
        </a>

    </div>
            </form>
            </div>
        </div>
    </main>
</div>


@include('framework.footer')
