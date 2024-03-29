@include('framework.functions')
@php

//error handling setup
$errorMessage = '';
$errors = 'N';
$errorsList = array();
$count = '';
//set fields
$hospital = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


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
    if (!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['hospital'])) {
        $hospital['data']            = @$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['hospital'];
        $hospitalchk[$hospital['data']] = ' checked';
    }
} else {


}




if (!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['hospital'])) {


    //as this is a journey-deciding page, we want to detect a change in choice (if returning from a CYA page) so we can
    //kill off the return URL

   if ( (!empty($_POST['/claim-details/claim-accident-hospital-facility/sporting-hospital-facility'])) &&
    ($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['hospital'] == $_POST['/claim-details/claim-accident-hospital-facility/sporting-hospital-facility']) ) {

        //same choice, return applies

    } else {

       unset($_GET['return']);

    }

}






if (!empty($_POST)) {


    //set the entered field names


    if (!empty($_POST['/claim-details/claim-accident-hospital-facility/sporting-hospital-facility'])) {


        switch ($_POST['/claim-details/claim-accident-hospital-facility/sporting-hospital-facility']) {

            case "Yes":
               $data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['hospital'] = 'Yes';
               $hospitalchk['Yes'] = ' checked';
               $theURL = '/applicant/claims/specific/hospital/address';

            break;

            case "No":
                $data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['hospital'] = 'No';
                 $hospitalchk['No'] = ' checked';
                 $theURL = '/applicant/claims/specific/downgraded';
            break;


            default:
                die('unexpected input');
            break;


        }



    } else {

        $errors = 'Y';
        $errorsList[] = '<a href="#/claim-details/claim-accident-hospital-facility/sporting-hospital-facility">Tell us if you were taken to a hospital or medical facility</a>';
        $hospital['error'] = 'govuk-form-group--error';
        $hospital['errorLabel'] =
        '<span id="/claim-details/claim-accident-hospital-facility/sporting-hospital-facility-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Tell us if you were taken to a hospital or medical facility
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

$page_title = 'Did you go to a hospital or medical facility?';

@endphp



@include('framework.header')


    @include('framework.backbutton')

   <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
@php
echo $errorMessage;
@endphp


            <form method="post" enctype="multipart/form-data" novalidate>
            @csrf
                                                    <div class="govuk-form-group {{$hospital['error']}}">
    <a id="/claim-details/claim-accident-hospital-facility/sporting-hospital-facility"></a>
    <fieldset class="govuk-fieldset">
  <legend class="govuk-fieldset__legend govuk-fieldset__legend--l">
                                <h1 class="govuk-heading-xl">Did you go to a hospital or medical facility?</h1>
</legend>
                                <p class="govuk-body">For example, for treatment or assessment soon after the incident.  We will ask about further hospital treatment later.</p>
                                <p class="govuk-body">Only tell us about treatment received for the injury/conditions you are claiming for.</p>
@php echo $hospital['errorLabel']; @endphp
                                            <div
            class="govuk-radios govuk-radios--inline"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-hospital-facility/sporting-hospital-facility-yes" name="/claim-details/claim-accident-hospital-facility/sporting-hospital-facility" type="radio"
           value="Yes"  {{$hospitalchk['Yes'] ?? ''}}           >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-hospital-facility/sporting-hospital-facility-yes">Yes</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-hospital-facility/sporting-hospital-facility-no" name="/claim-details/claim-accident-hospital-facility/sporting-hospital-facility" type="radio"
           value="No"     {{$hospitalchk['No'] ?? ''}}       >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-hospital-facility/sporting-hospital-facility-no">No</label>
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
