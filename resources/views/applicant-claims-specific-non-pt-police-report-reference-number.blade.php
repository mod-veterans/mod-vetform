@php

if (!empty($_POST)) {


        header("Location: /applicant/claims/specific/non-pt/authorised-leave");
        die();

}



@endphp




@include('framework.header')


    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Please tell us the Police reference number (if known)</h1>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="/claim-details/claim-accident-police-ref/claim-accident-non-sporting-police-ref">
        Civilian - case ref
    </label>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/claim-details/claim-accident-police-ref/claim-accident-non-sporting-police-ref" name="/claim-details/claim-accident-police-ref/claim-accident-non-sporting-police-ref" type="text"
                   value=""
            >
</div>
                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="/claim-details/claim-accident-police-ref/claim-accident-non-sporting-military-ref">
        Military - case ref
    </label>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/claim-details/claim-accident-police-ref/claim-accident-non-sporting-military-ref" name="/claim-details/claim-accident-police-ref/claim-accident-non-sporting-military-ref" type="text"
                   value=""
            >
</div>
                                    <div class="govuk-checkboxes__item">
            <input id="61667bb647352--default" name="/claim-details/claim-accident-police-ref/claim-accident-non-sporting-ref-unknown" type="hidden" value="No">
        <input class="govuk-checkboxes__input" id="61667bb647352" name="/claim-details/claim-accident-police-ref/claim-accident-non-sporting-ref-unknown" type="checkbox"
           value="Yes"            >
    <label class="govuk-label govuk-checkboxes__label" for="61667bb647352">I don&#039;t know</label>
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
