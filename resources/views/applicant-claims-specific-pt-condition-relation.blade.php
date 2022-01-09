@include('framework.functions')
@php

//error handling setup
$errorMessage = '';
$errors = 'N';
$errorsList = array();
$count = '';
//set fields
$where = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


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
    if (!empty($data['sections']['claims']['records'][$thisRecord]['specific']['pt']['where'])) {
        $where['data']            = @$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['where'];
        $wherechk[$where['data']] = ' checked';
    }
} else {


}



if (!empty($_POST)) {


    //set the entered field names


    if (!empty($_POST['/claim-details/claim-accident-sporting-related/sporting-related'])) {

        $data['sections']['claims']['records'][$thisRecord]['specific']['pt']['where'] = $_POST['/claim-details/claim-accident-sporting-related/sporting-related'];
        $wherechk[$_POST['/claim-details/claim-accident-sporting-related/sporting-related']] = ' checked';

    } else {

        $errors = 'Y';
        $errorsList[] = '<a href="#/claim-details/claim-accident-sporting-related/sporting-related">Please tell us where you were when the incident happened</a>';
        $where['error'] = 'govuk-form-group--error';
        $where['errorLabel'] =
        '<span id="/claim-details/claim-accident-sporting-related/sporting-related-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Please tell us where you were when the incident happened
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
        $theURL = '/applicant/claims/specific/pt/witnesses';

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
                                <h1 class="govuk-heading-xl">Where were you when the incident happened?</h1>
</legend>
                                <form method="post" enctype="multipart/form-data" novalidate >
                                @csrf
                                                    <div class="govuk-form-group{{$where['error']}} ">
    <a id="/claim-details/claim-accident-sporting-related/sporting-related"></a>
    <fieldset class="govuk-fieldset">
    @php echo $where['errorLabel'];@endphp

                                            <div
            class="govuk-radios"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-sporting-related/sporting-related-duties--operations-overseas" name="/claim-details/claim-accident-sporting-related/sporting-related" type="radio"
           value="An operations location overseas"    {{$wherechk['An operations location overseas'] ?? ''}}        >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-sporting-related/sporting-related-duties--operations-overseas">An operations location overseas</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-sporting-related/sporting-related-duties--operations-u-k" name="/claim-details/claim-accident-sporting-related/sporting-related" type="radio"
           value="An operations location UK" {{$wherechk['An operations location UK'] ?? ''}}        >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-sporting-related/sporting-related-duties--operations-u-k">An operations location UK</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-sporting-related/sporting-related-trade" name="/claim-details/claim-accident-sporting-related/sporting-related" type="radio"
           value="My home base"    {{$wherechk['My home base'] ?? ''}}        >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-sporting-related/sporting-related-trade">My home base</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-sporting-related/sporting-related-misconduct-by-others" name="/claim-details/claim-accident-sporting-related/sporting-related" type="radio"
           value="A training location"   {{$wherechk['A training location'] ?? ''}}         >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-sporting-related/sporting-related-misconduct-by-others">A training location</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-sporting-related/sporting-related-consequential-to-another-medical-condition" name="/claim-details/claim-accident-sporting-related/sporting-related" type="radio"
           value="An off-duty location"   {{$wherechk['An off-duty location'] ?? ''}}         >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-sporting-related/sporting-related-consequential-to-another-medical-condition">An off-duty location</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-sporting-related/sporting-related-fitness-training" name="/claim-details/claim-accident-sporting-related/sporting-related" type="radio"
           value="Other"    {{$wherechk['Other'] ?? ''}}        >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-sporting-related/sporting-related-fitness-training">Other</label>
</div>

                    </div>
    </fieldset>
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
