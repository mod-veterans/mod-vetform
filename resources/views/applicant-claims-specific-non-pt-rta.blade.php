@include('framework.functions')
@php

//error handling setup
$errorMessage = '';
$errors = 'N';
$errorsList = array();
$count = '';
//set fields
$rta = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


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
    if (!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['rta'])) {
        $rta['data']            = @$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['rta'];
        $rtachk[$rta['data']] = ' checked';
    }
} else {


}


if (!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['rta'])) {


    //as this is a journey-deciding page, we want to detect a change in choice (if returning from a CYA page) so we can
    //kill off the return URL

   if ( (!empty($_POST['/claim-details/claim-accident-non-sporting-road-traffic/non-sporting-road-traffic'])) &&
    ($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['rta'] == $_POST['/claim-details/claim-accident-non-sporting-road-traffic/non-sporting-road-traffic']) ) {

        //same choice, return applies

    } else {

       unset($_GET['return']);

    }

}



if (!empty($_POST)) {


    //set the entered field names


    if (!empty($_POST['/claim-details/claim-accident-non-sporting-road-traffic/non-sporting-road-traffic'])) {


        switch ($_POST['/claim-details/claim-accident-non-sporting-road-traffic/non-sporting-road-traffic']) {

            case "Yes":
               $data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['rta'] = 'Yes';
               $rtachk['Yes'] = ' checked';
               $theURL = '/applicant/claims/specific/non-pt/rta/journey-reason';

            break;

            case "No":
                $data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['rta'] = 'No';
                 $rtachk['No'] = ' checked';
                 $theURL = '/applicant/claims/specific/non-pt/police-report';

            break;


            default:
                die('unexpected input');
            break;


        }



    } else {

        $errors = 'Y';
        $errorsList[] = '<a href="#/claim-details/claim-accident-non-sporting-road-traffic/non-sporting-road-traffic">Please tell us if the incident was a road traffic accident</a>';
        $rta['error'] = 'govuk-form-group--error';
        $rta['errorLabel'] =
        '<span id="/claim-details/claim-accident-non-sporting-road-traffic/non-sporting-road-traffic-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Please tell us if the incident was a road traffic accident
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
  <legend class="govuk-fieldset__legend govuk-fieldset__legend--l">
                                <h1 class="govuk-heading-xl">Was the incident a road traffic accident?</h1>
</legend>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group {{$rta['error']}}">
    <a id="/claim-details/claim-accident-non-sporting-road-traffic/non-sporting-road-traffic"></a>
    <fieldset class="govuk-fieldset">
@php echo $rta['errorLabel']; @endphp

                                            <div
            class="govuk-radios govuk-radios--inline"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-road-traffic/non-sporting-road-traffic-yes" name="/claim-details/claim-accident-non-sporting-road-traffic/non-sporting-road-traffic" type="radio"
           value="Yes"     {{$rtachk['Yes'] ?? ''}}       >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-road-traffic/non-sporting-road-traffic-yes">Yes</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-road-traffic/non-sporting-road-traffic-no" name="/claim-details/claim-accident-non-sporting-road-traffic/non-sporting-road-traffic" type="radio"
           value="No"     {{$rtachk['No'] ?? ''}}       >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-road-traffic/non-sporting-road-traffic-no">No</label>
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
