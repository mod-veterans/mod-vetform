@php


if (!empty($_POST)) {


    switch ($_POST['/applicant/applicant-selection/nominated-applicant']) {

        case "The person named on this claim is making the application.":

            header("Location: /applicant/check-answers");
            die();

        break;


        case "I am making an application for someone else and I have legal authority to act on their behalf.":

            header("Location: /applicant/legal-authority");
            die();

        break;


        case "I am helping someone else make this application.":

            header("Location: /applicant/helper/name");
            die();

        break;

    }

}

@endphp




@include('framework.header')

        @include('framework.backbutton')





    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Who is making this application?</h1>
                                <p class="govuk-body">The person named in this application should be the person who completes the declaration and
                          final submission when all sections are completed.</p>
                       <p class="govuk-body">A claim may only be submitted on behalf of someone else if you have a Power of Attorney
                          or other legal authority to act on their behalf.</p>

            <form method="post" enctype="multipart/form-data" novalidate>
            @csrf
                                                    <div class="govuk-form-group ">
    <a id="/applicant/"></a>
    <fieldset class="govuk-fieldset">
                                    <legend
                    class="govuk-fieldset__legend govuk-fieldset__legend--m govuk-visually-hidden">
                    <h1 class
                    ="govuk-fieldset__heading">Who is making this application? (required)</h1>
                </legend>
                                            <div
            class="govuk-radios govuk-radios--inline"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/applicant/applicant-selection/nominated-applicant-the-person-named-on-this-claim-is-making-the-application." name="/applicant/applicant-selection/nominated-applicant" type="radio"
           value="The person named on this claim is making the application."            >
    <label class="govuk-label govuk-radios__label" for="/applicant/applicant-selection/nominated-applicant-the-person-named-on-this-claim-is-making-the-application.">I am making this application for myself.</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/applicant/applicant-selection/nominated-applicant-i-am-making-an-application-on-behalf-of-the-person-named-claim-on-this-and-i-have-legal-authority-to-act-on-their-behalf." name="/applicant/applicant-selection/nominated-applicant" type="radio"
           value="I am making an application for someone else and I have legal authority to act on their behalf."            >
    <label class="govuk-label govuk-radios__label" for="/applicant/applicant-selection/nominated-applicant-i-am-making-an-application-on-behalf-of-the-person-named-claim-on-this-and-i-have-legal-authority-to-act-on-their-behalf.">I am making an application for someone else and I have legal authority to act on their behalf.</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/applicant/applicant-selection/nominated-applicant-i-am-helping-someone-else-make-this-application." name="/applicant/applicant-selection/nominated-applicant" type="radio"
           value="I am helping someone else make this application."            >
    <label class="govuk-label govuk-radios__label" for="/applicant/applicant-selection/nominated-applicant-i-am-helping-someone-else-make-this-application.">I am helping someone else make this application.</label>
</div>



                    </div>
    </fieldset>
</div>



                <div class="govuk-form-group">
    <button class="govuk-button govuk-!-margin-right-2" data-module="govuk-button">Save and continue</button>
            <br><a href="https://modvets.web.poweredbyreason.co.uk/cancel" class="govuk-link"
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
