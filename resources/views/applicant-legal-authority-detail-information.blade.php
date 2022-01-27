@php


if (!empty($_POST)) {



            header("Location: /applicant/legal-authority/check-answers");
            die();


}

@endphp




@include('framework.header')


    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Applying for someone else</h1>

<div class="govuk-warning-text">
  <span class="govuk-warning-text__icon" aria-hidden="true">!</span>
  <strong class="govuk-warning-text__text">
    <span class="govuk-warning-text__assistive">Warning</span>
We can only consider a claim made for someone else if you send us a copy of the authority to act for them.
  </strong>
</div>




<h2>Completing the rest of this application</h2>

<p class="govuk-body">Use the details of the person with the injury, illness or disability when answering questions to follow. For example, in answer to ‘What is your name?’ you should enter the details of the person you are acting for.</p>

<div class="govuk-inset-text">
You should enter the email and telephone number that you want Veterans UK to use to contact you at.
</div>





<h2>Confirming your authority to claim</h2>
<p class="govuk-body">Upload confirmation of the authority you have, for example the letter giving you Power of Attorney, within the ‘Supporting Documents’ section later. You can send us a copy in the post if you prefer.</p>

<div class="govuk-warning-text">
  <span class="govuk-warning-text__icon" aria-hidden="true">!</span>
  <strong class="govuk-warning-text__text">
    <span class="govuk-warning-text__assistive">Warning</span>
You need permission to claim if the person you are applying for served in or supported the Special Forces.
  </strong>
</div>

<details class="govuk-details" data-module="govuk-details">
  <summary class="govuk-details__summary">
    <span class="govuk-details__summary-text">
     You must read this text information if the person you are applying for served in or supported the Special Forces
    </span>
  </summary>
  <div class="govuk-details__text">
If the person named in this application is serving or has served in with United Kingdom Special Forces (UKSF), directly or in a support role, advice must be obtained from the MOD A Block Disclosure Cell before using this service. If the person named in this application has served at any time from 1996, they will be subject to the UKSF Confidentiality Contract and must apply for Express Prior Authority in Writing (EPAW) through the Disclosure Cell before submitting a claim where they may be asked to disclose details of their service with UKSF or any units directly supporting them. The Disclosure Cell can be contacted by emailing <a href="mailto:MAB-Disclosures@mod.gov.uk">MAB-Disclosures@mod.gov.uk</a>.
  </div>
</details>






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
