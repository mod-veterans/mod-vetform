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
    if (!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['conditions'])) {
        $condition['data'] = @$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['conditions'];
    }
} else {

}


if (!empty($_POST)) {


    //set the entered field names


    if (!empty($_POST['/claim-details/claim-accident-sporting-medical-condition/claim-accident-sporting-medical-condition'])) {

        $data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['conditions'] = cleanTextData($_POST['/claim-details/claim-accident-sporting-medical-condition/claim-accident-sporting-medical-condition']);


    } else {


        $errors = 'Y';
        $errorsList[] = '<a href="#/claim-details/claim-accident-sporting-medical-condition/claim-accident-sporting-medical-condition">Tell us what medical condition(s) you are claiming for</a>';
        $condition['error'] = 'govuk-form-group--error';
        $condition['errorLabel'] =
        '<span id="/claim-details/claim-accident-sporting-medical-condition/claim-accident-sporting-medical-condition-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Tell us what medical condition(s) you are claiming for
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
        $theURL = '/applicant/claims/specific/non-pt/medical/practitioner';

        if (!empty($_GET['return'])) {
            if ($rURL = cleanURL($_GET['return'])) {
                $theURL = $rURL;
            }
        }

        header("Location: ".$theURL);
        die();

}

}

$page_title = 'What medical condition(s) are you claiming for?';

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
                                <h2>You should include:</h2>
    <ul class="govuk-list govuk-list--bullet govuk-list--spaced">
        <li>the medical conditions or symptoms you think are related to the incident, even if they developed afterwards</li>
        <li>any specific medical diagnosis, for example fracture L5 vertebrae</li>
        <li>which part of the body was/is affected, for example broken left arm, right eye injury</li>
    </ul>

<div class="govuk-inset-text">
You’ll be asked why your conditions were/are caused by your service later. You do not need to include this here.
</div>

            <form method="post" enctype="multipart/form-data" novalidate>
            @csrf
                                                    <div class="govuk-form-group {{$condition['error']}}">
@php echo $condition['errorLabel']; @endphp
        <label class="govuk-label" for="/claim-details/claim-accident-sporting-medical-condition/claim-accident-sporting-medical-condition">
        <span class="govuk-visually-hidden">What medical condition(s) are you claiming for?</span>
    </label>

                <textarea class="govuk-textarea " id="/claim-details/claim-accident-sporting-medical-condition/claim-accident-sporting-medical-condition"
                  name="/claim-details/claim-accident-sporting-medical-condition/claim-accident-sporting-medical-condition" rows="5" maxlength="500"
                                    aria-describedby="">{{$condition['data']}}</textarea>
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
