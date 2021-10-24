@php


if (!empty($_POST)) {

    if (!empty($_POST['afcs/about-you/personal-details/previous-claim/previous-claim'])) {

        if ($_POST['afcs/about-you/personal-details/previous-claim/previous-claim'] == 'Yes') {
        header("Location: /applicant/about-you/previous-claim/claim-number");
        die();

        } else {
        header("Location: /applicant/about-you/epaw-reference");
        die();

        }

    } else {

        header("Location: /applicant/about-you/epaw-reference");
        die();

    }

}

@endphp




@include('framework.header')


    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Have you made a war pension or armed forces compensation scheme claim before?</h1>
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
           value="Yes"            >
    <label class="govuk-label govuk-radios__label" for="afcs/about-you/personal-details/previous-claim/previous-claim-yes">Yes</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="afcs/about-you/personal-details/previous-claim/previous-claim-no" name="afcs/about-you/personal-details/previous-claim/previous-claim" type="radio"
           value="No"            >
    <label class="govuk-label govuk-radios__label" for="afcs/about-you/personal-details/previous-claim/previous-claim-no">No</label>
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
