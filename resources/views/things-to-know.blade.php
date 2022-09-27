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

$page_title = 'Things you need to know before you start';

@endphp

@include('framework.header')
@include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Things you need to know before you start</h1>
                               <h2>About this online claim service:</h2>
                               <ul class="govuk-list govuk-list--bullet govuk-list--spaced">
    <li>you can make one or more claims for injuries or illnesses with different causes in one application</li>
    <li>a single claim should take around 45 minutes to complete but some may take longer</li>
    <li>once you’ve completed the 'Personal Details' section. If you can take a break an return to an application later</li>

    <li>you can use the ‘supporting documents’ section to upload image of any documents you want to send us</li>
    <li>answer all the questions to the best of your knowledge. If you cannot remember, you can leave blank any sections not marked 'required'</li>
    <li>after you’ve submitted your application, you cannot access your claim again online. You can contact us later with changes or new information if you need to</li>
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
   <button class="govuk-button govuk-!-margin-right-2" data-module="govuk-button">Continue</button>
@include('framework.bottombuttons')

    </div>
            </form>
            </div>
        </div>
    </main>
</div>

@include('framework.footer')
