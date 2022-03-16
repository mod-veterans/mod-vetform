@include('framework.functions')
@include('framework.header')

<form name="{Route::currentRouteName()}" action="POST">
    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Save and come back later</h1>
                                <p class="govuk-body">You’re about to use our ‘save and come back later’ facility.</p>
<p class="govuk-body">You must return within 3 months of when you first started.</p>
<p class="govuk-body">Your application will be saved securely until you return.</p>


<p class="govuk-body">
<strong>To come back, you'll need your:</strong><br />
</p>
    <ul class="govuk-list govuk-list--bullet govuk-list--spaced">
        <li>Last name or family name</li>
        <li>Date of birth</li>
        <li>National Insurance Number</li>
    </ul>


<div class="govuk-warning-text">
  <span class="govuk-warning-text__icon" aria-hidden="true">!</span>
  <strong class="govuk-warning-text__text">
    <span class="govuk-warning-text__assistive">Warning</span>
    You must also have access to either the mobile phone or email account matching the details you’ve entered. This is so we can send you a text message and email with a code to enter on screen.
  </strong>
</div>


        <a href="/flush" role="button" draggable="false" data-module="govuk-button"
                 class="govuk-button govuk-button--start govuk-!-margin-top-4">
            Save and come back later
            <svg class="govuk-button__start-icon" xmlns="http://www.w3.org/2000/svg" width="17.5" height="19"
                 viewBox="0 0 33 40" aria-hidden="true" focusable="false">
                <path fill="currentColor" d="M0 0h13l20 20-20 20H0l20-20z"/>
            </svg>
        </a>
<br /><br />
        <a href="/tasklist/">
            Return to task list

        </a>

            </div>
        </div>
    </main>
</form>
</div>

@include('framework.footer')

