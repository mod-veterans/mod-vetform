@php

if (!empty($_POST)) {


        header("Location: /applicant/claims/specific/witnesses");
        die();

}



@endphp




@include('framework.header')



    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Where were you when the incident happened?</h1>
                                <p class="govuk-body">Tick all that apply</p>
                                <form method="post" enctype="multipart/form-data" novalidate >
                                @csrf
                                                    <div class="govuk-form-group ">
    <a id="/claim-details/claim-accident-sporting-related/sporting-related"></a>
    <fieldset class="govuk-fieldset">
                                    <legend
                    class="govuk-fieldset__legend govuk-fieldset__legend--m govuk-visually-hidden">
                    <h1 class
                    ="govuk-fieldset__heading">Is your illness/condition related to (required)</h1>
                </legend>
                                            <div
            class="govuk-radios"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-sporting-related/sporting-related-duties--operations-overseas" name="/claim-details/claim-accident-sporting-related/sporting-related" type="radio"
           value="Duties - Operations overseas"            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-sporting-related/sporting-related-duties--operations-overseas">An operations location overseas</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-sporting-related/sporting-related-duties--operations-u-k" name="/claim-details/claim-accident-sporting-related/sporting-related" type="radio"
           value="Duties - Operations UK"  checked            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-sporting-related/sporting-related-duties--operations-u-k">An operations location UK</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-sporting-related/sporting-related-trade" name="/claim-details/claim-accident-sporting-related/sporting-related" type="radio"
           value="Trade"            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-sporting-related/sporting-related-trade">My home base</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-sporting-related/sporting-related-misconduct-by-others" name="/claim-details/claim-accident-sporting-related/sporting-related" type="radio"
           value="Misconduct by others"            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-sporting-related/sporting-related-misconduct-by-others">A training location</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-sporting-related/sporting-related-consequential-to-another-medical-condition" name="/claim-details/claim-accident-sporting-related/sporting-related" type="radio"
           value="Consequential to another medical condition"            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-sporting-related/sporting-related-consequential-to-another-medical-condition">An off-duty location</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-sporting-related/sporting-related-fitness-training" name="/claim-details/claim-accident-sporting-related/sporting-related" type="radio"
           value="Fitness training"            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-sporting-related/sporting-related-fitness-training">Other</label>
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
