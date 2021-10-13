@php

if (!empty($_POST)) {


            header("Location: /applicant/claims/non-specific/medical-practitioner");
            die();

}



@endphp




@include('framework.header')


    <a href="#" onclick="window.history.back()" class="govuk-back-link">Back</a>

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">What medical condition are you claiming for?</h1>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="/claim-details/claim-illness-condition/claim-illness-claiming-for">
        <span class="govuk-visually-hidden">Medical condition claiming</span>
    </label>
    <div id="/claim-details/claim-illness-condition/claim-illness-claiming-for-hint" class="govuk-hint">Where you have a specific medical diagnosis, please include this here</div>
        <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/claim-details/claim-illness-condition/claim-illness-claiming-for" name="/claim-details/claim-illness-condition/claim-illness-claiming-for" type="text"
                   value="okok"
                aria-describedby="/claim-details/claim-illness-condition/claim-illness-claiming-for-hint"
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
