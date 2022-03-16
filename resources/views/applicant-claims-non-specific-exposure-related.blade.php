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
    if (!empty($data['sections']['claims']['records'][$thisRecord]['related-exposure'])) {
        $conditions['data']            = @$data['sections']['claims']['records'][$thisRecord]['related-exposure'];

    }

} else {
//var_dump($_POST);
//die;
}




if (!empty($_POST)) {

    if (empty( $_POST['/claim-details/claim-illness-dueto/claim-illness-due-to'])) {


    } else {


    //set the entered field names
        $conditionsarray          = $_POST['/claim-details/claim-illness-dueto/claim-illness-due-to'];

        $conditions['data']  = implode(', ',$conditionsarray);

               $data['sections']['claims']['records'][$thisRecord]['related-exposure'] = $conditions['data'];

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



            if ((!empty($_POST['/claim-details/claim-illness-dueto/claim-illness-due-to'])) && (in_array('Chemical exposure', $_POST['/claim-details/claim-illness-dueto/claim-illness-due-to'])) ) {
                    $theURL =  '/applicant/claims/non-specific/chemical-exposure';
                } else {
                    $theURL = '/applicant/claims/non-specific/medical-attention-date';
                }
            }


        if (!empty($_GET['return'])) {
            if ($rURL = cleanURL($_GET['return'])) {
                $theURL = $rURL;
            }
        }

        header("Location: ".$theURL);
        die();

    }



//sort out which ones to display


$showArr = explode(', ',$conditions['data']);

foreach ($showArr as $cur) {
    $conditionschk[$cur] = ' checked';
}





@endphp


@include('framework.header')



    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Is your condition due to exposure to?</h1>
                                <form method="post" enctype="multipart/form-data" novalidate >
                                @csrf
                                                    <div class="govuk-form-group">
    <fieldset class="govuk-fieldset" aria-describedby="contact-hint">

                <div id="contact-hint" class="govuk-hint">Select all that apply.</div>
                <div class="govuk-checkboxes" data-module="govuk-checkboxes">
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="616681290a1ae" name="/claim-details/claim-illness-dueto/claim-illness-due-to[]" type="checkbox"
           value="Cold"    {{$conditionschk['Cold'] ?? ''}}        >
    <label class="govuk-label govuk-checkboxes__label" for="616681290a1ae">Cold</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="616681290a309" name="/claim-details/claim-illness-dueto/claim-illness-due-to[]" type="checkbox"
           value="Heat"       {{$conditionschk['Heat'] ?? ''}}       >
    <label class="govuk-label govuk-checkboxes__label" for="616681290a309">Heat</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="616681290a40e" name="/claim-details/claim-illness-dueto/claim-illness-due-to[]" type="checkbox"
           value="Noise"      {{$conditionschk['Noise'] ?? ''}}        >
    <label class="govuk-label govuk-checkboxes__label" for="616681290a40e">Noise, for example gunfire</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="616681290a52b" name="/claim-details/claim-illness-dueto/claim-illness-due-to[]" type="checkbox"
           value="Vibration"     {{$conditionschk['Vibration'] ?? ''}}         >
    <label class="govuk-label govuk-checkboxes__label" for="616681290a52b">Vibration, for example from using tools</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="616681290a62a" name="/claim-details/claim-illness-dueto/claim-illness-due-to[]" type="checkbox"
           value="Chemical exposure"    {{$conditionschk['Chemical exposure'] ?? ''}}          >
    <label class="govuk-label govuk-checkboxes__label" for="616681290a62a">Chemical exposure</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="616681290a725" name="/claim-details/claim-illness-dueto/claim-illness-due-to[]" type="checkbox"
           value="None of the above"      {{$conditionschk['None of the above'] ?? ''}}        >
    <label class="govuk-label govuk-checkboxes__label" for="616681290a725">None of the above</label>
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
