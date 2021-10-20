@php

if (!empty($_POST)) {


    if ($_POST['/claim-details/claim-illness/claim-illness'] == 'A condition, injury or illness that is the result of a specific accident or incident') {

        header("Location: /applicant/claims/specific");
        die();

    } else {

        header("Location: /applicant/claims/non-specific");
        die();
    }

}



@endphp




@include('framework.header')

    <a href="#" onclick="window.history.back()" class="govuk-back-link">Back</a>

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">What type of medical condition, injury or illness you are claiming for?</h1>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group ">
    <a id="/claim-details/claim-illness/claim-illness"></a>
    <fieldset class="govuk-fieldset">
                                    <legend
                    class="govuk-fieldset__legend govuk-fieldset__legend--m govuk-visually-hidden">
                    <h1 class
                    ="govuk-fieldset__heading">Type of medical condition (required)</h1>
                </legend>
                            <div id="/claim-details/claim-illness/claim-illness-hint" class="govuk-hint">Select the option that applies to your claim</div>
                <div
            class="govuk-radios govuk-radios--inline"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-illness/claim-illness-a-condition,-injury-or-illness-that-is-the-result-of-a-specific-accident-or-incident" name="/claim-details/claim-illness/claim-illness" type="radio"
           value="A condition, injury or illness that is the result of a specific accident or incident"            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-illness/claim-illness-a-condition,-injury-or-illness-that-is-the-result-of-a-specific-accident-or-incident">A condition, injury or illness that is the result of a specific accident or incident.  Includes mental health conditions related to a specific incident and conditions that developed later, for example arthritis.</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-illness/claim-illness-a-condition,-injury-or-illness-that-started-over-a-period-of-time-and-is-not-related-to-a-specific-incident-or-accident" name="/claim-details/claim-illness/claim-illness" type="radio"
           value="A condition, injury or illness that started over a period of time and is not related to a specific incident or accident"            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-illness/claim-illness-a-condition,-injury-or-illness-that-started-over-a-period-of-time-and-is-not-related-to-a-specific-incident-or-accident">A condition, injury or illness that started over a period of time and is not related to a specific incident or accident.  Includes mental health and other conditions that developed over time.</label>
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
