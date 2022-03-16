@include('framework.functions')
@php



//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();
$servingValidation = 'Y';


//set fields

$dischargereason = array('data'=>'', 'error'=>'', 'errorLabel'=>'');




//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);



//this gets teh current record ID to edit and sets it for reference
if (empty($_GET['servicerecord'])) {

    if (empty($data['settings']['service-details-record-num'])) {
        header("Location: /applicant/about-you/service-details");
        die();
    } else {
        $thisRecord = $data['settings']['service-details-record-num'];
    }

} else {
    $thisRecord = cleanRecordID($_GET['servicerecord']);
    $data['settings']['service-details-record-num'] = $thisRecord;
}


if (empty($_POST)) {
    //load the data if set
    if (!empty($data['sections']['service-details']['records'][$thisRecord]['service-dischargedate'])) {

        $dischargereason['data']           = @$data['sections']['service-details']['records'][$thisRecord]['service-dischargedate']['dischargereason'];





    }
} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {


    if (empty($_POST['afcs/about-you/service-details/service-discharge/service-discharge-reason'])) {

        $data['sections']['service-details']['records'][$thisRecord]['service-dischargedate']['dischargereason'] = '';

    } else {

        $data['sections']['service-details']['records'][$thisRecord]['service-dischargedate']['dischargereason'] = cleanTextData($_POST['afcs/about-you/service-details/service-discharge/service-discharge-reason']);

    }



    if ($servingValidation == 'N') {
    //this means we don't need the validation, so can skip any errors
    //doing thsi means we still update the fields if they have been previously populated
        $errors = 'N';
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

        $theURL = '/applicant/about-you/service-details/add-service/last-unit-address';
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

                                <h1 class="govuk-heading-xl">What was the reason for your discharge?</h1>


            <form method="post" enctype="multipart/form-data" novalidate>
            @csrf



                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="afcs/about-you/service-details/service-discharge/service-discharge-reason">
                   <h2 class="govuk-fieldset__heading">
               <strong> Discharge reason</strong>
            </h2>
    </label>
        <div id="afcs/about-you/service-details/service-enlistment-date/enlistment-date-hint" class="govuk-hint">For example, end of engagement.</div>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="afcs/about-you/service-details/service-discharge/service-discharge-reason" name="afcs/about-you/service-details/service-discharge/service-discharge-reason" type="text"
                   value="{{$dischargereason['data'] ?? ''}}"
            >
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
