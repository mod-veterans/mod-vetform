@php

if (!empty($_POST)) {


        header("Location: /applicant/claims/specific/non-pt/rta");
        die();

}

$page_title = 'What were you doing at the time the incident occurred? (required)';


@endphp




@include('framework.header')


    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">

                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group ">
    <fieldset class="govuk-fieldset">
                                    <legend
                    class="govuk-fieldset__legend govuk-fieldset__legend--m govuk-visually-hidden">
                    <h1 class="govuk-fieldset__heading">What were you doing at the time the incident occurred? (required)</h1>
                </legend>
                                            <div
            class="govuk-radios"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-activity/non-sporting-activity-operations-duties-overseas" name="/claim-details/claim-accident-non-sporting-activity/non-sporting-activity" type="radio"
           value="Operations Duties overseas"            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-activity/non-sporting-activity-operations-duties-overseas">Operations Duties overseas</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-activity/non-sporting-activity-operations-duties-u-k" name="/claim-details/claim-accident-non-sporting-activity/non-sporting-activity" type="radio"
           value="Operations Duties UK"            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-activity/non-sporting-activity-operations-duties-u-k">Operations Duties UK</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-activity/non-sporting-activity-home-base-duties" name="/claim-details/claim-accident-non-sporting-activity/non-sporting-activity" type="radio"
           value="Home base duties"            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-activity/non-sporting-activity-home-base-duties">Home base duties</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-activity/non-sporting-activity-training-excercise" name="/claim-details/claim-accident-non-sporting-activity/non-sporting-activity" type="radio"
           value="Training Excercise"            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-activity/non-sporting-activity-training-excercise">Training Excercise</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-activity/non-sporting-activity-travelling" name="/claim-details/claim-accident-non-sporting-activity/non-sporting-activity" type="radio"
           value="Travelling"            >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-activity/non-sporting-activity-travelling">Travelling</label>
</div>

                    </div>
    </fieldset>
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
