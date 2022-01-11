@include('framework.functions')
@php


//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$wherewere = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


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
    if (!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['where-were-you'])) {
        $wherewere['data']            = @$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['where-were-you'];

    }

} else {
//var_dump($_POST);
//die;
}



if (!empty($_POST)) {

    if (empty( $_POST['/claim-details/claim-illness-related/claim-illness-related'])) {

            $errors = 'Y';
            $errorsList[] = '<a href="#/claim-details/claim-illness-related/claim-illness-related">Please tell where were you when the incident happened.</a>';
            $wherewere['error'] = 'govuk-form-group--error';
            $wherewere['errorLabel'] =
            '<span id="/claim-details/claim-illness-related/claim-illness-related-error" class="govuk-error-message">
                <span class="govuk-visually-hidden">Error:</span>Please tell where were you when the incident happened.
             </span>';


    } else {


    //set the entered field names
        $wherewerearray          = $_POST['/claim-details/claim-illness-related/claim-illness-related'];

        $wherewere['data']  = implode(', ',$wherewerearray);

               $data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['where-were-you'] = $wherewere['data'];

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

        $theURL = '/applicant/claims/specific/non-pt/rta';
        if (!empty($_GET['return'])) {
            if ($rURL = cleanURL($_GET['return'])) {
                $theURL = $rURL;
            }
        }

        header("Location: ".$theURL);
        die();

    }

}

//sort out which ones to display


$showArr = explode(', ',$wherewere['data']);

foreach ($showArr as $cur) {
    $wherewerechk[$cur] = ' checked';
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
                                <h1 class="govuk-heading-xl">Where were you when the incident happened?</h1>
    </legend>
                                <form method="post" enctype="multipart/form-data" novalidate >
                                @csrf
                                                    <div class="govuk-form-group {{$wherewere['error']}}">
    <a id="/claim-details/claim-accident-non-sporting-location/non-sporting-location"></a>
    <fieldset class="govuk-fieldset" aria-describedby="contact-hint">
@php echo $wherewere['errorLabel'] @endphp

                <div id="contact-hint" class="govuk-hint">Tick all that apply.</div>
                <div class="govuk-checkboxes" data-module="govuk-checkboxes">
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="616680a3c4ce7" name="/claim-details/claim-illness-related/claim-illness-related[]" type="checkbox"
           value="An operations location overseas"    {{$wherewerechk['An operations location overseas'] ?? ''}}        >
    <label class="govuk-label govuk-checkboxes__label" for="616680a3c4ce7">An operations location overseas</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="616680a3c4e3d" name="/claim-details/claim-illness-related/claim-illness-related[]" type="checkbox"
           value="An operations location UK"       {{$wherewerechk['An operations location UK'] ?? ''}}     >
    <label class="govuk-label govuk-checkboxes__label" for="616680a3c4e3d">An operations location UK</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="616680a3c4f40" name="/claim-details/claim-illness-related/claim-illness-related[]" type="checkbox"
           value="My home base"    {{$wherewerechk['My home base'] ?? ''}}        >
    <label class="govuk-label govuk-checkboxes__label" for="616680a3c4f40">My home base</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="616680a3c5031" name="/claim-details/claim-illness-related/claim-illness-related[]" type="checkbox"
           value="A training location"       {{$wherewerechk['A training location'] ?? ''}}     >
    <label class="govuk-label govuk-checkboxes__label" for="616680a3c5031">A training location</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="616680a3c511c" name="/claim-details/claim-illness-related/claim-illness-related[]" type="checkbox"
           value="Accommodation"     {{$wherewerechk['Accommodation'] ?? ''}}       >
    <label class="govuk-label govuk-checkboxes__label" for="616680a3c511c">Accommodation</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="616680a3c5206" name="/claim-details/claim-illness-related/claim-illness-related[]" type="checkbox"
           value="An off-duty location"    {{$wherewerechk['An off-duty location'] ?? ''}}        >
    <label class="govuk-label govuk-checkboxes__label" for="616680a3c5206">An off-duty location</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="616680a3c5207" name="/claim-details/claim-illness-related/claim-illness-related[]" type="checkbox"
           value="Travelling"     {{$wherewerechk['Travelling'] ?? ''}}       >
    <label class="govuk-label govuk-checkboxes__label" for="616680a3c5207">Travelling</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="616680a3c5208" name="/claim-details/claim-illness-related/claim-illness-related[]" type="checkbox"
           value="Other"   {{$wherewerechk['Other'] ?? ''}}          >
    <label class="govuk-label govuk-checkboxes__label" for="616680a3c5208">Other</label>
</div>



                    </div>
    </fieldset>
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
