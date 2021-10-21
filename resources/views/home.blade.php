@include('framework.header')

<form name="{Route::currentRouteName()}" action="POST">
    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Apply for an Armed Forces Compensation or War Pension Payment</h1>
                                <p class="govuk-body">Apply for an <a href="https://www.gov.uk/government/collections/free-help-with-compensation-claims-for-injury-in-the-armed-forces" target="_New">Armed Forces Compensation Scheme</a> or <a href="https://www.gov.uk/government/collections/free-help-with-compensation-claims-for-injury-in-the-armed-forces" target="_New">War Pension</a> payment for injury, illness or disablement related to service in the UK armed forces.</p>
<p class="govuk-body">There is one claim process for both schemes. </p>
<p class="govuk-body">You can make more than one claim for different injuries or illnesses in a single application.</p>
<p class="govuk-body">Use this service for new claims.  If you have already received a payment or want to appeal a previous decision, please <a href="https://www.gov.uk/guidance/veterans-uk-contact-us">contact Veterans UK</a>.</p>

<p class="govuk-body">
<strong>Apply online</strong><br />
You’ll be asked about:</p>
    <ul class="govuk-list govuk-list--bullet govuk-list--spaced">
        <li>Your own details, including your national insurance number.</li>
        <li>Anyone helping you make a claim, for example a charity or welfare adviser.</li>
        <li>Your armed forces service, including dates you served, if you know them.</li>
        <li>The illness, injury or disablements you are claiming for and why you think they are related to your armed forces service.</li>
        <li>Your doctor’s details and, if you have them, details of any hospitals that have treated you for the medical conditions you are claiming for.</li>
        <li>Any other compensation or benefits you receive or have received for the medical conditions you are claiming for.</li>
        <li>Your bank account details.</li>
    </ul>
<p class="govuk-body">You don't need to get any new information you do not already have. <a href="https://www.gov.uk/government/organisations/veterans-uk" tasrget="_New">Veterans UK</a> can't refund any costs involved if you do this.</p>



        <p class="govuk-body"><strong>Note for those serving or having served in Special Forces:</strong> If the person named in this application is serving or has served in with United Kingdom Special Forces (UKSF), directly or in a support role, advice must be obtained from the MOD A Block Disclosure Cell before using this service. If the person named in this application has served at any time from 1996, they will be subject to the UKSF Confidentiality Contract and must apply for Express Prior Authority in Writing (EPAW) through the Disclosure Cell before submitting a claim where they may be asked to disclose details of their service with UKSF or any units directly supporting them. The Disclosure Cell can be contacted by emailing <a href="mailto:MAB-Disclosures@mod.gov.uk">MAB-Disclosures@mod.gov.uk</a>.
        </p>









        <a href="/tasklist" role="button" draggable="false" data-module="govuk-button"
                 class="govuk-button govuk-button--start govuk-!-margin-top-4">
            Start now
            <svg class="govuk-button__start-icon" xmlns="http://www.w3.org/2000/svg" width="17.5" height="19"
                 viewBox="0 0 33 40" aria-hidden="true" focusable="false">
                <path fill="currentColor" d="M0 0h13l20 20-20 20H0l20-20z"/>
            </svg>
        </a>

        <p class="govuk-body">
        <a href="/restore-application" class="govuk-link">Return to an application already started</a>
        </p>

        <h2>Help with making a claim</h2>
        <p class="govuk-body">
You can get help with making a claim by contacting the <a href="https://www.gov.uk/guidance/veterans-uk-contact-us" target="_New">Veterans UK helpline</a> or <a href="https://www.gov.uk/guidance/veterans-welfare-service" target="_New">Veterans Welfare Service</a>.  The welfare service can arrange an appointment to provide one to one help if needed.</p>

<p class="govuk-body">You don’t need a paid representative such as a solicitor or claims management company to apply for compensation. Free independent advice is available from the <a href="https://www.gov.uk/guidance/veterans-welfare-service" target="_New">Veterans Welfare Service</a> or charitable organisations.</p>

<h2>Other ways to claim</h2>
<p class="govuk-body">You can claim by filling in a paper claim form and sending it to <a href="https://www.gov.uk/government/organisations/veterans-uk" target="_New">Veterans UK</a>.  You can either:</p>
<ul class="govuk-list govuk-list--bullet govuk-list--spaced">
    <li>Download a claim form from the <a href="https://www.gov.uk/guidance/war-pension-scheme-wps" target="_New">War Pension Scheme</a> or <a href="https://www.gov.uk/guidance/armed-forces-compensation-scheme-afcs" target="_New">Armed Forces Compensation Scheme</a> pages on GOV.UK; or</li>
<li>Request a paper claim form and reply-paid envelope from the <a href="https://www.gov.uk/guidance/veterans-uk-contact-us" target="_New">Veterans UK helpline</a></li>

        </ul>
            </div>
        </div>
    </main>
</form>
</div>

@include('framework.footer')

