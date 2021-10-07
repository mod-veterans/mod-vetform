@php


if (!empty($_POST)) {

header("Location: /applicant/helper/declaration");
die();

}

@endphp




@include('framework.header')



    <a href="#" onclick="window.history.back()" class="govuk-back-link">Back</a>

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">What is your relationship to the person making the claim?</h1>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group ">
    <a id="/applicant/helper-relationship/helper-relationship"></a>
    <fieldset class="govuk-fieldset">
                                    <legend
                    class="govuk-fieldset__legend govuk-fieldset__legend--m govuk-visually-hidden">
                    <h1 class
                    ="govuk-fieldset__heading">Relationship to claimant (required)</h1>
                </legend>
                                            <div
            class="govuk-radios"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/applicant/helper-relationship/helper-relationship-friend" name="/applicant/helper-relationship/helper-relationship" type="radio"
           value="Friend"            >
    <label class="govuk-label govuk-radios__label" for="/applicant/helper-relationship/helper-relationship-friend">Friend</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/applicant/helper-relationship/helper-relationship-relative" name="/applicant/helper-relationship/helper-relationship" type="radio"
           value="Relative"  checked            >
    <label class="govuk-label govuk-radios__label" for="/applicant/helper-relationship/helper-relationship-relative">Relative</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/applicant/helper-relationship/helper-relationship-veterans-welfare-service-manager" name="/applicant/helper-relationship/helper-relationship" type="radio"
           value="Veterans Welfare Service Manager"            >
    <label class="govuk-label govuk-radios__label" for="/applicant/helper-relationship/helper-relationship-veterans-welfare-service-manager">Veterans Welfare Service Manager</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/applicant/helper-relationship/helper-relationship-charity-employee" name="/applicant/helper-relationship/helper-relationship" type="radio"
           value="Charity employee"            >
    <label class="govuk-label govuk-radios__label" for="/applicant/helper-relationship/helper-relationship-charity-employee">Charity employee</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/applicant/helper-relationship/helper-relationship-local-authority-employee" name="/applicant/helper-relationship/helper-relationship" type="radio"
           value="Local Authority employee"            >
    <label class="govuk-label govuk-radios__label" for="/applicant/helper-relationship/helper-relationship-local-authority-employee">Local Authority employee</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/applicant/helper-relationship/helper-relationship-other" name="/applicant/helper-relationship/helper-relationship" type="radio"
           value="Other"            >
    <label class="govuk-label govuk-radios__label" for="/applicant/helper-relationship/helper-relationship-other">Other</label>
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
