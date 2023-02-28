@include('framework.functions')
@php

//error handling setup
$errorMessage = '';
$errors = 'N';
$errorsList = array();
$count = '';
//set fields
$journeystart = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


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
    if (!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['journey-start'])) {
        $journeystart['data']            = @$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['journey-start'];
        $journeystartchk[$journeystart['data']] = ' checked';
    }
} else {


}




if (!empty($_POST)) {


    //set the entered field names


    if (!empty($_POST['/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from'])) {


        $data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['journey-start'] = $_POST['/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from'];
        $journeystart['data'] = $_POST['/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from'];



    } else {

        $errors = 'Y';
        $errorsList[] = '<a href="#/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from-operations-location-overseas">Tell us where your journey started</a>';
        $journeystart['error'] = 'govuk-form-group--error';
        $journeystart['errorLabel'] =
        '<span id="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Tell us where your journey started
         </span>';

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
        $theURL = '/applicant/claims/specific/non-pt/rta/journey-end';

        if (!empty($_GET['return'])) {
            if ($rURL = cleanURL($_GET['return'])) {
                $theURL = $rURL;
            }
        }

        header("Location: ".$theURL);
        die();

}

}

$page_title = 'Where did your journey start?';

@endphp



@include('framework.header')


    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
@php
echo $errorMessage;
@endphp

                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group {{$journeystart['error']}} ">
    <fieldset class="govuk-fieldset">
  <legend class="govuk-fieldset__legend govuk-fieldset__legend--l">
                                <h1 class="govuk-heading-xl">Where did your journey start?</h1>
</legend>
                                <p class="govuk-body">Select the option that best applies</p>
@php echo $journeystart['errorLabel']; @endphp

                                            <div
            class="govuk-radios" >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from-operations-location-overseas" name="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from" type="radio"
           value="A place where I was completing my duties on operations overseas"    {{$journeystartchk['A place where I was completing my duties on operations overseas'] ?? ''}}        >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from-operations-location-overseas">A place where I was completing my duties on operations overseas</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from-operations-location--u-k" name="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from" type="radio"
           value="A place where I was completing my duties on operations in the UK"     {{$journeystartchk['A place where I was completing my duties on operations in the UK'] ?? ''}}        >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from-operations-location--u-k">A place where I was completing my duties on operations in the UK</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from-accommodation--field" name="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from" type="radio"
           value="My accommodation when on operations overseas"      {{$journeystartchk['My accommodation when on operations overseas'] ?? ''}}       >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from-accommodation--field">My accommodation when on operations overseas</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from-accommodation--base" name="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from" type="radio"
           value="My accommodation when on operations in the UK"    {{$journeystartchk['My accommodation when on operations in the UK'] ?? ''}}         >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from-accommodation--base">My accommodation when on operations in the UK</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from-home-base" name="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from" type="radio"
           value="My usual base"    {{$journeystartchk['My usual base'] ?? ''}}        >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from-home-base">My usual base</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from-an-off-duty-location" name="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from" type="radio"
           value="Another duty related location"    {{$journeystartchk['Another duty related location'] ?? ''}}         >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from-an-off-duty-location">Another duty related location</label>
</div>


                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from-your-home" name="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from" type="radio"
           value="My home"      {{$journeystartchk['My home'] ?? ''}}       >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from-your-home">My home</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from-an-off-duty-location" name="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from" type="radio"
           value="Another personal off-duty location"   {{$journeystartchk['Another personal off-duty location'] ?? ''}}          >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from-an-off-duty-location">Another personal off-duty location</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from-an-off-duty-location" name="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from" type="radio"
           value="None of the above"  {{$journeystartchk['None of the above'] ?? ''}}           >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-journey-from/non-sporting-journey-from-an-off-duty-location">None of the above</label>
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
