@php

if (!empty($_POST)) {


        header("Location: /applicant/other-details/other-medical-treatment/condition");
        die();

}



@endphp




@include('framework.header')



    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">What treatment did you receive?</h1>
                                <p class="govuk-body">e.g. Surgery, specialist consultation,tests, physiotherapy</p>

            <form method="post" enctype="multipart/form-data" novalidate>
            @csrf
                                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="/other-medical-treatment-type/other-medical-treatment-type">
        <span class="govuk-visually-hidden">What type of medical treatment did you receive?</span>
    </label>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/other-medical-treatment-type/other-medical-treatment-type" name="/other-medical-treatment-type/other-medical-treatment-type" type="text"
                   value=""
            >
</div>



                <div class="govuk-form-group">
   <button class="govuk-button govuk-!-margin-right-2" data-module="govuk-button">Save and continue</button>
@include('framework.bottombuttons')

    </div>
            </form>
            </div>
        </div>
    </main>
</div>



@include('framework.footer')
