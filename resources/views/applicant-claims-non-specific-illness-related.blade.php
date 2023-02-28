@include('framework.functions')
@php


//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$conditions = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


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
    if (!empty($data['sections']['claims']['records'][$thisRecord]['related-conditions'])) {
        $conditions['data']            = @$data['sections']['claims']['records'][$thisRecord]['related-conditions'];

    }

} else {
//var_dump($_POST);
//die;
}




if (!empty($_POST)) {

    if (empty( $_POST['/claim-details/claim-illness-related/claim-illness-related'])) {


    } else {


    //set the entered field names
        $conditionsarray          = $_POST['/claim-details/claim-illness-related/claim-illness-related'];

        $conditions['data']  = implode(', ',$conditionsarray);

               $data['sections']['claims']['records'][$thisRecord]['related-conditions'] = $conditions['data'];

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

        $theURL = '/applicant/claims/non-specific/exposure-related';
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


$showArr = explode(', ',$conditions['data']);

foreach ($showArr as $cur) {
    $conditionschk[$cur] = ' checked';
}



$page_title = 'What is your Illness/condition related to?';


@endphp



@include('framework.header')


    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group">
    <fieldset class="govuk-fieldset" aria-describedby="contact-hint">
  <legend class="govuk-fieldset__legend govuk-fieldset__legend--l">
                                <h1 class="govuk-heading-xl">What is your Illness/condition related to?</h1>
    </legend>
                <div id="contact-hint" class="govuk-hint">Select all that apply.</div>
                <div class="govuk-checkboxes" data-module="govuk-checkboxes">
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="616680a3c4ce7" name="/claim-details/claim-illness-related/claim-illness-related[]" type="checkbox"
           value="Duties - Operations overseas"    {{$conditionschk['Duties - Operations overseas'] ?? ''}}     >
    <label class="govuk-label govuk-checkboxes__label" for="616680a3c4ce7">Duties - on operations overseas</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="616680a3c4e3d" name="/claim-details/claim-illness-related/claim-illness-related[]" type="checkbox"
           value="Duties - Operations UK"    {{$conditionschk['Duties - Operations UK'] ?? ''}}         >
    <label class="govuk-label govuk-checkboxes__label" for="616680a3c4e3d">Duties - on operations UK</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="616680a3c4f40" name="/claim-details/claim-illness-related/claim-illness-related[]" type="checkbox"
           value="duties uk - not on operations"      {{$conditionschk['duties uk - not on operations'] ?? ''}}       >
    <label class="govuk-label govuk-checkboxes__label" for="616680a3c4f40">Duties - not on operations</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="616680a3c5031" name="/claim-details/claim-illness-related/claim-illness-related[]" type="checkbox"
           value="Training"     {{$conditionschk['Training'] ?? ''}}        >
    <label class="govuk-label govuk-checkboxes__label" for="616680a3c5031">Physical training</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="616680a3c511c" name="/claim-details/claim-illness-related/claim-illness-related[]" type="checkbox"
           value="Misconduct by others"    {{$conditionschk['Misconduct by others'] ?? ''}}         >
    <label class="govuk-label govuk-checkboxes__label" for="616680a3c511c">Misconduct by others</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="616680a3c5206" name="/claim-details/claim-illness-related/claim-illness-related[]" type="checkbox"
           value="Consequential to another medical condition"    {{$conditionschk['Consequential to another medical condition'] ?? ''}}        >
    <label class="govuk-label govuk-checkboxes__label" for="616680a3c5206">Related to another medical condition</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="616680a3c5207" name="/claim-details/claim-illness-related/claim-illness-related[]" type="checkbox"
           value="Other"    {{$conditionschk['Other'] ?? ''}}         >
    <label class="govuk-label govuk-checkboxes__label" for="616680a3c5207">Other</label>
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
