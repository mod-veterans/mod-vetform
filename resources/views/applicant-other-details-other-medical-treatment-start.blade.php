@include('framework.functions')
@php



//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$treatmentday = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$treatmentmonth = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$treatmentyear = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$treatmentapproximate = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$treatmentwaiting = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);



//this gets teh current record ID to edit and sets it for reference
if (empty($_GET['medicalrecord'])) {

    if (empty($data['settings']['medical-treatment-record-num'])) {
        header("Location: /applicant/other-details/other-medical-treatment");
        die();
    } else {
        $thisRecord = $data['settings']['medical-treatment-record-num'];
    }

} else {
    $thisRecord = cleanRecordID($_GET['medicalrecord']);
    $data['settings']['medical-treatment-record-num'] = $thisRecord;
}


if (empty($_POST)) {
    //load the data if set
    if (!empty($data['sections']['medical-treatment']['records'][$thisRecord]['treatment-start'])) {
        $treatmentday['data']           = @$data['sections']['medical-treatment']['records'][$thisRecord]['treatment-start']['day'];
        $treatmentmonth['data']           = @$data['sections']['medical-treatment']['records'][$thisRecord]['treatment-start']['month'];
        $treatmentyear['data']           = @$data['sections']['medical-treatment']['records'][$thisRecord]['treatment-start']['year'];
        $treatmentapproximate['data']   = @$data['sections']['medical-treatment']['records'][$thisRecord]['treatment-start']['approximate'];
        $treatmentwaiting['data']   = @$data['sections']['medical-treatment']['records'][$thisRecord]['treatment-start']['waiting-list'];

        if ($treatmentapproximate['data'] == 'Yes') {
        $approximatechk = ' checked';
        }

        if ($treatmentwaiting['data'] == 'Yes') {
        $waitingchk = ' checked';
        }




    }
} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {


    //set the entered field names
    $treatmentday['data'] = cleanTextData($_POST['/other-medical-treatment-start-date/medical-treatment-start-date-day']);
    $treatmentmonth['data'] = cleanTextData($_POST['/other-medical-treatment-start-date/medical-treatment-start-date-month']);
    $treatmentyear['data'] = cleanTextData($_POST['/other-medical-treatment-start-date/medical-treatment-start-date-year']);



   if ( (empty($_POST['/other-medical-treatment-start-date/medical-treatment-start-date-waiting-list']))  ) {

        if ( (!empty($_POST['/other-medical-treatment-start-date/medical-treatment-start-date-estimated'])) && ($_POST['/other-medical-treatment-start-date/medical-treatment-start-date-estimated'] == 'Yes') ) {


                if (empty($treatmentyear['data'])) {
                    $errors = 'Y';
                    $errorsList[] = '<a href="#/other-medical-treatment-start-date/medical-treatment-start-date-year">Enter an approximate year</a>';
                    $treatmentyear['error'] = 'govuk-form-group--error';
                    $treatmentyear['errorLabel'] =
                    '<span id="afcs/about-you/service-details/service-rank/service-rank-error" class="govuk-error-message">
                        <span class="govuk-visually-hidden">Error:</span> Enter an approximate year
                     </span>';

                } elseif (!yearInFuture($treatmentyear['data'])) {

                    $errors = 'Y';
                    $errorsList[] = '<a href="#/other-medical-treatment-start-date/medical-treatment-start-date-day">The date entered cannot be in the future</a>';
                    $treatmentyear['error'] = 'govuk-form-group--error';
                    $treatmentyeare['errorLabel'] =
                    '<span id="afcs/about-you/service-details/service-rank/service-rank-error" class="govuk-error-message">
                        <span class="govuk-visually-hidden">Error:</span> The year entered cannot be more than 2 years in the future
                     </span>';
                }



            } else {


                if ( (empty($treatmentday['data'])) || (empty($treatmentmonth['data'])) || (empty($treatmentyear['data'])) ) {

                   $errors = 'Y';
                    $errorsList[] = '<a href="#/other-medical-treatment-start-date/medical-treatment-start-date-day">Enter a valid date. If you do not know the date, tick \'this date is approximate\' and enter a year</a>';
                    $treatmentyear['error'] = 'govuk-form-group--error';
                    $treatmentyear['errorLabel'] =
                    '<span id="afcs/about-you/service-details/service-rank/service-rank-error" class="govuk-error-message">
                        <span class="govuk-visually-hidden">Error:</span> Enter a valid date. If you do not know the date, tick \'this date is approximate\' and enter a year
                     </span>';


                }  elseif (!yearInFuture($treatmentyear['data'])) {

                 $errors = 'Y';
                    $errorsList[] = '<a href="#/other-medical-treatment-start-date/medical-treatment-start-date-day">The date entered cannot be in the future</a>';
                    $treatmentyear['error'] = 'govuk-form-group--error';
                    $treatmentyear['errorLabel'] =
                    '<span id="afcs/about-you/service-details/service-rank/service-rank-error" class="govuk-error-message">
                        <span class="govuk-visually-hidden">Error:</span> The date entered cannot be in the future
                     </span>';


                } elseif ( (!checkDate($treatmentmonth['data'], $treatmentday['data'], $treatmentyear['data']) )  ) {

                  $errors = 'Y';
                    $errorsList[] = '<a href="#/other-medical-treatment-start-date/medical-treatment-start-date-day">The date entered must be a real date</a>';
                    $treatmentyear['error'] = 'govuk-form-group--error';
                    $treatmentyear['errorLabel'] =
                    '<span id="afcs/about-you/service-details/service-rank/service-rank-error" class="govuk-error-message">
                        <span class="govuk-visually-hidden">Error:</span>The date entered must be a real date
                     </span>';

                }

            }

    }


    if (empty($_POST['/other-medical-treatment-start-date/medical-treatment-start-date-waiting-list'])) {

        $data['sections']['medical-treatment']['records'][$thisRecord]['treatment-start']['waiting-list'] = '';

    } else {


        $data['sections']['medical-treatment']['records'][$thisRecord]['treatment-start']['waiting-list'] = cleanTextData($_POST['/other-medical-treatment-start-date/medical-treatment-start-date-waiting-list']);
        $waitingchk = ' checked';

    }


        $data['sections']['medical-treatment']['records'][$thisRecord]['treatment-start']['year'] = cleanTextData($_POST['/other-medical-treatment-start-date/medical-treatment-start-date-year']);   $data['sections']['medical-treatment']['records'][$thisRecord]['treatment-start']['month'] = cleanTextData($_POST['/other-medical-treatment-start-date/medical-treatment-start-date-month']);
    $data['sections']['medical-treatment']['records'][$thisRecord]['treatment-start']['day'] = cleanTextData($_POST['/other-medical-treatment-start-date/medical-treatment-start-date-day']);


    if (empty($_POST['/other-medical-treatment-start-date/medical-treatment-start-date-estimated'])) {

        $data['sections']['medical-treatment']['records'][$thisRecord]['treatment-start']['approximate'] = '';

    } else {


        $data['sections']['medical-treatment']['records'][$thisRecord]['treatment-start']['approximate'] = cleanTextData($_POST['/other-medical-treatment-start-date/medical-treatment-start-date-estimated']);
        $approximatechk = ' checked';

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

        $theURL = '/applicant/other-details/other-medical-treatment/treatment-end';
        if (!empty($_GET['return'])) {
            if ($rURL = cleanURL($_GET['return'])) {
                $theURL = $rURL;
            }
        }

        header("Location: ".$theURL);
        die();

    }

}

$page_title = 'When did this treatment start?';

@endphp




@include('framework.header')


    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">

@php
echo $errorMessage;
@endphp


            <form method="post" enctype="multipart/form-data" novalidate >
            @csrf
                                                    <div class="govuk-form-group {{$treatmentyear['error']}} ">
    <input name="/other-medical-treatment-start-date/medical-treatment-start-completed" type="hidden" value="1">
</div>
                                    <div class="govuk-form-group ">
    <input name="/other-medical-treatment-start-date/medical-treatment-start-date-year" type="hidden" value="">
</div>
                                    <div
    class="govuk-form-group {{$treatmentyear['error'] ?? ''}}"
    aria-describedby="/other-medical-treatment-start-date/medical-treatment-start-date-hint  ">

    <fieldset class="govuk-fieldset">
  <legend class="govuk-fieldset__legend govuk-fieldset__legend--l">
                                <h1 class="govuk-heading-xl">When did this treatment start?</h1>
</legend>
                                <p class="govuk-body">If you’ve had treatment at this place more than once, tell us the first time you visited. </p>
@php echo $treatmentyear['errorLabel']; @endphp




        <div id="/other-medical-treatment-start-date/medical-treatment-start-date-hint" class="govuk-hint">For example 27 3 2007. If you cannot remember, enter an approximate year.</div>

        <div class="govuk-date-input" id="/other-medical-treatment-start-date/medical-treatment-start-date">
                                                <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="/other-medical-treatment-start-date/medical-treatment-start-date-day">
                                Day
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-2 "
            id="/other-medical-treatment-start-date/medical-treatment-start-date-day"
            name="/other-medical-treatment-start-date/medical-treatment-start-date-day" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="2"
            value="{{$treatmentday['data']}}">
    </div>
</div>
                                                    <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="/other-medical-treatment-start-date/medical-treatment-start-date-month">
                                Month
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-2 "
            id="/other-medical-treatment-start-date/medical-treatment-start-date-month"
            name="/other-medical-treatment-start-date/medical-treatment-start-date-month" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="2"
            value="{{$treatmentmonth['data']}}">
    </div>
</div>
                                                    <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="/other-medical-treatment-start-date/medical-treatment-start-date-year">
                                Year
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-4 "
            id="/other-medical-treatment-start-date/medical-treatment-start-date-year"
            name="/other-medical-treatment-start-date/medical-treatment-start-date-year" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="4"
            value="{{$treatmentyear['data']}}">
    </div>
</div>
                                    </div>
    </fieldset>
</div>
                                    <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="61600aeeaf6fd" name="/other-medical-treatment-start-date/medical-treatment-start-date-estimated" type="checkbox"
           value="Yes"     {{$approximatechk ?? ''}}        >
    <label class="govuk-label govuk-checkboxes__label" for="61600aeeaf6fd">This date is approximate</label>
</div>
                                    <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="61600aeeaf991" name="/other-medical-treatment-start-date/medical-treatment-start-date-waiting-list" type="checkbox"
           value="Yes"    {{$waitingchk ?? ''}}       >
    <label class="govuk-label govuk-checkboxes__label" for="61600aeeaf991">I am still on a waiting list to attend</label>
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
