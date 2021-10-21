@php

if (!empty($_POST)) {


            header("Location: /applicant/claims/non-specific/medical-practitioner");
            die();

}



@endphp




@include('framework.header')


    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">What medical condition(s) are you claiming for?</h1>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="/claim-details/claim-illness-condition/claim-illness-claiming-for">
        <span class="govuk-visually-hidden">Medical condition claiming</span>
    </label>
    <div id="/claim-details/claim-illness-condition/claim-illness-claiming-for-hint" class="govuk-hint">You can claim for any medical condition you think is related to your service.  If you have a specific diagnosis, please include it here, for example, deafness, osteoarthritis.</div>

    <div id="/claim-details/claim-illness-condition/claim-illness-claiming-for-hint" class="govuk-hint">Tell us which side of the body is affected if needed, for example, deafness left ear.</div>
<textarea class="govuk-textarea govuk-js-character-count" id="/claim-details/claim-accident-sporting-medical-condition/claim-accident-sporting-medical-condition"
                  name="/claim-details/claim-accident-sporting-medical-condition/claim-accident-sporting-medical-condition" rows="5"
                                    aria-describedby="with-hint-info /claim-details/claim-illness-condition/claim-illness-claiming-for-hint"></textarea>
  <div id="with-hint-info" class="govuk-hint govuk-character-count__message" aria-live="polite">
    You can enter up to 500 characters
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
