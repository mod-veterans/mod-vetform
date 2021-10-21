@php

if (!empty($_POST)) {


        header("Location: /applicant/claims/specific/pt/armed-forces-organised");
        die();

}



@endphp




@include('framework.header')

    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">What was the activity?</h1>
                                <p class="govuk-body">(For example, skiing, football, diving)</p>

            <form method="post" enctype="multipart/form-data" novalidate>
            @csrf
                                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="/claim-details/claim-accident-sporting-activity/activity">
        <span class="govuk-visually-hidden">What was the activity?</span>
    </label>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/claim-details/claim-accident-sporting-activity/activity" name="/claim-details/claim-accident-sporting-activity/activity" type="text"
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
