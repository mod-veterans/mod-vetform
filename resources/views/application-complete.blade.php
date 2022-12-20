@include('framework.functions')
<?php

if (empty($_SESSION['userRef'])) {
    header("Location: /");
    die();
}

$reference_number = $_SESSION['userRef'];


$page_title = 'Application complete';

?>

@include('framework.header')


    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">

            <div class="govuk-panel govuk-panel--confirmation">
  <h1 class="govuk-panel__title">
    Application complete
  </h1>
  <div class="govuk-panel__body">
    Your online claim reference is<br><strong>{{$reference_number}}</strong>
  </div>
</div>

    <p class="govuk-body">Your application has now been received by Veterans UK and you can no longer access your application online.</p>
<p class="govuk-body">We’ve sent you a confirmation email to the address you entered.
</p>

    <h2>What happens next</h2>
    <p class="govuk-body">Veterans UK will consider your claim and obtain any documents or evidence needed. We will contact you if we need any more information. </p>

                                <div class="govuk-inset-text">
The assessment process can be complex and involves gathering information from many sources. We will process your claim as quickly as we can, but it may take between 3 to 11 months to receive a decision.
</div>

    <p class="govuk-body">We will write and tell you the outcome of your claim as soon as a decision has been made. If you need to make any changes to your application, or would like an update on progress, please <a href="https://www.gov.uk/guidance/veterans-uk-contact-us">contact us</a> quoting your National Insurance Number. </p>


<div class="govuk-warning-text">
  <span class="govuk-warning-text__icon" aria-hidden="true">!</span>
  <strong class="govuk-warning-text__text">
    <span class="govuk-warning-text__assistive">Warning</span>
    If you told us your bank account details and these change, you must <a href="https://www.gov.uk/guidance/veterans-uk-contact-us">contact us</a> or payment could be made to the wrong account.
  </strong>
</div>



    <h2>What did you think of this service?</h2>
    <p class="govuk-body">We would like to know your views about using our online claims service today. Please consider completing our short  <a href="https://surveys.mod.uk/index.php/892274?lang=en">user survey</a> to tell us how we can improve.</p>



    <h2 class="govuk-heading-m">Do you need further help or support?</h2>
    <p class="govuk-body">All veterans and their families are entitled to free help and support from Veterans UK at any time. This includes a free helpline and Veterans Welfare Service that can assist with welfare information including benefits, help in the home, employment and financial support. More information and contact details can be found on our website <a href="https://www.gov.uk/guidance/urgent-help-for-veterans">https://www.gov.uk/guidance/urgent-help-for-veterans</a> </p>

 <a href="/" class="govuk-button govuk-button--start govuk-!-margin-top-4">Finish</a>


            </div>
        </div>
    </main>
</div>






@include('framework.footer')
