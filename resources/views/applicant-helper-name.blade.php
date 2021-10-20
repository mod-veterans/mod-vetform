@php


if (!empty($_POST)) {

header("Location: /applicant/helper/relationship");
die();

}

@endphp




@include('framework.header')


    <a href="#" onclick="window.history.back()" class="govuk-back-link">Back</a>

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">What is your name?</h1>
                                <p class="govuk-body">Name of the person providing help</p>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="/applicant/helper-details/helper-name">
        <span class="govuk-visually-hidden">Name of assistant making this claim</span>
    </label>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/applicant/helper-details/helper-name" name="/applicant/helper-details/helper-name" type="text"
         autocomplete="name"
                  value=""
            >
</div>



                <div class="govuk-form-group">   <button class="govuk-button govuk-!-margin-right-2" data-module="govuk-button">Save and continue</button>
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
