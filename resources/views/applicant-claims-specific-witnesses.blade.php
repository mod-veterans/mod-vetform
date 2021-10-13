@php

if (!empty($_POST)) {


        header("Location: /applicant/claims/specific/first-aid");
        die();

}



@endphp




@include('framework.header')


    <a href="#" onclick="window.history.back()" class="govuk-back-link">Back</a>

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Were there any witnesses?</h1>
                                <form method="post" enctype="multipart/form-data" novalidate >
                                @csrf
                                                    <div class="govuk-form-group ">
    <a id="/claim-details/claim-accident-witness/sporting-witnesses"></a>
    <fieldset class="govuk-fieldset">
                                    <legend
                    class="govuk-fieldset__legend govuk-fieldset__legend--m govuk-visually-hidden">
                    <h1 class
                    ="govuk-fieldset__heading">Were you representing your Unit? (required)</h1>
                </legend>
                                            <div
            class="govuk-radios govuk-radios--inline"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-witness/sporting-witnesses-yes" name="/claim-details/claim-accident-witness/sporting-witnesses" type="radio"
           value="Yes"  checked            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-witness/sporting-witnesses-yes">Yes</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-witness/sporting-witnesses-no" name="/claim-details/claim-accident-witness/sporting-witnesses" type="radio"
           value="No"            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-witness/sporting-witnesses-no">No</label>
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
