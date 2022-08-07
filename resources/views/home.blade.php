@include('framework.functions')
@include('framework.header')

<form name="{Route::currentRouteName()}" action="POST">
    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Apply for an Armed Forces Compensation or War Pension Payment</h1>
                                <p class="govuk-body">Make a claim under the Armed Forces Compensation Scheme or War Pension Scheme. For more about these schemes see our <a href="https://www.gov.uk/government/collections/free-help-with-compensation-claims-for-injury-in-the-armed-forces" target="_New">guidance</a>.</p>
<p class="govuk-body">You do not need to know which compensation scheme applies to you before making a claim.</p>
<p class="govuk-body">
<strong>Eligibility:</strong><br />
</p>
    <ul class="govuk-list govuk-list--bullet govuk-list--spaced">
        <li>You may be able to get a payment if you have an injury, illness or medical disorder caused or made worse by UK armed forces service.</li>
        <li>Claims can be made for both physical and mental health conditions.</li>
        <li>If you want to claim for a condition related to exposure to asbestos, read the <a href="https://www.gov.uk/guidance/help-for-veterans-diagnosed-with-diffuse-mesothelioma#how-to-claim">guidance on GOV.UK</a> first.</li>
        <li>Only use this service to make a claim.  If you want to ask for a review or appeal a previous decision, <a href="https://www.gov.uk/guidance/veterans-uk-contact-us">contact Veterans UK.</a>.</li>
        <li>If you want to claim for bereavement or dependant’s benefits, do not use this service. See our <a href="https://www.gov.uk/government/collections/help-and-support-when-a-veteran-or-service-person-dies" target="_NEW">guidance on GOV.UK</a>.
    </ul>



<p class="govuk-body">
<strong>You'll be asked about:</strong><br />
</p>
    <ul class="govuk-list govuk-list--bullet govuk-list--spaced">
        <li>Anyone helping you make a claim, for example a charity or welfare adviser</li>
        <li>Your own details, including your national insurance number</li>
        <li>Your armed forces service, including dates you served, if you know them</li>
        <li>The illness or injury you’re claiming for and why you think they are related to your armed forces service</li>
        <li>Your doctor’s details and, if you have them, details of any hospitals that have treated you for the medical conditions you’re claiming for</li>
        <li>Any other compensation or benefits you receive or have received for the conditions you’re claiming for</li>
        <li>Your bank account details</li>
    </ul>


<p class="govuk-body">Gather any details or documents you need in advance - this will make it faster to answer the questions.</p>

<div class="govuk-inset-text">
You do not need to get any new information you do not already have. Veterans UK cannot refund any costs involved if you do this.
</div>

<p class="govuk-body"><strong>What you'll need to apply:</strong></p>
<p class="govuk-body">An email address. If you do not have one, you should make a claim by post.</p>

<details class="govuk-details" data-module="govuk-details">
  <summary class="govuk-details__summary">
    <span class="govuk-details__summary-text">
      You must read this text information if the person applying has ever served in or supported the Special Forces
    </span>
  </summary>
  <div class="govuk-details__text">
If the person named in this application is serving or has served in with United Kingdom Special Forces (UKSF), directly or in a support role, advice must be obtained from the MOD A Block Disclosure Cell before using this service. If the person named in this application has served at any time from 1996, they will be subject to the UKSF Confidentiality Contract and must apply for Express Prior Authority in Writing (EPAW) through the Disclosure Cell before submitting a claim where they may be asked to disclose details of their service with UKSF or any units directly supporting them. The Disclosure Cell can be contacted by emailing <a href="mailto:MAB-Disclosures@mod.gov.uk">MAB-Disclosures@mod.gov.uk</a>.
  </div>
</details>



        <a href="/tasklist" role="button" draggable="false" data-module="govuk-button"
                 class="govuk-button govuk-button--start govuk-!-margin-top-4">
            Start now
            <svg class="govuk-button__start-icon" xmlns="http://www.w3.org/2000/svg" width="17.5" height="19"
                 viewBox="0 0 33 40" aria-hidden="true" focusable="false">
                <path fill="currentColor" d="M0 0h13l20 20-20 20H0l20-20z"/>
            </svg>
        </a>
<p class="govuk-body">OR</p>
        <a href="/retrieve-application/" role="button" draggable="false" data-module="govuk-button"
                 class="govuk-button govuk-button govuk-!-margin-top-4">
            Return to a saved application
            <svg class="govuk-button__start-icon" xmlns="http://www.w3.org/2000/svg" width="17.5" height="19"
                 viewBox="0 0 33 40" aria-hidden="true" focusable="false">
                <path fill="currentColor" d="M0 0h13l20 20-20 20H0l20-20z"/>
            </svg>
        </a>



        <h2>Help with making a claim</h2>
        <p class="govuk-body">
You can get help with making a claim by contacting the <a href="https://www.gov.uk/guidance/veterans-uk-contact-us" target="_New">Veterans UK helpline</a> or <a href="https://www.gov.uk/guidance/veterans-welfare-service" target="_New">Veterans Welfare Service</a>.  The welfare service can arrange an appointment to provide one to one help if needed.</p>

<div class="govuk-inset-text">
You do not need a paid representative such as a solicitor or claims management company to apply. Free independent advice is available from the <a href="https://www.gov.uk/guidance/veterans-welfare-service" target="_New">Veterans Welfare Service</a> or charitable organisations.
</div>



<h2>Making a claim by post</h2>
<p class="govuk-body">You can claim by filling in a paper claim form and sending it to <a href="https://www.gov.uk/government/organisations/veterans-uk" target="_New">Veterans UK</a>.</p>

<p class="govuk-body">You can download a claim form to print out from the <a href="https://www.gov.uk/guidance/war-pension-scheme-wps" target="_New">War Pension Scheme</a> or <a href="https://www.gov.uk/guidance/armed-forces-compensation-scheme-afcs" target="_New">Armed Forces Compensation Scheme</a> GOV.UK pages.</p>


<div class="govuk-inset-text">
If you cannot download or print the form, the <a href="https://www.gov.uk/guidance/veterans-uk-contact-us" target="_New">Veterans UK helpline</a> can send you a form with a pre-paid envelope to return it.
</div>

            </div>
        </div>
    </main>
</form>
</div>

@include('framework.footer')

