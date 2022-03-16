@include('framework.functions')
@php

//error handling setup
$errorMessage = '';
$errors = 'N';
$errorsList = array();
$count = '';
//set fields
$condition = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


    $userID = $_SESSION['vets-user'];
    $data = getData($userID);


//this gets teh current record ID to edit and sets it for reference
if (empty($_GET['claimrecord'])) {

    if (empty($data['settings']['claim-record-num'])) {
        header("Location: /applicant/claims");
        die();
    } else {
        $thisRecord = $data['settings']['claim-record-num'];
    }

} else {
    $thisRecord = cleanRecordID($_GET['claimrecord']);
    $data['settings']['claim-record-num'] = $thisRecord;
}





if (empty($_POST)) {
    //load the data if set
    if (!empty($data['sections']['claims']['records'][$thisRecord]['non-specific']['condition'])) {
        $condition['data'] = @$data['sections']['claims']['records'][$thisRecord]['non-specific']['condition'];
    }
} else {

}


if (!empty($_POST)) {


    //set the entered field names


    if (!empty($_POST['/claim-details/claim-illness-condition/claim-illness-claiming-for'])) {

        $data['sections']['claims']['records'][$thisRecord]['non-specific']['condition'] = cleanTextData($_POST['/claim-details/claim-illness-condition/claim-illness-claiming-for']);


    } else {

        $errors = 'Y';
        $errorsList[] = '<a href="#/claim-details/claim-illness-condition/claim-illness-claiming-for">Please tell us what type of medical condition you are claiming for</a>';
        $condition['error'] = 'govuk-form-group--error';
        $condition['errorLabel'] =
        '<span id="/claim-details/claim-illness-condition/claim-illness-claiming-for-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Please tell us what type of medical condition you are claiming for
         </span>';

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
        $theURL = '/applicant/claims/non-specific/medical-practitioner';

        if (!empty($_GET['return'])) {
            if ($rURL = cleanURL($_GET['return'])) {
                $theURL = $rURL;
            }
        }

        header("Location: ".$theURL);
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
   <legend class="govuk-fieldset__legend govuk-fieldset__legend--l">
                                <h1 class="govuk-heading-xl">What medical condition(s) are you claiming for?</h1>
    </legend>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group {{$condition['error']}} ">
    <label class="govuk-label" for="/claim-details/claim-illness-condition/claim-illness-claiming-for">
        <span class="govuk-visually-hidden">Medical condition claiming</span>
    </label>
@php echo $condition['errorLabel']; @endphp
    <div id="/claim-details/claim-illness-condition/claim-illness-claiming-for-hint" class="govuk-hint">You can claim for any medical condition you think is related to your service.  If you have a specific diagnosis, please include it here, for example, deafness, osteoarthritis.<br /><br />Tell us which side of the body is affected if needed, for example, deafness left ear.</div>


<div class="govuk-inset-text">
We will ask you why your conditions are caused by your service later.
</div>


<textarea class="govuk-textarea govuk-js-character-count" id="/claim-details/claim-illness-condition/claim-illness-claiming-for"
                  name="/claim-details/claim-illness-condition/claim-illness-claiming-for" rows="5" maxlength="500"
                                    aria-describedby="with-hint-info /claim-details/claim-illness-condition/claim-illness-claiming-for-hint">{{$condition['data'] ?? ''}}</textarea>
  <div id="with-hint-info" class="govuk-hint govuk-character-count__message" aria-live="polite">
    You can enter up to 500 characters
  </div>
</div>



                <div class="govuk-form-group">
    <button class="govuk-button govuk-!-margin-right-2" data-module="govuk-button">Save and continue</button>
@include('framework.bottombuttons')

    </div>
            </form>
            </div>
        </div>
    </main>
</div>





@include('framework.footer')
