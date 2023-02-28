@include('framework.functions')
@php


//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$whoreported = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


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
    if (!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['who-reported'])) {
        $whoreported['data']            = @$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['who-reported'];

    }

} else {
//var_dump($_POST);
//die;
}



if (!empty($_POST)) {

    if (empty( $_POST['/claim-details/claim-accident-non-sporting-report-to/claim-accident-non-sporting-report-to'])) {

            $errors = 'Y';
            $errorsList[] = '<a href="#61666fc5b995f">Tell us who you reported the incident to.</a>';
            $whoreported['error'] = 'govuk-form-group--error';
            $whoreported['errorLabel'] =
            '<span id="/claim-details/claim-accident-non-sporting-report-to/claim-accident-non-sporting-report-to-error" class="govuk-error-message">
                <span class="govuk-visually-hidden">Error:</span>Tell us who you reported the incident to.
             </span>';


    } else {


    //set the entered field names
        $whoreportedarray          = $_POST['/claim-details/claim-accident-non-sporting-report-to/claim-accident-non-sporting-report-to'];

        $whoreported['data']  = implode(', ',$whoreportedarray);

               $data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['who-reported'] = $whoreported['data'];

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

        $theURL = '/applicant/claims/specific/non-pt/accident-form';
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


$showArr = explode(', ',$whoreported['data']);

foreach ($showArr as $cur) {
    $whoreportedchk[$cur] = ' checked';
}




$page_title = 'Who did you report the incident to?';
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
                                                    <div class="govuk-form-group {{$whoreported['error']}}">
    <fieldset class="govuk-fieldset" aria-describedby="contact-hint">
  <legend class="govuk-fieldset__legend govuk-fieldset__legend--l">
                                <h1 class="govuk-heading-xl">Who did you report the incident to?</h1>
 </legend>
@php echo $whoreported['errorLabel']; @endphp

                <div id="contact-hint" class="govuk-hint">Select all that apply.</div>
                <div class="govuk-checkboxes" data-module="govuk-checkboxes">
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="61666fc5b995f" name="/claim-details/claim-accident-non-sporting-report-to/claim-accident-non-sporting-report-to[]" type="checkbox"
           value="Unit medic"   {{$whoreportedchk['Unit medic'] ?? ''}}         >
    <label class="govuk-label govuk-checkboxes__label" for="61666fc5b995f">Unit medic</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="61666fc5b9ae5" name="/claim-details/claim-accident-non-sporting-report-to/claim-accident-non-sporting-report-to[]" type="checkbox"
           value="Hospital"     {{$whoreportedchk['Hospital'] ?? ''}}        >
    <label class="govuk-label govuk-checkboxes__label" for="61666fc5b9ae5">Hospital</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="61666fc5b9bfb" name="/claim-details/claim-accident-non-sporting-report-to/claim-accident-non-sporting-report-to[]" type="checkbox"
           value="Chain of command"    {{$whoreportedchk['Chain of command'] ?? ''}}         >
    <label class="govuk-label govuk-checkboxes__label" for="61666fc5b9bfb">Chain of command</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="61666fc5b9cf2" name="/claim-details/claim-accident-non-sporting-report-to/claim-accident-non-sporting-report-to[]" type="checkbox"
           value="Colleague"     {{$whoreportedchk['Colleague'] ?? ''}}        >
    <label class="govuk-label govuk-checkboxes__label" for="61666fc5b9cf2">Colleague</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="61666fc5b9ddf" name="/claim-details/claim-accident-non-sporting-report-to/claim-accident-non-sporting-report-to[]" type="checkbox"
           value="Other person"     {{$whoreportedchk['Other person'] ?? ''}}        >
    <label class="govuk-label govuk-checkboxes__label" for="61666fc5b9ddf">Other person</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="61666fc5b9edb" name="/claim-details/claim-accident-non-sporting-report-to/claim-accident-non-sporting-report-to[]" type="checkbox"
           value="I didn't report the incident"    {{$whoreportedchk['I didn\'t report the incident'] ?? ''}}         >
    <label class="govuk-label govuk-checkboxes__label" for="61666fc5b9edb">I didn&#039;t report the incident</label>
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
