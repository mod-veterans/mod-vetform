@php


if (!empty($_POST)) {

header("Location: /applicant/about-you/previous-claim");
die();

}

@endphp




@include('framework.header')


    <a href="#" onclick="window.history.back()" class="govuk-back-link">Back</a>

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Which armed forces pension scheme(s) are you a member of?</h1>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group">
    <fieldset class="govuk-fieldset" aria-describedby="contact-hint">
                <legend class="govuk-fieldset__legend govuk-fieldset__legend--m">
            <h1 class="govuk-fieldset__heading">Pension scheme (required)</h1>
        </legend>
                <div id="-hint" class="govuk-hint">Select all that apply.</div>
                <div class="govuk-checkboxes" data-module="govuk-checkboxes">
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="615fda2278b0d" name="afcs/about-you/personal-details/pension-scheme/pension-scheme[]" type="checkbox"
           value="1975"            >
    <label class="govuk-label govuk-checkboxes__label" for="615fda2278b0d">1975</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="615fda2278fc5" name="afcs/about-you/personal-details/pension-scheme/pension-scheme[]" type="checkbox"
           value="2005"            >
    <label class="govuk-label govuk-checkboxes__label" for="615fda2278fc5">2005</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="615fda22790fa" name="afcs/about-you/personal-details/pension-scheme/pension-scheme[]" type="checkbox"
           value="2015"            >
    <label class="govuk-label govuk-checkboxes__label" for="615fda22790fa">2015</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="615fda22791f4" name="afcs/about-you/personal-details/pension-scheme/pension-scheme[]" type="checkbox"
           value="None"            >
    <label class="govuk-label govuk-checkboxes__label" for="615fda22791f4">None</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="615fda227931d" name="afcs/about-you/personal-details/pension-scheme/pension-scheme[]" type="checkbox"
           value="Other"            >
    <label class="govuk-label govuk-checkboxes__label" for="615fda227931d">Other</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="615fda2279456" name="afcs/about-you/personal-details/pension-scheme/pension-scheme[]" type="checkbox"
           value="Don&#039;t Know"            >
    <label class="govuk-label govuk-checkboxes__label" for="615fda2279456">Don&#039;t Know</label>
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
