@include('framework.functions')
@php



//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$cililianref = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$militaryref = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$dontknow = array('data'=>'', 'error'=>'', 'errorLabel'=>'');



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
    if (!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['police-report'])) {
        $civilianref['data']           = @$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['police-report']['civilian-ref'];
        $militaryref['data']           = @$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['police-report']['military-ref'];
        $dontknow['data']           = @$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['police-report']['dontknow'];

        if ($dontknow['data'] == 'Yes') {
        $dontknowchk = ' checked';
        }


    }
} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {


    //set the entered field names
    $civilianref['data'] = cleanTextData($_POST['/claim-details/claim-accident-police-ref/claim-accident-non-sporting-police-ref']);
    $militaryref['data'] = cleanTextData($_POST['/claim-details/claim-accident-police-ref/claim-accident-non-sporting-military-ref']);
    $dontknow['data'] = cleanTextData($_POST['/claim-details/claim-accident-police-ref/claim-accident-non-sporting-ref-unknown']);




    $data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['police-report']['civilian-ref'] = cleanTextData($_POST['/claim-details/claim-accident-police-ref/claim-accident-non-sporting-police-ref']);


    $data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['police-report']['military-ref'] = cleanTextData($_POST['/claim-details/claim-accident-police-ref/claim-accident-non-sporting-military-ref']);


    if ( (!empty($_POST['/claim-details/claim-accident-police-ref/claim-accident-non-sporting-ref-unknown'])) && ($_POST['/claim-details/claim-accident-police-ref/claim-accident-non-sporting-ref-unknown'] == 'Yes')) {
        $data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['police-report']['dontknow'] = cleanTextData($_POST['/claim-details/claim-accident-police-ref/claim-accident-non-sporting-ref-unknown']);
        $dontknowchk = ' checked';
     } else {

         $data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['police-report']['dontknow'] = '';

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

        $theURL = '/applicant/claims/specific/non-pt/authorised-leave';
        if (!empty($_GET['return'])) {
            if ($rURL = cleanURL($_GET['return'])) {
                $theURL = $rURL;
            }
        }

        header("Location: ".$theURL);
        die();

    }

}

$page_title = 'Tell us the police reference number (if known)';

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
                                <h1 class="govuk-heading-xl">Tell us the police reference number (if known)</h1>
                                </legend>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="/claim-details/claim-accident-police-ref/claim-accident-non-sporting-police-ref">
        Civilian - case ref
    </label>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/claim-details/claim-accident-police-ref/claim-accident-non-sporting-police-ref" name="/claim-details/claim-accident-police-ref/claim-accident-non-sporting-police-ref" type="text"
                   value="{{$civilianref['data'] ?? ''}}"
            >
</div>
                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="/claim-details/claim-accident-police-ref/claim-accident-non-sporting-military-ref">
        Military - case ref
    </label>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/claim-details/claim-accident-police-ref/claim-accident-non-sporting-military-ref" name="/claim-details/claim-accident-police-ref/claim-accident-non-sporting-military-ref" type="text"
                   value="{{$militaryref['data'] ?? ''}}"
            >
</div>
                                    <div class="govuk-checkboxes__item">
            <input id="61667bb647352--default" name="/claim-details/claim-accident-police-ref/claim-accident-non-sporting-ref-unknown" type="hidden" value="No">
        <input class="govuk-checkboxes__input" id="61667bb647352" name="/claim-details/claim-accident-police-ref/claim-accident-non-sporting-ref-unknown" type="checkbox"
           value="Yes"    {{$dontknowchk ?? ''}}        >
    <label class="govuk-label govuk-checkboxes__label" for="61667bb647352">I do not know</label>
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
