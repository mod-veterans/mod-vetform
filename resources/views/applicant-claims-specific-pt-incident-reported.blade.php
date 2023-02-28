@include('framework.functions')
@php


//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$reported = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


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
    if (!empty($data['sections']['claims']['records'][$thisRecord]['specific']['pt']['incident-reported'])) {
        $reported['data']            = @$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['incident-reported'];

    }

} else {
//var_dump($_POST);
//die;
}



if (!empty($_POST)) {

    if (empty( $_POST['did-you-report-the-incident'])) {

            $errors = 'Y';
            $errorsList[] = '<a href="#did-you-report-the-incident-yes">Tell us if you reported the incident.</a>';
            $whoreported['error'] = 'govuk-form-group--error';
            $whoreported['errorLabel'] =
            '<span id="/did-you-report-the-incident-error" class="govuk-error-message">
                <span class="govuk-visually-hidden">Error:</span>Tell us if you reported the incident.
             </span>';


    } else {


    //set the entered field names
        $reported['data'] = $_POST['did-you-report-the-incident'];


        $data['sections']['claims']['records'][$thisRecord]['specific']['pt']['incident-reported'] = $reported['data'];

        $theURL = '/applicant/claims/specific/pt/witnesses';
        if ($reported['data'] == 'Yes') {
            $theURL = '/applicant/claims/specific/pt/incident-reported-to';
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
$reportedchk[$reported['data']] = ' checked';




$page_title = 'Did you report the incident?';

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
                                                    <div class="govuk-form-group {{$reported['error']}}">
    <fieldset class="govuk-fieldset" aria-describedby="contact-hint">
  <legend class="govuk-fieldset__legend govuk-fieldset__legend--l">
                                <h1 class="govuk-heading-xl">Did you report the incident?</h1>
 </legend>
@php echo $reported['errorLabel']; @endphp

                <div class="govuk-checkboxes" data-module="govuk-checkboxes">
                            <div class="govuk-radios__item">
        <input class="govuk-radios__input" id="did-you-report-the-incident-yes" name="did-you-report-the-incident" type="radio"
           value="Yes"   {{$reportedchk['Yes'] ?? ''}}         >
    <label class="govuk-label govuk-radios__label" for="did-you-report-the-incident-yes">Yes</label>
</div>
                            <div class="govuk-radios__item">
        <input class="govuk-radios__input" id="did-you-report-the-incident-no" name="did-you-report-the-incident" type="radio"
           value="No"     {{$reportedchk['No'] ?? ''}}        >
    <label class="govuk-label govuk-radios__label" for="did-you-report-the-incident-no">No</label>
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
