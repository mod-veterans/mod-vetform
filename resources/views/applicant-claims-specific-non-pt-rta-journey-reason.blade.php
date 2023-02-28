@include('framework.functions')
@php

//error handling setup
$errorMessage = '';
$errors = 'N';
$errorsList = array();
$count = '';
//set fields
$journeyreason = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


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
    if (!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['journey-reason'])) {
        $journeyreason['data']            = @$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['journey-reason'];
        $journeyreasonchk[$journeyreason['data']] = ' checked';
    }
} else {


}




if (!empty($_POST)) {


    //set the entered field names


    if (!empty($_POST['/claim-details/claim-accident-non-sporting-journey-reason/non-sporting-journey-reason'])) {


        $data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['journey-reason'] = $_POST['/claim-details/claim-accident-non-sporting-journey-reason/non-sporting-journey-reason'];
        $journeyreason['data'] = $_POST['/claim-details/claim-accident-non-sporting-journey-reason/non-sporting-journey-reason'];



    } else {

        $errors = 'Y';
        $errorsList[] = '<a href="#/claim-details/claim-accident-non-sporting-journey-reason/non-sporting-journey-reason-duties--operations">Tell us the reason for your journey</a>';
        $journeyreason['error'] = 'govuk-form-group--error';
        $journeyreason['errorLabel'] =
        '<span id="/claim-details/claim-accident-non-sporting-journey-reason/non-sporting-journey-reason-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Tell us the reason for your journey
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
        $theURL = '/applicant/claims/specific/non-pt/rta/journey-start';

        if (!empty($_GET['return'])) {
            if ($rURL = cleanURL($_GET['return'])) {
                $theURL = $rURL;
            }
        }

        header("Location: ".$theURL);
        die();

}

}

$page_title = 'What was the reason for your journey?';

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
                                                    <div class="govuk-form-group {{$journeyreason['error']}}">

    <fieldset class="govuk-fieldset">
  <legend class="govuk-fieldset__legend govuk-fieldset__legend--l">
                                <h1 class="govuk-heading-xl">What was the reason for your journey?</h1>
</legend>
@php echo $journeyreason['errorLabel']; @endphp
                                            <div
            class="govuk-radios"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-journey-reason/non-sporting-journey-reason-duties--operations" name="/claim-details/claim-accident-non-sporting-journey-reason/non-sporting-journey-reason" type="radio"
           value="My duties on operations"   {{$journeyreasonchk['My duties on operations'] ?? ''}}         >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-journey-reason/non-sporting-journey-reason-duties--operations">My duties on operations</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-journey-reason/non-sporting-journey-reason-duties--trade" name="/claim-details/claim-accident-non-sporting-journey-reason/non-sporting-journey-reason" type="radio"
           value="My regular duties"   {{$journeyreasonchk['My regular duties'] ?? ''}}          >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-journey-reason/non-sporting-journey-reason-duties--trade">My regular duties</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-journey-reason/non-sporting-journey-reason-duties--training" name="/claim-details/claim-accident-non-sporting-journey-reason/non-sporting-journey-reason" type="radio"
           value="Training exercise"    {{$journeyreasonchk['Training exercise'] ?? ''}}         >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-journey-reason/non-sporting-journey-reason-duties--training">Training exercise</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-journey-reason/non-sporting-journey-reason-personal(non-duty/off-duty)" name="/claim-details/claim-accident-non-sporting-journey-reason/non-sporting-journey-reason" type="radio"
           value="Travelling to/from home and duty"     {{$journeyreasonchk['Travelling to/from home and duty'] ?? ''}}        >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-journey-reason/non-sporting-journey-reason-personal(non-duty/off-duty)">Travelling to/from home and duty</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-journey-reason/non-sporting-journey-reason-personal(non-duty/off-duty)" name="/claim-details/claim-accident-non-sporting-journey-reason/non-sporting-journey-reason" type="radio"
           value="Personal (non-duty/off-duty)"     {{$journeyreasonchk['Personal (non-duty/off-duty)'] ?? ''}}        >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-journey-reason/non-sporting-journey-reason-personal(non-duty/off-duty)">Personal (non-duty/off-duty)</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-journey-reason/non-sporting-journey-reason-other" name="/claim-details/claim-accident-non-sporting-journey-reason/non-sporting-journey-reason" type="radio"
           value="Other"    {{$journeyreasonchk['Other'] ?? ''}}         >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-journey-reason/non-sporting-journey-reason-other">Other</label>
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
