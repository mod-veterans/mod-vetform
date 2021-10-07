@php


if (!empty($_POST)) {



            header("Location: /applicant/legal-authority/check-answers");
            die();


}

@endphp




@include('framework.header')


    <a href="#" onclick="window.history.back()" class="govuk-back-link">Back</a>

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">What legal authority do you have to make a claim on behalf of the person named?</h1>
                                <p class="govuk-body">For example, Power of Attorney held.</p>
                        <p class="govuk-body">Please upload a copy of the legal authority document you hold in the
                         Upload Documents section later in this application.</p>

            <form method="post" enctype="multipart/form-data" novalidate>
            @csrf
                                                    <div class="govuk-character-count" data-module="govuk-character-count" data-maxlength="100">
    <div class="govuk-form-group">
        <label class="govuk-label" for="/applicant/nominee-details/nominee-details">
        <span class="govuk-visually-hidden">What legal authority do you have to make a claim on behalf of the person named?</span>
    </label>
                <textarea class="govuk-textarea  govuk-js-character-count " id="/applicant/nominee-details/nominee-details"
                  name="/applicant/nominee-details/nominee-details" rows="5"
                                    aria-describedby="/applicant/nominee-details/nominee-details-info "></textarea>
                    <div id="/applicant/nominee-details/nominee-details-info" class="govuk-hint govuk-character-count__message" aria-live="polite">
                You can enter up to 100 characters
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
