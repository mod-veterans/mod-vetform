@include('framework.functions')
@php


//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();
$declarationchk = '';


//set fields
$declaration = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);


if (empty($_POST)) {
    //load the data if set
    if (!empty($data['sections']['applicant-who']['declaration'])) {
        $declaration['data'] = @$data['sections']['applicant-who']['helper']['declaration'];
        $declarationchk = 'checked';
    }
} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {


    //set the entered field names

    if (!empty($_POST['/applicant/helper-declaration/helper-declaration-agreed'])) {

        if ($_POST['/applicant/helper-declaration/helper-declaration-agreed'] == 'Yes') {

            $declaration['data'] = cleanTextData($_POST['/applicant/helper-declaration/helper-declaration-agreed']);
            $declarationchk = 'checked';
            $data['sections']['applicant-who']['helper']['declaration'] = cleanTextData($_POST['/applicant/helper-declaration/helper-declaration-agreed']);


        } else {

            $errors = 'Y';
            $errorsList[] = '<a href="#/applicant/helper-declaration/helper-declaration-agreed">Please confirm your acceptance</a>';
            $declaration['error'] = 'govuk-form-group--error';
            $declaration['errorLabel'] =
            '<span id="/applicant/helper-details/helper-name-error" class="govuk-error-message">
                <span class="govuk-visually-hidden">Error:</span> Please confirm your acceptance
             </span>';
         }

    }



    if ($errors == 'Y') {

        $errorList = '';
        foreach ($errorsList as $error) {
            $errorList .=  '<li>'.$error.'</li>';
        }


        $errorMessage = '
         <div class="govuk-error-summary" aria-labelledby="error-summary-title" role="alert" tabindex="-1" data-module="govuk-error-summary">
          <h2 class="govuk-error-summary__title" id="error-summary-title">
            There is a problem
          </h2>
          <div class="govuk-error-summary__body">
            <ul class="govuk-list govuk-error-summary__list">
            '.$errorList.'
            </ul>
          </div>
        </div>
        ';







    } else {

        //store our changes

        storeData($userID,$data);
header("Location: /applicant/helper/check-answers");
die();

}
}

@endphp




@include('framework.header')


    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
@php
echo $errorMessage;
@endphp
                                <h1 class="govuk-heading-xl">Helping someone make a claim</h1>
                                <p class="govuk-body">Thank you for telling us you are helping someone make a claim using this service.</p>
                              <p class="govuk-body">Please be aware that unless you have legal authority to do so, you cannot submit a claim on behalf of another person.</p>
                              <p class="govuk-body">You must therefore ensure that before the claim is submitted, the person named on this application:</p>
                              <ul class="govuk-list govuk-list--bullet">
                                <li>Is satisfied all questions have been answered correctly, to the best of their knowledge and understanding.</li>
                                <li>Is clear that they are the named person making the application.</li>
                                <li>Is clear they are agreeing to the legal declaration in the last section.</li>
                              </ul>
                              <p class="govuk-body">If the person named on this application also wishes to make you a nominated representative, so that we can send you a copy of letters we send to them about their claim, this can be done in the next section.</p>

<h3>Note for those serving or having served in Special Forces:</h3>
<p class="govuk-body">If the person named in this application is serving or has served in with United Kingdom Special Forces (UKSF), directly or in a support role, advice must be obtained from the MOD A Block Disclosure Cell before using this service. If the person named in this application has served at any time from 1996, they will be subject to the UKSF Confidentiality Contract and must apply for Express Prior Authority in Writing (EPAW) through the Disclosure Cell before submitting a claim where they may be asked to disclose details of their service with UKSF or any units directly supporting them. The Disclosure Cell can be contacted by emailing  <a href="mailto:MAB-Disclosures@mod.gov.uk">MAB-Disclosures@mod.gov.uk</a>.</p>


            <form method="post" enctype="multipart/form-data" novalidate >
            @csrf
<div class="govuk-form-group {{$declaration['error']}}">
    @php echo $declaration['errorLabel']; @endphp
        <div class="govuk-checkboxes__item">


        <input class="govuk-checkboxes__input" id="/applicant/helper-declaration/helper-declaration-agreed" name="/applicant/helper-declaration/helper-declaration-agreed" type="checkbox"
           value="Yes"       {{$declarationchk}}    />
    <label class="govuk-label govuk-checkboxes__label" for="/applicant/helper-declaration/helper-declaration-agreed">I confirm I have read and understood the above requirements.</label>
</div>
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
