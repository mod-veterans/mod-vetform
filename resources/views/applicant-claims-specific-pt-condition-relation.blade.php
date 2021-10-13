@php

if (!empty($_POST)) {


        header("Location: /applicant/claims/specific/witnesses");
        die();

}



@endphp




@include('framework.header')



    <a href="#" onclick="window.history.back()" class="govuk-back-link">Back</a>

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Is your illness/condition related to</h1>
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
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-sporting-related/sporting-related-duties--operations-overseas">Duties - Operations overseas</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-sporting-related/sporting-related-duties--operations-u-k" name="/claim-details/claim-accident-sporting-related/sporting-related" type="radio"
           value="Duties - Operations UK"  checked            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-sporting-related/sporting-related-duties--operations-u-k">Duties - Operations UK</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-sporting-related/sporting-related-trade" name="/claim-details/claim-accident-sporting-related/sporting-related" type="radio"
           value="Trade"            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-sporting-related/sporting-related-trade">Trade</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-sporting-related/sporting-related-misconduct-by-others" name="/claim-details/claim-accident-sporting-related/sporting-related" type="radio"
           value="Misconduct by others"            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-sporting-related/sporting-related-misconduct-by-others">Misconduct by others</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-sporting-related/sporting-related-consequential-to-another-medical-condition" name="/claim-details/claim-accident-sporting-related/sporting-related" type="radio"
           value="Consequential to another medical condition"            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-sporting-related/sporting-related-consequential-to-another-medical-condition">Consequential to another medical condition</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-sporting-related/sporting-related-fitness-training" name="/claim-details/claim-accident-sporting-related/sporting-related" type="radio"
           value="Fitness training"            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-sporting-related/sporting-related-fitness-training">Fitness training</label>
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
