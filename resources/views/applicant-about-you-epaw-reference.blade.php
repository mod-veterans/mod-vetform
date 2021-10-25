@php


if (!empty($_POST)) {


    header("Location: /applicant/about-you/save-return");
    die();


}

@endphp




@include('framework.header')


    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Do you have an Express Prior Authority in Writing (EPAW) reference?</h1>
                                <p class="govuk-body">This is a requirement for those who are serving in or who have served in UK Special Forces, including in a support role.</p>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group ">
    <a id="afcs/about-you/personal-details/previous-claim/previous-claim"></a>
    <fieldset class="govuk-fieldset">
                                    <legend
                    class="govuk-fieldset__legend govuk-fieldset__legend--m govuk-visually-hidden">
                    <h1 class
                    ="govuk-fieldset__heading">Previously made a claim (required)</h1>
                </legend>
                                            <div
            class="govuk-radios govuk-radios--inline"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="afcs/about-you/personal-details/previous-claim/previous-claim-yes" name="afcs/about-you/personal-details/previous-claim/previous-claim" type="radio"
           value="No – I do not have an EPAW reference number."            >
    <label class="govuk-label govuk-radios__label" for="afcs/about-you/personal-details/previous-claim/previous-claim-yes">No – I do not have an EPAW reference number.</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="afcs/about-you/personal-details/previous-claim/previous-claim-no" name="afcs/about-you/personal-details/previous-claim/previous-claim" type="radio"
           value="Yes - I do have (or have requested) an EPAW reference number."            >
    <label class="govuk-label govuk-radios__label" for="afcs/about-you/personal-details/previous-claim/previous-claim-no">Yes - I do have (or have requested) an EPAW reference number.</label>
</div>





                    </div>
    </fieldset>
<br />
  <div class="govuk-form-group">
    <label class="govuk-label" for="afcs/about-you/personal-details/epaw-reference">
        EPAW Reference (if received)
    </label>
        <input
        class="govuk-input govuk-!-width-two-thirds "
        id="afcs/about-you/personal-details/epaw-reference" name="afcs/about-you/personal-details/epaw-reference" type="text"
                      value=""
                aria-describedby="afcs/about-you/personal-details/epaw-reference"
            >

</div>


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
