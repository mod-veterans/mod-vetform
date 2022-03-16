@include('framework.functions')
@php


//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$downgraded = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


//load in our content
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
    if (!empty($data['sections']['claims']['records'][$thisRecord]['downgraded'])) {
        $downgraded['data']            = @$data['sections']['claims']['records'][$thisRecord]['downgraded'];
        $downgradedchk[$downgraded['data']] = ' checked';
    }
} else {


}



//as this is a journey-deciding page, we want to detect a change in choice (if returning from a CYA page) so we can
//kill off the return URL

if ( (!empty($_POST['/claim-details/claim-downgraded/claim-illness-downgraded'])) && (!empty($data['sections']['claims']['records'][$thisRecord]['downgraded'])) &&
($data['sections']['claims']['records'][$thisRecord]['downgraded'] == $_POST['/claim-details/claim-downgraded/claim-illness-downgraded']) ) {

    //same choice, return applies

} else {

   unset($_GET['return']);

}



if (!empty($_POST)) {


    //set the entered field names


    if (!empty($_POST['/claim-details/claim-downgraded/claim-illness-downgraded'])) {


        switch ($_POST['/claim-details/claim-downgraded/claim-illness-downgraded']) {

            case "Yes":
                $data['sections']['claims']['records'][$thisRecord]['downgraded'] = 'Yes';
                $downgradedchk['Yes'] = ' checked';
                $theURL = '/applicant/claims/non-specific/downgraded/when';

            break;

            case "No":
                $data['sections']['claims']['records'][$thisRecord]['downgraded'] = 'No';
                $downgradedchk['No'] = ' checked';
                $theURL = '/applicant/claims/non-specific/why-related';
            break;


            case "Dont Know":
                $data['sections']['claims']['records'][$thisRecord]['downgraded'] = 'Dont Know';
                $downgradedchk['Dont Know'] = ' checked';
                $theURL = '/applicant/claims/non-specific/why-related';
            break;



            default:
                die('unexpected input');
            break;


        }



    } else {

        $errors = 'Y';
        $errorsList[] = '<a href="#/claim-details/claim-downgraded/claim-illness-downgraded">Please tell us if you were downgraded</a>';
        $nominate['error'] = 'govuk-form-group--error';
        $nominate['errorLabel'] =
        '<span id="/claim-details/claim-downgraded/claim-illness-downgraded-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Please tell us if you were downgraded
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
                                <h1 class="govuk-heading-xl">Were you medically downgraded?</h1>
  </legend>
                                <p class="govuk-body">Tell us only about downgrading for the medical conditions you’re claiming for.</p>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group {{$downgraded['error'] ?? ''}} ">
    <a id="/claim-details/claim-downgraded/claim-illness-downgraded"></a>
    <fieldset class="govuk-fieldset">
@php echo $downgraded['errorLabel']; @endphp

                                            <div
            class="govuk-radios govuk-radios--inline"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-downgraded/claim-illness-downgraded-yes" name="/claim-details/claim-downgraded/claim-illness-downgraded" type="radio"
           value="Yes"    {{$downgradedchk['Yes'] ?? ''}}        >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-downgraded/claim-illness-downgraded-yes">Yes</label>
</div>

<div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-downgraded/claim-illness-downgraded-no" name="/claim-details/claim-downgraded/claim-illness-downgraded" type="radio"
           value="No"    {{$downgradedchk['No'] ?? ''}}        >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-downgraded/claim-illness-downgraded-no">No</label>
</div>

<div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-downgraded/claim-illness-downgraded-dontknow" name="/claim-details/claim-downgraded/claim-illness-downgraded" type="radio"
           value="Dont Know"    {{$downgradedchk['Dont Know'] ?? ''}}        >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-downgraded/claim-illness-downgraded-dontknow">Don't Know</label>
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
