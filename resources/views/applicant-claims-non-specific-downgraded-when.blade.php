@include('framework.functions')
@php



//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$datefromday = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$datefrommonth = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$datefromyear = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$datetoday = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$datetomonth = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$datetoyear = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$stilldowngraded = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$datesapproximate = array('data'=>'', 'error'=>'', 'errorLabel'=>'');



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
    if (!empty($data['sections']['claims']['records'][$thisRecord]['non-specific']['downgraded'])) {
        $datefromday['data']           = @$data['sections']['claims']['records'][$thisRecord]['non-specific']['downgraded']['fromday'];
        $datefrommonth['data']           = @$data['sections']['claims']['records'][$thisRecord]['non-specific']['downgraded']['frommonth'];
        $datefromyear['data']           = @$data['sections']['claims']['records'][$thisRecord]['non-specific']['downgraded']['fromyear'];
        $datetoday['data']           = @$data['sections']['claims']['records'][$thisRecord]['non-specific']['downgraded']['fromday'];
        $datetomonth['data']           = @$data['sections']['claims']['records'][$thisRecord]['non-specific']['downgraded']['frommonth'];
        $datetoyear['data']           = @$data['sections']['claims']['records'][$thisRecord]['non-specific']['downgraded']['fromyear'];
        $stilldowngraded['data']   = @$data['sections']['claims']['records'][$thisRecord]['non-specific']['downgraded']['stilldowngraded'];
        $datesapproximate['data']   = @$data['sections']['claims']['records'][$thisRecord]['non-specific']['downgraded']['datesapproximate'];

        if ($datesapproximate['data'] == 'Yes') {
        $datesapproximatechk = ' checked';
        }
        if ($stilldowngraded['data'] == 'Yes') {
        $stilldowngradedchk = ' checked';
        }



    }
} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {


    //set the entered field names
    $datefromday['data'] = cleanTextData($_POST['/claim-details/claim-downgraded-dates/date-from-day']);
    $datefrommonth['data'] = cleanTextData($_POST['/claim-details/claim-downgraded-dates/date-from-month']);
    $datefromyear['data'] = cleanTextData($_POST['/claim-details/claim-downgraded-dates/date-from-year']);

    $datetoday['data'] = cleanTextData($_POST['/claim-details/claim-downgraded-dates/date-to-day']);
    $datetomonth['data'] = cleanTextData($_POST['/claim-details/claim-downgraded-dates/date-to-month']);
    $datetoyear['data'] = cleanTextData($_POST['/claim-details/claim-downgraded-dates/date-to-year']);


    if (empty($_POST['/claim-details/claim-downgraded-dates/date-from-year'])) {
        $errors = 'Y';
        $errorsList[] = '<a href="/claim-details/claim-downgraded-dates/date-from-year">Please give us at least an approximate year from</a>';
        $datefromyear['error'] = 'govuk-form-group--error';
        $datefromyear['errorLabel'] =
        '<span id="/claim-details/claim-downgraded-dates/date-from-year-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Please give us at least an approximate year from
         </span>';

    } else {

        $data['sections']['claims']['records'][$thisRecord]['non-specific']['downgraded']['fromyear'] = cleanTextData($_POST['/claim-details/claim-downgraded-dates/date-from-year']);

    }

    $data['sections']['claims']['records'][$thisRecord]['non-specific']['downgraded']['frommonth'] = cleanTextData($_POST['/claim-details/claim-downgraded-dates/date-from-month']);
    $data['sections']['claims']['records'][$thisRecord]['non-specific']['downgraded']['fromday'] = cleanTextData($_POST['/claim-details/claim-downgraded-dates/date-from-day']);


    if ( (!empty($_POST['/claim-details/claim-illness-date/date-of-datefrom-estimated'])) && ($_POST['/claim-details/claim-illness-date/date-of-datefrom-estimated'] == 'Yes')) {
        $data['sections']['claims']['records'][$thisRecord]['non-specific']['downgraded']['datesapproximate'] = cleanTextData($_POST['/claim-details/claim-illness-date/date-of-datefrom-estimated']);
        $datesapproximatechk = ' checked';
     } else {

         $data['sections']['claims']['records'][$thisRecord]['non-specific']['downgraded']['datesapproximate'] = '';

    }

    if (empty($_POST['/claim-details/claim-downgraded-dates/date-to-year'])) {
        $errors = 'Y';
        $errorsList[] = '<a href="/claim-details/claim-downgraded-dates/date-from-year">Please give us at least an approximate year to</a>';
        $datetoyear['error'] = 'govuk-form-group--error';
        $datetoyear['errorLabel'] =
        '<span id="/claim-details/claim-downgraded-dates/date-from-year-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Please give us at least an approximate year to
         </span>';

    } else {

        $data['sections']['claims']['records'][$thisRecord]['non-specific']['downgraded']['toyear'] = cleanTextData($_POST['/claim-details/claim-downgraded-dates/date-to-year']);

    }

    $data['sections']['claims']['records'][$thisRecord]['non-specific']['downgraded']['tomonth'] = cleanTextData($_POST['/claim-details/claim-downgraded-dates/date-to-month']);
    $data['sections']['claims']['records'][$thisRecord]['non-specific']['downgraded']['today'] = cleanTextData($_POST['/claim-details/claim-downgraded-dates/date-to-day']);


    if ( (!empty($_POST['/claim-details/claim-illness-date/still-downgraded'])) && ($_POST['/claim-details/claim-illness-date/still-downgraded'] == 'Yes')) {
        $data['sections']['claims']['records'][$thisRecord]['non-specific']['downgraded']['stilldowngraded'] = cleanTextData($_POST['/claim-details/claim-illness-date/still-downgraded']);
        $stilldowngradedchk = ' checked';
     } else {

         $data['sections']['claims']['records'][$thisRecord]['non-specific']['downgraded']['stilldowngraded'] = '';

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

        $theURL = '/applicant/claims/non-specific/downgraded/detail';
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
                                <h1 class="govuk-heading-xl">When were you downgraded?</h1>
    </legend>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group {{$datetoday['error'] ?? ''}} {{$datetoyear['error'] ?? ''}} ">
    <input name="/claim-details/claim-downgraded-dates/date-from-year" type="hidden" value="">
</div>
                                    <div
    class="govuk-form-group "
    aria-describedby="/claim-details/claim-downgraded-dates/date-from-hint  ">

    <fieldset class="govuk-fieldset">
@php echo $datefromyear['errorLabel']; @endphp
        <div class="govuk-fieldset__legend govuk-fieldset__legend--s">
            <h2 class="govuk-fieldset__heading govuk-!-font-weight-regular">
                Date from
            </h2>
        </div>


        <div id="/claim-details/claim-downgraded-dates/date-from-hint" class="govuk-hint">If you were downgraded and upgraded more than once, enter the date you were first downgraded. For example 27 3 2007. If you can’t remember, enter an approximate year.</div>

        <div class="govuk-date-input" id="/claim-details/claim-downgraded-dates/date-from">
                                                <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="/claim-details/claim-downgraded-dates/date-from-day">
                                Day
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-2 "
            id="/claim-details/claim-downgraded-dates/date-from-day"
            name="/claim-details/claim-downgraded-dates/date-from-day" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="2"
            value="{{$datefromday['data']}}">
    </div>
</div>
                                                    <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="/claim-details/claim-downgraded-dates/date-from-month">
                                Month
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-2 "
            id="/claim-details/claim-downgraded-dates/date-from-month"
            name="/claim-details/claim-downgraded-dates/date-from-month" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="2"
            value="{{$datefrommonth['data']}}">
    </div>
</div>
                                                    <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="/claim-details/claim-downgraded-dates/date-from-year">
                                Year
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-4 "
            id="/claim-details/claim-downgraded-dates/date-from-year"
            name="/claim-details/claim-downgraded-dates/date-from-year" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="4"
            value="{{$datefromyear['data']}}">
    </div>
</div>
                                    </div>
    </fieldset>

</div>
                                    <div class="govuk-form-group ">
    <input name="/claim-details/claim-downgraded-dates/date-to-year" type="hidden" value="">
</div>
                                    <div
    class="govuk-form-group "
    aria-describedby="/claim-details/claim-downgraded-dates/date-to-hint  ">

    <fieldset class="govuk-fieldset">
@php echo $datetoyear['errorLabel']; @endphp
        <div class="govuk-fieldset__legend govuk-fieldset__legend--s">
            <h2 class="govuk-fieldset__heading govuk-!-font-weight-regular">
                Date to
            </h2>
        </div>


        <div id="/claim-details/claim-downgraded-dates/date-to-hint" class="govuk-hint">If you were downgraded and upgraded more than once, enter the date your last downgrading ended. For example 27 3 2007. If you can’t remember, enter an approximate year.</div>

        <div class="govuk-date-input" id="/claim-details/claim-downgraded-dates/date-to">
                                                <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="/claim-details/claim-downgraded-dates/date-to-day">
                                Day
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-2 "
            id="/claim-details/claim-downgraded-dates/date-to-day"
            name="/claim-details/claim-downgraded-dates/date-to-day" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="2"
            value="{{$datetoday['data']}}">
    </div>
</div>
                                                    <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="/claim-details/claim-downgraded-dates/date-to-month">
                                Month
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-2 "
            id="/claim-details/claim-downgraded-dates/date-to-month"
            name="/claim-details/claim-downgraded-dates/date-to-month" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="2"
            value="{{$datetomonth['data']}}">
    </div>
</div>
                                                    <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="/claim-details/claim-downgraded-dates/date-to-year">
                                Year
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-4 "
            id="/claim-details/claim-downgraded-dates/date-to-year"
            name="/claim-details/claim-downgraded-dates/date-to-year" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="4"
            value="{{$datetoyear['data']}}">
    </div>
</div>
                                    </div>
    </fieldset>
        <br />
                                        <div class="govuk-checkboxes__item">
            <input id="/claim-details/claim-illness-date/date-of-datefrom-estimated" name="/claim-details/claim-illness-date/date-of-datefrom-estimated" type="hidden" value="No">
        <input class="govuk-checkboxes__input" id="6166806a32c4a" name="/claim-details/claim-illness-date/date-of-datefrom-estimated" type="checkbox"
           value="Yes"     {{$datesapproximatechk ?? ''}}        >
    <label class="govuk-label govuk-checkboxes__label" for="6166806a32c4a">Tick if these dates are approximate</label>
</div>


    <br />
                                        <div class="govuk-checkboxes__item">
            <input id="/claim-details/claim-illness-date/still-downgraded" name="/claim-details/claim-illness-date/still-downgraded" type="hidden" value="No">
        <input class="govuk-checkboxes__input" id="6166806a32c4a" name="/claim-details/claim-illness-date/still-downgraded" type="checkbox"
           value="Yes"    {{$stilldowngradedchk ?? ''}}        >
    <label class="govuk-label govuk-checkboxes__label" for="6166806a32c4a">I am still downgraded / was downgraded at discharge</label>
</div>



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
