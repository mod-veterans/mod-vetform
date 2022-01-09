@include('framework.functions')
@php



//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$exposureday = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$exposuremonth = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$exposureyear = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$exposurelength = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$exposuresubstances = array('data'=>'', 'error'=>'', 'errorLabel'=>'');



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
    if (!empty($data['sections']['claims']['records'][$thisRecord]['exposure-date'])) {
        $exposureday['data']           = @$data['sections']['claims']['records'][$thisRecord]['exposure-date']['day'];
        $exposuremonth['data']           = @$data['sections']['claims']['records'][$thisRecord]['exposure-date']['month'];
        $exposureyear['data']           = @$data['sections']['claims']['records'][$thisRecord]['exposure-date']['year'];
        $exposurelength['data']   = @$data['sections']['claims']['records'][$thisRecord]['exposure-date']['length'];
        $exposuresubstances['data']   = @$data['sections']['claims']['records'][$thisRecord]['exposure-date']['substances'];

    }
} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {


    //set the entered field names
    $exposureday['data'] = cleanTextData($_POST['/claim-details/claim-illness-first-medical-attention-date/claim-surgery-treatment-date-day']);
    $exposuremonth['data'] = cleanTextData($_POST['/claim-details/claim-illness-first-medical-attention-date/claim-surgery-treatment-date-month']);
    $exposureyear['data'] = cleanTextData($_POST['/claim-details/claim-illness-first-medical-attention-date/claim-surgery-treatment-date-year']);



    if (empty($_POST['/claim-details/claim-accident-sporting-medical-condition/claim-accident-sporting-medical-condition'])) {


    } else {

        $data['sections']['claims']['records'][$thisRecord]['exposure-date']['substances'] =  $_POST['/claim-details/claim-accident-sporting-medical-condition/claim-accident-sporting-medical-condition'];

    }


    if (empty($_POST['/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__address-line-2'])) {


    } else {

        $data['sections']['claims']['records'][$thisRecord]['exposure-date']['length'] =  $_POST['/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__address-line-2'];

    }





    if (empty($_POST['/claim-details/claim-illness-first-medical-attention-date/claim-surgery-treatment-date-year'])) {
        $errors = 'Y';
        $errorsList[] = '<a href="/claim-details/claim-illness-first-medical-attention-date/claim-surgery-treatment-date-year">Please give us at least an approximate year</a>';
        $exposureyear['error'] = 'govuk-form-group--error';
        $exposureyear['errorLabel'] =
        '<span id="/claim-details/claim-illness-first-medical-attention-date/claim-surgery-treatment-date-year-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Please give us at least an approximate year
         </span>';

    } else {

        $data['sections']['claims']['records'][$thisRecord]['exposure-date']['year'] = cleanTextData($_POST['/claim-details/claim-illness-first-medical-attention-date/claim-surgery-treatment-date-year']);

    }

    $data['sections']['claims']['records'][$thisRecord]['exposure-date']['month'] = cleanTextData($_POST['/claim-details/claim-illness-first-medical-attention-date/claim-surgery-treatment-date-month']);
    $data['sections']['claims']['records'][$thisRecord]['exposure-date']['day'] = cleanTextData($_POST['/claim-details/claim-illness-first-medical-attention-date/claim-surgery-treatment-date-day']);



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

        $theURL = '/applicant/claims/non-specific/medical-attention-date';
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
                                <h1 class="govuk-heading-xl">Please tell us about your chemical exposure?</h1>
    </legend>
                                <form method="post" enctype="multipart/form-data" novalidate >
                                @csrf
                                    <div class="govuk-form-group {{$exposureyear['error'] ?? ''}} ">
 <div class="govuk-form-group">
        <label class="govuk-label" for="/claim-details/claim-accident-sporting-medical-condition/claim-accident-sporting-medical-condition">
        What substances?
    </label>
                <textarea class="govuk-textarea " id="/claim-details/claim-accident-sporting-medical-condition/claim-accident-sporting-medical-condition"
                  name="/claim-details/claim-accident-sporting-medical-condition/claim-accident-sporting-medical-condition" rows="5"
                                    aria-describedby="">{{$exposuresubstances['data'] ?? ''}}</textarea>
  <div id="with-hint-info" class="govuk-hint govuk-character-count__message" aria-live="polite">
    You can enter up to 200 characters
  </div>
        </div>

    <fieldset class="govuk-fieldset">
@php echo $exposureyear['errorLabel']; @endphp

            <h2 class="govuk-fieldset__heading govuk-!-font-weight-regular">
                Date you were first exposed to these?
            </h2>


        <div id="/claim-details/claim-illness-first-medical-attention-date/claim-surgery-treatment-date-hint" class="govuk-hint">For example 27 3 2007. If you can’t remember, enter an approximate year.</div>

        <div class="govuk-date-input" id="/claim-details/claim-illness-first-medical-attention-date/claim-surgery-treatment-date">
                                                <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="/claim-details/claim-illness-first-medical-attention-date/claim-surgery-treatment-date-day">
                                Day
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-2 "
            id="/claim-details/claim-illness-first-medical-attention-date/claim-surgery-treatment-date-day"
            name="/claim-details/claim-illness-first-medical-attention-date/claim-surgery-treatment-date-day" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="2"
            value="{{$exposureday['data'] ?? ''}}">
    </div>
</div>
                                                    <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="/claim-details/claim-illness-first-medical-attention-date/claim-surgery-treatment-date-month">
                                Month
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-2 "
            id="/claim-details/claim-illness-first-medical-attention-date/claim-surgery-treatment-date-month"
            name="/claim-details/claim-illness-first-medical-attention-date/claim-surgery-treatment-date-month" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="2"
            value="{{$exposuremonth['data'] ?? ''}}">
    </div>
</div>
                                                    <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="/claim-details/claim-illness-first-medical-attention-date/claim-surgery-treatment-date-year">
                                Year
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-4 "
            id="/claim-details/claim-illness-first-medical-attention-date/claim-surgery-treatment-date-year"
            name="/claim-details/claim-illness-first-medical-attention-date/claim-surgery-treatment-date-year" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="4"
            value="{{$exposureyear['data'] ?? ''}}">
    </div>
</div>
                                    </div>
    </fieldset>

                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__address-line-2">
        <span>Length of exposure?</span>
    </label>
            <input
        class="govuk-input  "
        id="/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__address-line-2" name="/claim-details/claim-accident-sporting-surgery-address/claim-accident-sporting-surgery-address__address-line-2" type="text"
         autocomplete="address-line2"
                  value="{{$exposurelength['data'] ?? ''}}"
            >
</div>




                <div class="govuk-form-group">
    <button class="govuk-button govuk-!-margin-right-2" data-module="govuk-button">Save and continue</button>
            <br><a href="/cancel" class="govuk-link"
           data-module="govuk-button">
            Cancel application
        </a>

    </div>
    </div>
            </form>
            </div>
        </div>
        </div>
    </main>
</div>



@include('framework.footer')
