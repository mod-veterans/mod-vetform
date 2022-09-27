@include('framework.functions')
@php
$page_title = 'Home';
@endphp

@include('framework.header')

<form name="{Route::currentRouteName()}" action="POST">
    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Apply for Armed Forces Compensation or a War Pension</h1>
                                <p class="govuk-body">Make a claim under the Armed Forces Compensation Scheme or War Pension Scheme. For more about these schemes see our <a href="https://www.gov.uk/government/collections/free-help-with-compensation-claims-for-injury-in-the-armed-forces">guidance</a>.</p>
<p class="govuk-body">You do not need to know which compensation scheme applies to you before making a claim.</p>
<p class="govuk-body">
<h2>Eligibility:</h2>
</p>
    <ul class="govuk-list govuk-list--bullet govuk-list--spaced">
        <li>you may be able to get a payment if you have an injury, illness or medical disorder caused or made worse by UK armed forces service</li>
        <li>claims can be made for both physical and mental health conditions</li>
        <li>if you want to claim for a condition related to exposure to asbestos, read the <a href="https://www.gov.uk/guidance/help-for-veterans-diagnosed-with-diffuse-mesothelioma#how-to-claim">guidance on GOV.UK</a> first</li>
        <li>only use this service to make a claim.  If you want to ask for a review or appeal a previous decision, <a href="https://www.gov.uk/guidance/veterans-uk-contact-us">contact Veterans UK</a></li>
        <li>if you want to claim for bereavement or dependant’s benefits, do not use this service. See our <a href="https://www.gov.uk/government/collections/help-and-support-when-a-veteran-or-service-person-dies" target="_NEW">guidance on GOV.UK</a>
    </ul>




<h2>Before you start</h2>
<p class="govuk-body"><strong>You'll be asked for:</strong><br />
</p>
    <ul class="govuk-list govuk-list--bullet govuk-list--spaced">
        <li>an email address. If you do not have one, you should make a claim by post. Details of how to do this can be found further down this page</li>
        <li>details of anyone helping you make a claim, for example a charity or welfare adviser</li>
        <li>your own details, including your national insurance number</li>
        <li>your armed forces service, including dates you served, if you know them</li>
        <li>the illness or injury you’re claiming for and why you think they are related to your armed forces service</li>
        <li>your doctor’s details and, if you have them, details of any hospitals that have treated you for the medical conditions you’re claiming for</li>
        <li>any other compensation or benefits you receive or have received for the conditions you’re claiming for</li>
        <li>your bank account details</li>
    </ul>


<p class="govuk-body">Gather any details or documents you need in advance - this will make it faster to answer the questions.</p>

<div class="govuk-inset-text">
You do not need to get any new information you do not already have. Veterans UK cannot refund any costs involved if you do this.
</div>

<h2>Making a claim by post</h2>
<p class="govuk-body">You can also claim by filling in a paper claim form and sending it back to us. Ask for a paper form by calling the Veterans UK Helpline on <a href="tel:08081914218">0808 1914 218</a> Mon to Fri 8am to 4pm or email <a href="mailto:veterans-uk@mod.gov.uk">veterans-uk@mod.gov.uk</a>. The helpline will send you a form and a pre-paid envelope to return it.</p>



<div class="govuk-warning-text">
  <span class="govuk-warning-text__icon" aria-hidden="true">!</span>
  <strong class="govuk-warning-text__text">
    <span class="govuk-warning-text__assistive">Warning</span>
    If the person named in this application has ever served with United Kingdom Special Forces (UKSF), either directly or in a support role, you must contact the MOD A Block Disclosure Cell before using this service.You may be asked to apply for Express Prior Authority in Writing (EPAW) and will be given a reference number to quote when you make your claim. Email <a href="mailto:MAB-Disclosures@mod.gov.uk">MAB-Disclosures@mod.gov.uk</a> explaining you want to make an armed forces compensation claim.
  </strong>
</div>







        <a href="/tasklist" role="button" draggable="false" data-module="govuk-button"
                 class="govuk-button govuk-button--start govuk-!-margin-top-4">
            Start now
            <svg class="govuk-button__start-icon" xmlns="http://www.w3.org/2000/svg" width="17.5" height="19"
                 viewBox="0 0 33 40" aria-hidden="true" focusable="false">
                <path fill="currentColor" d="M0 0h13l20 20-20 20H0l20-20z"/>
            </svg>
        </a>
        <a href="/retrieve-application/" role="button" draggable="false" data-module="govuk-button"
                 class="govuk-button govuk-button--secondary govuk-!-margin-top-4 govuk-!-margin-left-4">
            Return to a saved application
            <svg class="govuk-button__start-icon" xmlns="http://www.w3.org/2000/svg" width="17.5" height="19"
                 viewBox="0 0 33 40" aria-hidden="true" focusable="false">
                <path fill="currentColor" d="M0 0h13l20 20-20 20H0l20-20z"/>
            </svg>
        </a>



        <h2>Help with making a claim</h2>
        <p class="govuk-body">
You can get help with making a claim by contacting the <a href="https://www.gov.uk/guidance/veterans-uk-contact-us">Veterans UK helpline</a> or <a href="https://www.gov.uk/guidance/veterans-welfare-service">Veterans Welfare Service</a>.  The welfare service can arrange an appointment to provide one to one help if needed.</p>

<div class="govuk-inset-text">
You do not need a paid representative such as a solicitor or claims management company to apply. Free independent advice is available from the <a href="https://www.gov.uk/guidance/veterans-welfare-service">Veterans Welfare Service</a> or charitable organisations.
</div>

            </div>
        </div>
    </main>
</form>
</div>

@include('framework.footer')

