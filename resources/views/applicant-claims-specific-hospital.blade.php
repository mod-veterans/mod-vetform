@php

if (!empty($_POST)) {


        if ($_POST['/claim-details/claim-accident-hospital-facility/sporting-hospital-facility'] == 'Yes') {



        header("Location: /applicant/claims/specific/hospital/address");
        die();

        } else {


        header("Location: /applicant/claims/specific/downgraded");
        die();

        }



}



@endphp




@include('framework.header')


    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Did you go to, or were you taken to, a hospital or medical facility?</h1>
                                <p class="govuk-body">For example, for treatment or assessment soon after the incident.  We will ask about further hospital treatment later.</p>
                                <p class="govuk-body">Please only tell us about treatment you received for the
                              injury/condition that you are claiming for</p>

            <form method="post" enctype="multipart/form-data" novalidate>
            @csrf
                                                    <div class="govuk-form-group ">
    <a id="/claim-details/claim-accident-hospital-facility/sporting-hospital-facility"></a>
    <fieldset class="govuk-fieldset">
                                    <legend
                    class="govuk-fieldset__legend govuk-fieldset__legend--m govuk-visually-hidden">
                    <h1 class
                    ="govuk-fieldset__heading">Did you go to, or were you taken to, a hospital or medical facility? (required)</h1>
                </legend>
                                            <div
            class="govuk-radios govuk-radios--inline"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-hospital-facility/sporting-hospital-facility-yes" name="/claim-details/claim-accident-hospital-facility/sporting-hospital-facility" type="radio"
           value="Yes"  checked            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-hospital-facility/sporting-hospital-facility-yes">Yes</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-hospital-facility/sporting-hospital-facility-no" name="/claim-details/claim-accident-hospital-facility/sporting-hospital-facility" type="radio"
           value="No"            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-hospital-facility/sporting-hospital-facility-no">No</label>
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
