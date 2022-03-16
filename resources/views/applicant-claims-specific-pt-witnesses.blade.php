@include('framework.functions')
@php

//error handling setup
$errorMessage = '';
$errors = 'N';
$errorsList = array();
$count = '';
//set fields
$witnesses = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


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
    if (!empty($data['sections']['claims']['records'][$thisRecord]['specific']['pt']['witnesses'])) {
        $witnesses['data']            = @$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['witnesses'];
        $witnesseschk[$witnesses['data']] = ' checked';
    }
} else {


}



if (!empty($_POST)) {


    //set the entered field names


    if (!empty($_POST['/claim-details/claim-accident-witness/sporting-witnesses'])) {

        $data['sections']['claims']['records'][$thisRecord]['specific']['pt']['witnesses'] = $_POST['/claim-details/claim-accident-witness/sporting-witnesses'];
        $witnesseschk[$_POST['/claim-details/claim-accident-witness/sporting-witnesses']] = ' checked';

    } else {

        $errors = 'Y';
        $errorsList[] = '<a href="#/claim-details/claim-accident-witness/sporting-witnesses">Please tell if there were any witnesses</a>';
        $witnesses['error'] = 'govuk-form-group--error';
        $witnesses['errorLabel'] =
        '<span id="/claim-details/claim-accident-witness/sporting-witnesses-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Please tell if there were any witnesses
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
        $theURL = '/applicant/claims/specific/pt/first-aid';

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

                                <h1 class="govuk-heading-xl">Were there any witnesses?</h1>
                                <p class="govuk-body">Witnesses could be to the incident itself or immediate aftermath.  We do not need anyone’s details at this stage.</p>
                                <form method="post" enctype="multipart/form-data" novalidate >
                                @csrf
                                                    <div class="govuk-form-group {{$witnesses['error']}} ">
    <a id="/claim-details/claim-accident-witness/sporting-witnesses"></a>
    <fieldset class="govuk-fieldset">
@php echo $witnesses['errorLabel']; @endphp

                                            <div
            class="govuk-radios"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-witness/sporting-witnesses-yes-detail" name="/claim-details/claim-accident-witness/sporting-witnesses" type="radio"
           value="Yes - and I know the witness\'s contact details"  {{$witnesseschk['Yes - and I know the witness\'s contact details'] ?? ''}}           >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-witness/sporting-witnesses-yes-detail">Yes - and I know the witness's contact details</label>
</div>
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-witness/sporting-witnesses-yes-nodetail" name="/claim-details/claim-accident-witness/sporting-witnesses" type="radio"
           value="Yes - but I don't know the witness\'s details"  {{$witnesseschk['Yes - but I don\'t know the witness\'s details'] ?? ''}}          >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-witness/sporting-witnesses-yes-nodetail">Yes - but I don't know the witness's details</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-witness/sporting-witnesses-no" name="/claim-details/claim-accident-witness/sporting-witnesses" type="radio"
           value="No"     {{$witnesseschk['No'] ?? ''}}       >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-witness/sporting-witnesses-no">No</label>
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
