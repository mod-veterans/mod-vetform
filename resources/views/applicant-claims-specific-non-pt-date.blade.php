@include('framework.functions')
@php



//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$conditionday = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$conditionmonth = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$conditionyear = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$conditionapproximate = array('data'=>'', 'error'=>'', 'errorLabel'=>'');



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
    if (!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['condition-start-date'])) {
        $conditionday['data']           = @$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['condition-start-date']['day'];
        $conditionmonth['data']           = @$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['condition-start-date']['month'];
        $conditionyear['data']           = @$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['condition-start-date']['year'];
        $conditionapproximate['data']   = @$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['condition-start-date']['approximate'];

        if ($conditionapproximate['data'] == 'Yes') {
        $approximatechk = ' checked';
        }


    }
} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {


    //set the entered field names
    $conditionday['data'] = cleanTextData($_POST['/claim-details/claim-accident-sporting-date/date-of-injury-incident-day']);
    $conditionmonth['data'] = cleanTextData($_POST['/claim-details/claim-accident-sporting-date/date-of-injury-incident-month']);
    $conditionyear['data'] = cleanTextData($_POST['/claim-details/claim-accident-sporting-date/date-of-injury-incident-year']);


    if ( (!empty($_POST['/claim-details/claim-illness-date/date-of-condition-estimated'])) && ($_POST['/claim-details/claim-illness-date/date-of-condition-estimated'] == 'Yes') ) {




        if (empty($conditionyear['data'])) {
            $errors = 'Y';
            $errorsList[] = '<a href="#afcs/about-you/service-details/service-rank/service-rank">Enter an approximate year</a>';
            $conditionyear['error'] = 'govuk-form-group--error';
            $conditionyear['errorLabel'] =
            '<span id="afcs/about-you/service-details/service-rank/service-rank-error" class="govuk-error-message">
                <span class="govuk-visually-hidden">Error:</span> Enter an approximate year
             </span>';

        } elseif (!yearInFuture($conditionyear['data'])) {

            $errors = 'Y';
            $errorsList[] = '<a href="#afcs/about-you/service-details/service-rank/service-rank">The year entered cannot be in the future</a>';
            $conditionyear['error'] = 'govuk-form-group--error';
            $conditionyear['errorLabel'] =
            '<span id="afcs/about-you/service-details/service-rank/service-rank-error" class="govuk-error-message">
                <span class="govuk-visually-hidden">Error:</span> The year entered cannot be in the future
             </span>';
        }




    } else {


            if ( (empty($conditionday['data'])) || (empty($conditionmonth['data'])) || (empty($conditionyear['data'])) ) {

               $errors = 'Y';
                $errorsList[] = '<a href="#afcs/about-you/service-details/service-rank/service-rank">Enter a valid date. If you do not know the date, tick \'this date is approximate\' and enter a year</a>';
                $conditionyear['error'] = 'govuk-form-group--error';
                $conditionyear['errorLabel'] =
                '<span id="afcs/about-you/service-details/service-rank/service-rank-error" class="govuk-error-message">
                    <span class="govuk-visually-hidden">Error:</span> Enter a valid date. If you do not know the date, tick \'this date is approximate\' and enter a year
                 </span>';


            } elseif ( (!checkDate($conditionmonth['data'], $conditionday['data'], $conditionyear['data']) )  ) {

              $errors = 'Y';
                $errorsList[] = '<a href="#afcs/about-you/service-details/service-rank/service-rank">The date entered must be a real date</a>';
                $conditionyear['error'] = 'govuk-form-group--error';
                $conditionyear['errorLabel'] =
                '<span id="afcs/about-you/service-details/service-rank/service-rank-error" class="govuk-error-message">
                    <span class="govuk-visually-hidden">Error:</span>The date entered must be a real date
                 </span>';

            }

            if (!dateInFuture($conditionmonth['data'],$conditionday['data'],$conditionyear['data'])) {

             $errors = 'Y';
                $errorsList[] = '<a href="#afcs/about-you/service-details/service-rank/service-rank">The date entered cannot be in the future</a>';
                $conditionyear['error'] = 'govuk-form-group--error';
                $conditionyear['errorLabel'] =
                '<span id="afcs/about-you/service-details/service-rank/service-rank-error" class="govuk-error-message">
                    <span class="govuk-visually-hidden">Error:</span> The date entered cannot be in the future
                 </span>';


            }



    }

    $data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['condition-start-date']['year'] = cleanTextData($_POST['/claim-details/claim-accident-sporting-date/date-of-injury-incident-year']);
    $data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['condition-start-date']['month'] = cleanTextData($_POST['/claim-details/claim-accident-sporting-date/date-of-injury-incident-month']);
    $data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['condition-start-date']['day'] = cleanTextData($_POST['/claim-details/claim-accident-sporting-date/date-of-injury-incident-day']);


    if ( (!empty($_POST['/claim-details/claim-illness-date/date-of-condition-estimated'])) && ($_POST['/claim-details/claim-illness-date/date-of-condition-estimated'] == 'Yes')) {
        $data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['condition-start-date']['approximate'] = cleanTextData($_POST['/claim-details/claim-illness-date/date-of-condition-estimated']);
        $approximatechk = ' checked';
     } else {

         $data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['condition-start-date']['approximate'] = '';

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

        $theURL = '/applicant/claims/specific/non-pt/on-duty';
        if (!empty($_GET['return'])) {
            if ($rURL = cleanURL($_GET['return'])) {
                $theURL = $rURL;
            }
        }

        header("Location: ".$theURL);
        die();

    }

}

$page_title = 'What was the date of the incident or accident?';

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
                                <h1 class="govuk-heading-xl">What was the date of the incident or accident?</h1>
    </legend>
                                <form method="post" enctype="multipart/form-data" novalidate >
                                @csrf
                                                    <div class="govuk-form-group ">
    <input name="/claim-details/claim-accident-sporting-date/date-of-injury-incident-year" type="hidden" value="">
</div>
                                    <div
    class="govuk-form-group {{$conditionyear['error']}} "
    aria-describedby="/claim-details/claim-accident-sporting-date/date-of-injury-incident-hint  ">

    <fieldset class="govuk-fieldset">
@php echo $conditionyear['errorLabel']; @endphp


        <div id="/claim-details/claim-accident-sporting-date/date-of-injury-incident-hint" class="govuk-hint">For example 27 3 2007. If you cannot remember, enter an approximate year.</div>

        <div class="govuk-date-input" id="/claim-details/claim-accident-sporting-date/date-of-injury-incident">
                                                <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="/claim-details/claim-accident-sporting-date/date-of-injury-incident-day">
                                Day
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-2 "
            id="/claim-details/claim-accident-sporting-date/date-of-injury-incident-day"
            name="/claim-details/claim-accident-sporting-date/date-of-injury-incident-day" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="2"
            value="{{$conditionday['data']}}">
    </div>
</div>
                                                    <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="/claim-details/claim-accident-sporting-date/date-of-injury-incident-month">
                                Month
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-2 "
            id="/claim-details/claim-accident-sporting-date/date-of-injury-incident-month"
            name="/claim-details/claim-accident-sporting-date/date-of-injury-incident-month" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="2"
            value="{{$conditionmonth['data']}}">
    </div>
</div>
                                                    <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="/claim-details/claim-accident-sporting-date/date-of-injury-incident-year">
                                Year
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-4 "
            id="/claim-details/claim-accident-sporting-date/date-of-injury-incident-year"
            name="/claim-details/claim-accident-sporting-date/date-of-injury-incident-year" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="4"
            value="{{$conditionyear['data']}}">
    </div>
</div>
                                    </div>
    </fieldset>

    <br />
                                        <div class="govuk-checkboxes__item">
            <input id="6166806a32c4a--default" name="/claim-details/claim-illness-date/date-of-condition-estimated" type="hidden" value="No">
        <input class="govuk-checkboxes__input" id="6166806a32c4a" name="/claim-details/claim-illness-date/date-of-condition-estimated" type="checkbox"
           value="Yes"     {{$approximatechk ?? ''}}       >
    <label class="govuk-label govuk-checkboxes__label" for="6166806a32c4a">Tick if this date is approximate</label>
</div>

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
