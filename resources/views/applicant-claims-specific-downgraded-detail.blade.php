@php

if (!empty($_POST)) {

        header("Location: /applicant/claims/specific/why-related");
        die();

}



@endphp




@include('framework.header')


    <a href="#" onclick="window.history.back()" class="govuk-back-link">Back</a>

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">What medical categories were you downgraded from/to?</h1>
                                <p class="govuk-body">For example P1, light duties.  If you can’t remember, enter ‘don’t know’.</p>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                      <div class="govuk-form-group ">

                                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-practitioner">
        From medical category?
    </label>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-practitioner" name="/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-practitioner" type="text"
                   value="" >
</div>

                                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-practitioner">
        To medical category?
    </label>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-practitioner" name="/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-practitioner" type="text"
                   value="" >
</div>



        <br />
<div class="govuk-checkboxes__item">
            <input id="6166806a32c4a--default" name="/claim-details/claim-illness-date/date-of-condition-estimated" type="hidden" value="No">
        <input class="govuk-checkboxes__input" id="6166806a32c4a" name="/claim-details/claim-illness-date/date-of-condition-estimated" type="checkbox"
           value="Yes"            >
    <label class="govuk-label govuk-checkboxes__label" for="6166806a32c4a">I was downgraded and upgraded more than once within different categories.</label>
</div>

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
