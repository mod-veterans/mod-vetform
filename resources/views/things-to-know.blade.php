@include('framework.functions')
@php

if (!empty($_POST)) {
    $userID = $_SESSION['vets-user'];
    $data = getData($userID);

    $data['sections']['things-to-know']['completed'] = TRUE;

    storeData($userID,$data);

    header("Location: /tasklist");
    die();
}

@endphp

@include('framework.header')
@include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Things you need to know before you start</h1>
                               <h2>About this online claim service</h2>
                               <ul class="govuk-list govuk-list--bullet govuk-list--spaced">
    <li>The application should take around 45 minutes to complete. </li>
    <li>When you’ve fully completed the “Personal Details” section, you can exit and then return to a part completed application within 3 months.</li>
    <li>After you’ve submitted your application, you will not be able to access your claim again or make any changes.  You can contact us later with new information if you need to.</li>
    <li>You can use the ‘supporting documents’ section to upload any documents you want to send with your application. </li>
    <li>We do not need you to get any new information you do not already have. We cannot refund any costs involved if you do this.</li>
</ul>
<h2>Answering the questions</h2>
<ul class="govuk-list govuk-list--bullet govuk-list--spaced">
<li>You’ll be asked questions about yourself, your service, and the medical conditions you’re claiming for.</li>
    <li>Answer all the questions to the best of your knowledge but if you cannot remember, you can leave blank any sections not marked ‘required’.</li>


</ul>


<div class="govuk-warning-text">
  <span class="govuk-warning-text__icon" aria-hidden="true">!</span>
  <strong class="govuk-warning-text__text">
    <span class="govuk-warning-text__assistive">Warning</span>
    Do not include details of military operations (OPSEC) in your answers.
  </strong>
</div>


            <form method="post" enctype="multipart/form-data" novalidate>
            @csrf
                                                    <div class="govuk-form-group ">
    <input name="/things-to-know/overview/check-before" type="hidden" value="1">
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
