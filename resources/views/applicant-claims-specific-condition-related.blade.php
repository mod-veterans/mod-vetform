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
                                <p class="govuk-body">Tell us in your own words why you feel your claimed medical condition or injury is caused or
    made worse by your service in the Armed Forces. Include information you think is relevant but do not include details
    of operations. If you are claiming for a Road Traffic Accident and you were not on a direct route between your
    starting point and destination, please tell us why here.</p>

    <p class="govuk-body"><strong>Note:</strong> You MUST NOT include information classified as Secret or above. If you
    need to tell us information classified as Secret or above, please write "Classified  Information" we will contact
    you after we receive your claim.</p>

    <p class="govuk-body">If you have served or are serving (whether directly or in a support role) with the United
    Kingdom Special Forces (UKSF), you must seek advice from the MOD A Block Disclosure Cell BEFORE completing this
    section. The Disclosure Cell can be contacted by emailing MAB-J1-Disclosures-ISA-Mailbox@mod.gov.uk.</p>

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
