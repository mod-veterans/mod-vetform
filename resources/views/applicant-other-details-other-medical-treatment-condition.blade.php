@php

if (!empty($_POST)) {


        header("Location: /applicant/other-details/other-medical-treatment/treatment-start");
        die();

}



@endphp




@include('framework.header')


    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">What condition(s) did you receive treatment for?</h1>
                                <p class="govuk-body">Remember you only need to tell us about the conditions you are claiming for.</p>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="/other-medical-treatment-condition/other-medical-treatment-condition">
        Condition treated
    </label>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/other-medical-treatment-condition/other-medical-treatment-condition" name="/other-medical-treatment-condition/other-medical-treatment-condition" type="text"
                   value=""
            >
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
