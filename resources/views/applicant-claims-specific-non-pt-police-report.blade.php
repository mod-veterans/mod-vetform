@include('framework.functions')
@php

//error handling setup
$errorMessage = '';
$errors = 'N';
$errorsList = array();
$count = '';
//set fields
$reported = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


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
    if (!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['police-reported'])) {
        $reported['data']            = @$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['police-reported'];
        $reportedchk[$reported['data']] = ' checked';
    }
} else {


}


if (!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['police-reported'])) {


    //as this is a journey-deciding page, we want to detect a change in choice (if returning from a CYA page) so we can
    //kill off the return URL

   if ( (!empty($_POST['/claim-details/claim-accident-non-sporting-reported-to/non-sporting-reported-to'])) &&
    ($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['police-reported'] == $_POST['/claim-details/claim-accident-non-sporting-reported-to/non-sporting-reported-to']) ) {

        //same choice, return applies

    } else {

       unset($_GET['return']);

    }

}





if (!empty($_POST)) {


    //set the entered field names


    if (!empty($_POST['/claim-details/claim-accident-non-sporting-reported-to/non-sporting-reported-to'])) {


        switch ($_POST['/claim-details/claim-accident-non-sporting-reported-to/non-sporting-reported-to']) {

            case "Yes":
               $data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['police-reported'] = 'Yes';
               $reportedchk['Yes'] = ' checked';
               $theURL = '/applicant/claims/specific/non-pt/police-report/reference-number';

            break;

            case "No":
                $data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['police-reported'] = 'No';
                 $reportedchk['No'] = ' checked';
                 $theURL = '/applicant/claims/specific/non-pt/authorised-leave';

            break;


            default:
                die('unexpected input');
            break;


        }



    } else {

        $errors = 'Y';
        $errorsList[] = '<a href="#/claim-details/claim-accident-non-sporting-reported-to/non-sporting-reported-to">Tell us if the incident was reported</a>';
        $reported['error'] = 'govuk-form-group--error';
        $reported['errorLabel'] =
        '<span id="/claim-details/claim-accident-non-sporting-reported-to/non-sporting-reported-to-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Tell us if the incident was reported
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

                                <h1 class="govuk-heading-xl">Was the incident reported to the civilian or military police?</h1>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group {{$reported['error']}}">
    <a id="/claim-details/claim-accident-non-sporting-reported-to/non-sporting-reported-to"></a>
    <fieldset class="govuk-fieldset">
@php echo $reported['errorLabel']; @endphp

                                            <div
            class="govuk-radios govuk-radios--inline"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-reported-to/non-sporting-reported-to-yes" name="/claim-details/claim-accident-non-sporting-reported-to/non-sporting-reported-to" type="radio"
           value="Yes"     {{$reportedchk['Yes'] ?? ''}}       >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-reported-to/non-sporting-reported-to-yes">Yes</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-reported-to/non-sporting-reported-to-no" name="/claim-details/claim-accident-non-sporting-reported-to/non-sporting-reported-to" type="radio"
           value="No"   {{$reportedchk['No'] ?? ''}}         >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-reported-to/non-sporting-reported-to-no">No</label>
</div>

                    </div>
    </fieldset>
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
