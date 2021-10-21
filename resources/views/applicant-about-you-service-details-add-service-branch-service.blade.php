@php

if (!empty($_POST)) {


    header("Location: /applicant/about-you/service-details/add-service/service-type ");
    die();


}



@endphp




@include('framework.header')




    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">What was/is your service branch?</h1>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group ">
    <a id="afcs/about-you/service-details/service-branch/service-branch"></a>
    <fieldset class="govuk-fieldset">
                                    <legend
                    class="govuk-fieldset__legend govuk-fieldset__legend--m govuk-visually-hidden">
                    <h1 class
                    ="govuk-fieldset__heading">Select your service branch (required)</h1>
                </legend>
                                            <div
            class="govuk-radios"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="afcs/about-you/service-details/service-branch/service-branch-royal-navy" name="afcs/about-you/service-details/service-branch/service-branch" type="radio"
           value="Royal Navy"            >
    <label class="govuk-label govuk-radios__label" for="afcs/about-you/service-details/service-branch/service-branch-royal-navy">Royal Navy</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="afcs/about-you/service-details/service-branch/service-branch-army" name="afcs/about-you/service-details/service-branch/service-branch" type="radio"
           value="Army"            >
    <label class="govuk-label govuk-radios__label" for="afcs/about-you/service-details/service-branch/service-branch-army">Army</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="afcs/about-you/service-details/service-branch/service-branch-royal-air-force" name="afcs/about-you/service-details/service-branch/service-branch" type="radio"
           value="Royal Air Force"  checked            >
    <label class="govuk-label govuk-radios__label" for="afcs/about-you/service-details/service-branch/service-branch-royal-air-force">Royal Air Force</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="afcs/about-you/service-details/service-branch/service-branch-royal-marines" name="afcs/about-you/service-details/service-branch/service-branch" type="radio"
           value="Royal Marines"            >
    <label class="govuk-label govuk-radios__label" for="afcs/about-you/service-details/service-branch/service-branch-royal-marines">Royal Marines</label>
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
