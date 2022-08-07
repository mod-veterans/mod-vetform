@include('framework.functions')
@php

//error handling setup
$errorMessage = '';
$errors = 'N';
$errorsList = array();
$count = '';
//set fields
$activity = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


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
    if (!empty($data['sections']['claims']['records'][$thisRecord]['specific']['pt']['activity'])) {
        $activity['data'] = @$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['activity'];
    }
} else {

}


if (!empty($_POST)) {


    //set the entered field names


    if (!empty($_POST['/claim-details/claim-accident-sporting-activity/activity'])) {

        $data['sections']['claims']['records'][$thisRecord]['specific']['pt']['activity'] = cleanTextData($_POST['/claim-details/claim-accident-sporting-activity/activity']);


    } else {


        $errors = 'Y';
        $errorsList[] = '<a href="#/claim-details/claim-accident-sporting-activity/activityn">Tell us what was the activity?</a>';
        $activity['error'] = 'govuk-form-group--error';
        $activity['errorLabel'] =
        '<span id="/claim-details/claim-accident-sporting-activity/activity-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Tell us what was the activity?
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
        $theURL = '/applicant/claims/specific/pt/armed-forces-organised';

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
                                <h1 class="govuk-heading-xl">What was the activity?</h1>
    </legend>
                                <p class="govuk-body">(For example, skiing, football, diving)</p>

            <form method="post" enctype="multipart/form-data" novalidate>
            @csrf
                                                    <div class="govuk-form-group {{$activity['error']}}">
 @php echo $activity['errorLabel']; @endphp
    <label class="govuk-label" for="/claim-details/claim-accident-sporting-activity/activity">
        <span class="govuk-visually-hidden">What was the activity?</span>
    </label>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/claim-details/claim-accident-sporting-activity/activity" name="/claim-details/claim-accident-sporting-activity/activity" type="text"
                   value="{{$activity['data']}}"
            >
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
