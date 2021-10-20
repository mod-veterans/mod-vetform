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
                                <h1 class="govuk-heading-xl">Making a claim on behalf of others.</h1>
<p class="govuk-body">Thank you for telling us you are making a claim on behalf of another person.</p>

<h2>Completing the rest of this application.</h2>

<p class="govuk-body">Please now complete the rest of this application using the details of the person with the injury, illness or disability.  For example, under ‘What is your name’ you should enter the details of the person you are acting for.</p>

<p class="govuk-body">When entering a contact email address, you should use the address you wish to be contacted at when acting for the other person.</p>

<h2>Confirming your authority to claim.</h2>
<p class="govuk-body">Please upload confirmation of the authority you have, for example the letter giving you Power of Attorney, within ‘Supporting Documents’ when you reach that section of this claim. You can send us a copy in the post if you prefer.  Details of how to do that can also be found under ‘Supporting Documents’.  </p>

<h3>Note for those serving or having served in Special Forces:</h3>
<p class="govuk-body">If the person named in this application is serving or has served in with United Kingdom Special Forces (UKSF), directly or in a support role, advice must be obtained from the MOD A Block Disclosure Cell before using this service. If the person named in this application has served at any time from 1996, they will be subject to the UKSF Confidentiality Contract and must apply for Express Prior Authority in Writing (EPAW) through the Disclosure Cell before submitting a claim where they may be asked to disclose details of their service with UKSF or any units directly supporting them. The Disclosure Cell can be contacted by emailing <a href="mailto:MAB-Disclosures@mod.gov.uk">MAB-Disclosures@mod.gov.uk</a>.</p>




            <form method="post" enctype="multipart/form-data" novalidate>
            @csrf

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
