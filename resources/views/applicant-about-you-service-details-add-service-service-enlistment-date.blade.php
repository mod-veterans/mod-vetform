@include('framework.functions')
@php



//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$enlistmentday = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$enlistmentmonth = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$enlistmentyear = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$enlistmentapproximate = array('data'=>'', 'error'=>'', 'errorLabel'=>'');



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
    if (!empty($data['sections']['service-details']['records'][$thisRecord]['service-enlistmentdate'])) {
        $enlistmentday['data']           = @$data['sections']['service-details']['records'][$thisRecord]['service-enlistmentdate']['day'];
        $enlistmentmonth['data']           = @$data['sections']['service-details']['records'][$thisRecord]['service-enlistmentdate']['month'];
        $enlistmentyear['data']           = @$data['sections']['service-details']['records'][$thisRecord]['service-enlistmentdate']['year'];
        $enlistmentapproximate['data']   = @$data['sections']['service-details']['records'][$thisRecord]['service-enlistmentdate']['approximate'];

        if ($enlistmentapproximate['data'] == 'Yes') {
        $approximatechk = ' checked';
        }


    }
} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {


    //set the entered field names
    $enlistmentday['data'] = cleanTextData($_POST['afcs/about-you/service-details/service-enlistment-date/enlistment-date-day']);
    $enlistmentmonth['data'] = cleanTextData($_POST['afcs/about-you/service-details/service-enlistment-date/enlistment-date-month']);
    $enlistmentyear['data'] = cleanTextData($_POST['afcs/about-you/service-details/service-enlistment-date/enlistment-date-year']);



    if ($enlistmentyear['data'] > date('Y')) {

     $errors = 'Y';
        $errorsList[] = '<a href="#afcs/about-you/service-details/service-rank/service-rank">The year entered cannot be in the future</a>';
        $enlistmentyear['error'] = 'govuk-form-group--error';
        $enlistmentyear['errorLabel'] =
        '<span id="afcs/about-you/service-details/service-rank/service-rank-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> The year entered cannot be in the future
         </span>';


    } elseif ( (!is_numeric($enlistmentyear['data'])) || (strlen($enlistmentyear['data']) != 4) ) {

      $errors = 'Y';
        $errorsList[] = '<a href="#afcs/about-you/service-details/service-rank/service-rank">The year entered must be a real date</a>';
        $enlistmentyear['error'] = 'govuk-form-group--error';
        $enlistmentyear['errorLabel'] =
        '<span id="afcs/about-you/service-details/service-rank/service-rank-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> The year entered must be a real date
         </span>';

    } else if (empty($_POST['afcs/about-you/service-details/service-enlistment-date/enlistment-date-year'])) {
        $errors = 'Y';
        $errorsList[] = '<a href="#afcs/about-you/service-details/service-rank/service-rank">Enter an approximate year</a>';
        $enlistmentyear['error'] = 'govuk-form-group--error';
        $enlistmentyear['errorLabel'] =
        '<span id="afcs/about-you/service-details/service-rank/service-rank-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Enter an approximate year
         </span>';

    } else {

        $data['sections']['service-details']['records'][$thisRecord]['service-enlistmentdate']['year'] = cleanTextData($_POST['afcs/about-you/service-details/service-enlistment-date/enlistment-date-year']);

    }

    $data['sections']['service-details']['records'][$thisRecord]['service-enlistmentdate']['month'] = cleanTextData($_POST['afcs/about-you/service-details/service-enlistment-date/enlistment-date-month']);
    $data['sections']['service-details']['records'][$thisRecord]['service-enlistmentdate']['day'] = cleanTextData($_POST['afcs/about-you/service-details/service-enlistment-date/enlistment-date-day']);


    if (empty($_POST['afcs/about-you/service-details/service-enlistment-date/approximate-date'])) {

        $data['sections']['service-details']['records'][$thisRecord]['service-enlistmentdate']['approximate'] = '';

    } else {


        $data['sections']['service-details']['records'][$thisRecord]['service-enlistmentdate']['approximate'] = cleanTextData($_POST['afcs/about-you/service-details/service-enlistment-date/approximate-date']);
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

        $theURL = '/applicant/about-you/service-details/add-service/discharge-date';
        if (!empty($_GET['return'])) {
            if ($rURL = cleanURL($_GET['return'])) {
                $theURL = $rURL;
            }
        }

        header("Location: ".$theURL);
        die();

    }

}

$page_title = 'What was your enlistment date?';

@endphp



@include('framework.header')



    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
@php
echo $errorMessage;
@endphp

                                <h1 class="govuk-heading-xl">What was your enlistment date?</h1>
                                <p class="govuk-body">Tell us the date this period of service started.</p>

            <form method="post" enctype="multipart/form-data" novalidate>
            @csrf
                                                    <div class="govuk-form-group {{$enlistmentyear['error']}}; ">
    <input name="afcs/about-you/service-details/service-enlistment-date/enlistment-date-year" type="hidden" value="">
</div>
                                    <div
    class="govuk-form-group "
    aria-describedby="afcs/about-you/service-details/service-enlistment-date/enlistment-date-hint  ">

    <fieldset class="govuk-fieldset">



        <div id="afcs/about-you/service-details/service-enlistment-date/enlistment-date-hint" class="govuk-hint">For example 27 3 2007. If you're not sure, enter an approximate year.</div>

        <div class="govuk-date-input" id="afcs/about-you/service-details/service-enlistment-date/enlistment-date">
                                                <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="afcs/about-you/service-details/service-enlistment-date/enlistment-date-day">
                                Day
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-2 "
            id="afcs/about-you/service-details/service-enlistment-date/enlistment-date-day"
            name="afcs/about-you/service-details/service-enlistment-date/enlistment-date-day" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="2"
            value="{{$enlistmentday['data']}}">
    </div>
</div>
                                                    <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="afcs/about-you/service-details/service-enlistment-date/enlistment-date-month">
                                Month
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-2 "
            id="afcs/about-you/service-details/service-enlistment-date/enlistment-date-month"
            name="afcs/about-you/service-details/service-enlistment-date/enlistment-date-month" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="2"
            value="{{$enlistmentmonth['data']}}">
    </div>
</div>
                                                    <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="afcs/about-you/service-details/service-enlistment-date/enlistment-date-year">
                                Year
            </label>
@php echo $enlistmentyear['errorLabel']; @endphp

                <input
            class="govuk-input govuk-date-input__input govuk-input--width-4 "
            id="afcs/about-you/service-details/service-enlistment-date/enlistment-date-year"
            name="afcs/about-you/service-details/service-enlistment-date/enlistment-date-year" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="4"
            value="{{$enlistmentyear['data']}}">
    </div>
</div>
                                    </div>

<br />
        <div class="govuk-checkboxes__item">

        <input class="govuk-checkboxes__input" id="615ff47dd0131" name="afcs/about-you/service-details/service-enlistment-date/approximate-date" type="checkbox"
           value="Yes"     @php echo @$approximatechk; @endphp       >
    <label class="govuk-label govuk-checkboxes__label" for="afcs/about-you/service-details/service-enlistment-date/approximate-date">Tick if this date is approximate</label>
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
