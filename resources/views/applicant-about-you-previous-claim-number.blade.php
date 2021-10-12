@php


if (!empty($_POST)) {



    header("Location: /applicant/about-you/save-return");
    die();


}

@endphp




@include('framework.header')



    <a href="#" onclick="window.history.back()" class="govuk-back-link">Back</a>

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">What was the claim reference number (if known)?</h1>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="afcs/about-you/personal-details/previous-claim-reference/previous-claim-reference">
        <span class="govuk-visually-hidden">Previous claim reference number</span>
    </label>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="afcs/about-you/personal-details/previous-claim-reference/previous-claim-reference" name="afcs/about-you/personal-details/previous-claim-reference/previous-claim-reference" type="text"
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
