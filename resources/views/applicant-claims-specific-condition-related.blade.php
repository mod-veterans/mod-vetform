@php

if (!empty($_POST)) {

        header("Location: /applicant/claims/check-answers");
        die();

}



@endphp




@include('framework.header')

    <a href="#" onclick="window.history.back()" class="govuk-back-link">Back</a>

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Why is your condition related to your armed forces service?</h1>
                                <p class="govuk-body"> In your own words, tell us why you feel your claimed medical condition or injury is caused or made worse by your service in the armed forces. If your condition developed over time, tell us what activities you think were the cause.  Avoid including specific operational details.  You can also use this section to explain the impact the conditions have on you. If you want to think about your answer, you can use the ‘save and return later’ function.</p>
                                <p class="govuk-body">If you are claiming for a road traffic accident and you were not on a direct route between your starting point and destination, please tell us why here.</p>

    <p class="govuk-body"><strong>Reminder:</strong> If you have served or are serving (whether directly or in a support role) with the United
    Kingdom Special Forces (UKSF), you must seek advice from the MOD A Block Disclosure Cell BEFORE completing this
    section. The Disclosure Cell can be contacted by emailing <a href="mailto:MAB-Disclosures@mod.gov.uk">MAB-Disclosures@mod.gov.uk</a>.</p>

            <form method="post" enctype="multipart/form-data" novalidate >
            @csrf
                                                    <div class="govuk-form-group">
        <label class="govuk-label" for="/claim-details/claim-illness-note/claim-illness-note">
        <span class="govuk-visually-hidden">Why is your condition related to your armed forces service?</span>
    </label>
                <textarea class="govuk-textarea " id="/claim-details/claim-illness-note/claim-illness-note"
                  name="/claim-details/claim-illness-note/claim-illness-note" rows="5"
                                    aria-describedby=""></textarea>
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
