@php

if (!empty($_POST)) {



        header("Location: /applicant/other-details/other-compensation/payment");
        die();





}



@endphp




@include('framework.header')



    <a href="#" onclick="window.history.back()" class="govuk-back-link">Back</a>

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Who did you claim from?</h1>
                                <p class="govuk-body">Please include any reference numbers you have.</p>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-character-count" data-module="govuk-character-count" data-maxlength="500">
    <div class="govuk-form-group">

                <textarea class="govuk-textarea  govuk-js-character-count " id="/other-compensation/claim-outcome/claim-outcome-benefactor"
                  name="/other-compensation/claim-outcome/claim-outcome-benefactor" rows="5"
                                    aria-describedby="/other-compensation/claim-outcome/claim-outcome-benefactor-info "></textarea>
                    <div id="/other-compensation/claim-outcome/claim-outcome-benefactor-info" class="govuk-hint govuk-character-count__message" aria-live="polite">
                You can enter up to 500 characters
            </div>
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
