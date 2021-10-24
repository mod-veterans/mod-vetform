@php

if (!empty($_POST)) {


    if (!empty($_POST['/other-compensation/received-compensation/received-compensation'])) {

        if ($_POST['/other-compensation/received-compensation/received-compensation'] == 'Yes') {

            header("Location: /applicant/other-details/other-compensation/conditions");
            die();

        } else {

            header("Location: /applicant/other-details/other-compensation/no/check-answers");
            die();

        }



    } else {



    }




}



@endphp




@include('framework.header')



    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Are you claiming for or have you received compensation payments from other sources?</h1>
                                <p class="govuk-body">You only need to tell us about compensation for the medical conditions you are claiming for on this application.</p>
         <p class="govuk-body">Compensation includes any payments from MOD for criminal injuries or civil negligence payments received via the courts.  It includes compensation from civil authorities in Great Britain and Northern Ireland for criminal injuries or any other compensation payments received for the medical conditions you are claiming for.  You do not need to tell us about previous Armed Forces Compensation Scheme or War Pension payments.</p>

            <form method="post" enctype="multipart/form-data" novalidate>
            @csrf
                                                    <div class="govuk-form-group ">
    <a id="/other-compensation/received-compensation/received-compensation"></a>
    <fieldset class="govuk-fieldset">
                                    <legend
                    class="govuk-fieldset__legend govuk-fieldset__legend--m govuk-visually-hidden">
                    <h1 class
                    ="govuk-fieldset__heading">Are you claiming for or have you received compensation payments from other sources? (required)</h1>
                </legend>
                                            <div
            class="govuk-radios govuk-radios--inline"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/other-compensation/received-compensation/received-compensation-yes" name="/other-compensation/received-compensation/received-compensation" type="radio"
           value="Yes"            >
    <label class="govuk-label govuk-radios__label" for="/other-compensation/received-compensation/received-compensation-yes">Yes</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/other-compensation/received-compensation/received-compensation-no" name="/other-compensation/received-compensation/received-compensation" type="radio"
           value="No"            >
    <label class="govuk-label govuk-radios__label" for="/other-compensation/received-compensation/received-compensation-no">No</label>
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
