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
    if (!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['downgraded-start'])) {
        $datefromday['data']           = @$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['downgraded-start']['fromday'];
        $datefrommonth['data']           = @$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['downgraded-start']['frommonth'];
        $datefromyear['data']           = @$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['downgraded-start']['fromyear'];
        $datesapproximate['data']   = @$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['downgraded-start']['datesapproximate'];

        if ($datesapproximate['data'] == 'Yes') {
        $datesapproximatechk = ' checked';
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


 if ( (!empty($_POST['/claim-details/claim-illness-date/date-of-datefrom-estimated'])) && ($_POST['/claim-details/claim-illness-date/date-of-datefrom-estimated'] == 'Yes') ) {




        if (empty($datefromyear['data'])) {
            $errors = 'Y';
            $errorsList[] = '<a href="#afcs/about-you/service-details/service-rank/service-rank">Enter an approximate year</a>';
            $datefromyear['error'] = 'govuk-form-group--error';
            $datefromyear['errorLabel'] =
            '<span id="afcs/about-you/service-details/service-rank/service-rank-error" class="govuk-error-message">
                <span class="govuk-visually-hidden">Error:</span> Enter an approximate year
             </span>';

        } elseif (!yearInFuture($datefromyear['data'])) {

            $errors = 'Y';
            $errorsList[] = '<a href="#afcs/about-you/service-details/service-rank/service-rank">The year entered cannot be in the future</a>';
            $datefromyear['error'] = 'govuk-form-group--error';
            $datefromyear['errorLabel'] =
            '<span id="afcs/about-you/service-details/service-rank/service-rank-error" class="govuk-error-message">
                <span class="govuk-visually-hidden">Error:</span> The year entered cannot be in the future
             </span>';
        }




    } else {


            if ( (empty($datefromday['data'])) || (empty($datefrommonth['data'])) || (empty($datefromyear['data'])) ) {

               $errors = 'Y';
                $errorsList[] = '<a href="#afcs/about-you/service-details/service-rank/service-rank">Enter a valid date. If you do not know the date, tick \'this date is approximate\' and enter a year</a>';
                $datefromyear['error'] = 'govuk-form-group--error';
                $datefromyear['errorLabel'] =
                '<span id="afcs/about-you/service-details/service-rank/service-rank-error" class="govuk-error-message">
                    <span class="govuk-visually-hidden">Error:</span> Enter a valid date. If you do not know the date, tick \'this date is approximate\' and enter a year
                 </span>';


            } elseif ( (!checkDate($datefrommonth['data'], $datefromday['data'], $datefromyear['data']) )  ) {

              $errors = 'Y';
                $errorsList[] = '<a href="#afcs/about-you/service-details/service-rank/service-rank">The date entered must be a real date</a>';
                $datefromyear['error'] = 'govuk-form-group--error';
                $datefromyear['errorLabel'] =
                '<span id="afcs/about-you/service-details/service-rank/service-rank-error" class="govuk-error-message">
                    <span class="govuk-visually-hidden">Error:</span>The date entered must be a real date
                 </span>';

            }

            if (!dateInFuture($datefrommonth['data'],$datefromday['data'],$datefromyear['data'])) {

             $errors = 'Y';
                $errorsList[] = '<a href="#afcs/about-you/service-details/service-rank/service-rank">The date entered cannot be in the future</a>';
                $datefromyear['error'] = 'govuk-form-group--error';
                $datefromyear['errorLabel'] =
                '<span id="afcs/about-you/service-details/service-rank/service-rank-error" class="govuk-error-message">
                    <span class="govuk-visually-hidden">Error:</span> The date entered cannot be in the future
                 </span>';


            }



    }





    $data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['downgraded-start']['fromyear'] = cleanTextData($_POST['/claim-details/claim-downgraded-dates/date-from-year']);
    $data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['downgraded-start']['frommonth'] = cleanTextData($_POST['/claim-details/claim-downgraded-dates/date-from-month']);
    $data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['downgraded-start']['fromday'] = cleanTextData($_POST['/claim-details/claim-downgraded-dates/date-from-day']);


    if ( (!empty($_POST['/claim-details/claim-illness-date/date-of-datefrom-estimated'])) && ($_POST['/claim-details/claim-illness-date/date-of-datefrom-estimated'] == 'Yes')) {
        $data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['downgraded-start']['datesapproximate'] = cleanTextData($_POST['/claim-details/claim-illness-date/date-of-datefrom-estimated']);
        $datesapproximatechk = ' checked';
     } else {

         $data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['downgraded-start']['datesapproximate'] = '';

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

        $theURL = '/applicant/claims/specific/downgraded/end';
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
                                <h1 class="govuk-heading-xl">When did your downgrading start?</h1>
    </legend>
    <p class="govuk-body">If you were downgraded and upgraded more than once, enter the date you were first downgraded.<br /><br />For example 27 3 2007. If you cannot remember, enter an approximate year.</p>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group {{$datetoday['error'] ?? ''}} {{$datetoyear['error'] ?? ''}} ">
    <input name="/claim-details/claim-downgraded-dates/date-from-year" type="hidden" value="">
</div>
                                    <div
    class="govuk-form-group {{$datefromyear['error'] ?? ''}}"
    aria-describedby="/claim-details/claim-downgraded-dates/date-from-hint  ">

    <fieldset class="govuk-fieldset">
@php echo $datefromyear['errorLabel']; @endphp

        <div id="/claim-details/claim-downgraded-dates/date-from-hint" class="govuk-hint"></div>

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

        <br />
                                        <div class="govuk-checkboxes__item">
            <input id="/claim-details/claim-illness-date/date-of-datefrom-estimated" name="/claim-details/claim-illness-date/date-of-datefrom-estimated" type="hidden" value="No">
        <input class="govuk-checkboxes__input" id="6166806a32c4a" name="/claim-details/claim-illness-date/date-of-datefrom-estimated" type="checkbox"
           value="Yes"     {{$datesapproximatechk ?? ''}}        >
    <label class="govuk-label govuk-checkboxes__label" for="6166806a32c4a">Tick if this date is approximate</label>
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
