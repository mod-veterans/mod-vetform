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
$dischargeday = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$dischargemonth = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$dischargeyear = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$dischargeapproximate = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$stillserving = array('data'=>'', 'error'=>'', 'errorLabel'=>'');



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
        $dischargeday['data']           = @$data['sections']['service-details']['records'][$thisRecord]['service-dischargedate']['day'];
        $dischargemonth['data']           = @$data['sections']['service-details']['records'][$thisRecord]['service-dischargedate']['month'];
        $dischargeyear['data']           = @$data['sections']['service-details']['records'][$thisRecord]['service-dischargedate']['year'];
        $dischargeapproximate['data']   = @$data['sections']['service-details']['records'][$thisRecord]['service-dischargedate']['approximate'];
        $stillserving['data']           = @$data['sections']['service-details']['records'][$thisRecord]['service-dischargedate']['stillserving'];


        if ($dischargeapproximate['data'] == 'Yes') {
        $approximatechk = ' checked';
        }

        if ($stillserving['data'] == 'Yes') {
        $stillservingchk = ' checked';
        }


    }
} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {


    //set the entered field names
    $enlistmentday['data'] = cleanTextData($_POST['afcs/about-you/service-details/service-discharge/date-of-discharge-day']);
    $enlistmentmonth['data'] = cleanTextData($_POST['afcs/about-you/service-details/service-discharge/date-of-discharge-month']);
    $enlistmentyear['data'] = cleanTextData($_POST['afcs/about-you/service-details/service-discharge/date-of-discharge-year']);



    if (empty($_POST['afcs/about-you/service-details/service-discharge/service-is-serving'])) {

        $data['sections']['service-details']['records'][$thisRecord]['service-dischargedate']['stillserving'] = '';
        $theURL = '/applicant/about-you/service-details/add-service/discharge-reason';

    } else {


        $data['sections']['service-details']['records'][$thisRecord]['service-dischargedate']['stillserving'] = cleanTextData($_POST['afcs/about-you/service-details/service-discharge/service-is-serving']);
        $stillservingchk = ' checked';
        $servingValidation = 'N';
        $theURL = '/applicant/about-you/service-details/add-service/check-answers';

    }






    if (empty($_POST['afcs/about-you/service-details/service-discharge/date-of-discharge-year'])) {
        $data['sections']['service-details']['records'][$thisRecord]['service-dischargedate']['year'] = '';
        $errors = 'Y';
        $errorsList[] = '<a href="#afcs/about-you/service-details/service-rank/service-rank">Please give us at least an approximate year</a>';
        $dischargeyear['error'] = 'govuk-form-group--error';
        $dischargeyear['errorLabel'] =
        '<span id="afcs/about-you/service-details/service-discharge/date-of-discharge-year-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Please give us at least an approximate year
         </span>';

    } else {

        $data['sections']['service-details']['records'][$thisRecord]['service-dischargedate']['year'] = cleanTextData($_POST['afcs/about-you/service-details/service-discharge/date-of-discharge-year']);

    }

    $data['sections']['service-details']['records'][$thisRecord]['service-dischargedate']['month'] = cleanTextData($_POST['afcs/about-you/service-details/service-discharge/date-of-discharge-month']);
    $data['sections']['service-details']['records'][$thisRecord]['service-dischargedate']['day'] = cleanTextData($_POST['afcs/about-you/service-details/service-discharge/date-of-discharge-day']);





    if (empty($_POST['afcs/about-you/service-details/service-discharge/date-is-approximate'])) {

        $data['sections']['service-details']['records'][$thisRecord]['service-dischargedate']['approximate'] = '';

    } else {


        $data['sections']['service-details']['records'][$thisRecord]['service-dischargedate']['approximate'] = cleanTextData($_POST['afcs/about-you/service-details/service-discharge/date-is-approximate']);
        $approximatechk = ' checked';

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

                                <h1 class="govuk-heading-xl">What was your discharge date?</h1>
                                <p class="govuk-body">Tell us the date this period of service ended, unless still serving. </p>

            <form method="post" enctype="multipart/form-data" novalidate>
            @csrf

                                    <div class="govuk-form-group">
</div>
                                    <div
    class="govuk-form-group {{$dischargeyear['error']}} "
    aria-describedby="afcs/about-you/service-details/service-discharge/date-of-discharge-hint  ">

    <fieldset class="govuk-fieldset">
        <legend class="govuk-fieldset__legend govuk-fieldset__legend--s">
            <h2 class="govuk-fieldset__heading">
                Date of discharge
            </h2>
        </legend>
@php echo $dischargeyear['errorLabel']; @endphp
        <div id="afcs/about-you/service-details/service-discharge/date-of-discharge-hint" class="govuk-hint">For example 27 3 2007. If you can’t remember, enter an approximate year.</div>

        <div class="govuk-date-input" id="afcs/about-you/service-details/service-discharge/date-of-discharge">
                                                <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="afcs/about-you/service-details/service-discharge/date-of-discharge-day">
                                Day
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-2 "
            id="afcs/about-you/service-details/service-discharge/date-of-discharge-day"
            name="afcs/about-you/service-details/service-discharge/date-of-discharge-day" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="2"
            value="{{$dischargeday['data']}}">
    </div>
</div>
                                                    <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="afcs/about-you/service-details/service-discharge/date-of-discharge-month">
                                Month
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-2 "
            id="afcs/about-you/service-details/service-discharge/date-of-discharge-month"
            name="afcs/about-you/service-details/service-discharge/date-of-discharge-month" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="2"
            value="{{$dischargemonth['data']}}">
    </div>
</div>
                                                    <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="afcs/about-you/service-details/service-discharge/date-of-discharge-year">
                                Year
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-4 "
            id="afcs/about-you/service-details/service-discharge/date-of-discharge-year"
            name="afcs/about-you/service-details/service-discharge/date-of-discharge-year" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="4"
            value="{{$dischargeyear['data']}}">
    </div>
</div>


                                    </div>
<br />
        <div class="govuk-checkboxes__item">

        <input class="govuk-checkboxes__input" id="afcs/about-you/service-details/service-discharge/date-is-approximate" name="afcs/about-you/service-details/service-discharge/date-is-approximate" type="checkbox"
           value="Yes"      @php echo $approximatechk ?? ''; @endphp    >
    <label class="govuk-label govuk-checkboxes__label" for="afcs/about-you/service-details/service-discharge/date-is-approximate">This date is approximate</label>
</div>



 <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="afcs/about-you/service-details/service-discharge/service-is-serving" name="afcs/about-you/service-details/service-discharge/service-is-serving" type="checkbox"
           value="Yes"      @php echo @$stillservingchk; @endphp      >
    <label class="govuk-label govuk-checkboxes__label" for="afcs/about-you/service-details/service-discharge/service-is-serving">I am still serving</label>
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
