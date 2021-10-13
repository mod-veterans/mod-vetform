@php

if (!empty($_POST)) {


        header("Location: /applicant/claims/specific/non-pt/rta/journey-start");
        die();


}



@endphp




@include('framework.header')

     <a href="#" onclick="window.history.back()" class="govuk-back-link">Back</a>

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">What was the reason for your journey?</h1>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group ">
    <a id="/claim-details/claim-accident-non-sporting-journey-reason/non-sporting-journey-reason"></a>
    <fieldset class="govuk-fieldset">
                                    <legend
                    class="govuk-fieldset__legend govuk-fieldset__legend--m govuk-visually-hidden">
                    <h1 class
                    ="govuk-fieldset__heading">What was the reason for your journey? (required)</h1>
                </legend>
                                            <div
            class="govuk-radios"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-journey-reason/non-sporting-journey-reason-duties--operations" name="/claim-details/claim-accident-non-sporting-journey-reason/non-sporting-journey-reason" type="radio"
           value="Duties - Operations"            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-journey-reason/non-sporting-journey-reason-duties--operations">Duties - Operations</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-journey-reason/non-sporting-journey-reason-duties--trade" name="/claim-details/claim-accident-non-sporting-journey-reason/non-sporting-journey-reason" type="radio"
           value="Duties - Trade"            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-journey-reason/non-sporting-journey-reason-duties--trade">Duties - Trade</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-journey-reason/non-sporting-journey-reason-duties--training" name="/claim-details/claim-accident-non-sporting-journey-reason/non-sporting-journey-reason" type="radio"
           value="Duties - Training"            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-journey-reason/non-sporting-journey-reason-duties--training">Duties - Training</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-journey-reason/non-sporting-journey-reason-personal(non-duty/off-duty)" name="/claim-details/claim-accident-non-sporting-journey-reason/non-sporting-journey-reason" type="radio"
           value="Personal (non-duty/off-duty)"            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-journey-reason/non-sporting-journey-reason-personal(non-duty/off-duty)">Personal (non-duty/off-duty)</label>
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
