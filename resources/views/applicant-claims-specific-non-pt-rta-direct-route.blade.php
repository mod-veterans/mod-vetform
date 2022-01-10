@include('framework.functions')
@php

//error handling setup
$errorMessage = '';
$errors = 'N';
$errorsList = array();
$count = '';
//set fields
$directroute = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


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
    if (!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['direct-route'])) {
        $directroute['data']            = @$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['direct-route'];
        $directroutechk[$directroute['data']] = ' checked';
    }
} else {


}




if (!empty($_POST)) {


    //set the entered field names


    if (!empty($_POST['/claim-details/claim-accident-non-sporting-direct-route/non-sporting-direct-route'])) {


        $data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['direct-route'] = $_POST['/claim-details/claim-accident-non-sporting-direct-route/non-sporting-direct-route'];
        $directroute['data'] = $_POST['/claim-details/claim-accident-non-sporting-direct-route/non-sporting-direct-route'];



    } else {

        $errors = 'Y';
        $errorsList[] = '<a href="#/claim-details/claim-accident-non-sporting-direct-route/non-sporting-direct-route">Please tell us if you were on a direct route</a>';
        $directroute['error'] = 'govuk-form-group--error';
        $directroute['errorLabel'] =
        '<span id="/claim-details/claim-accident-non-sporting-direct-route/non-sporting-direct-route-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Please tell us if you were on a direct route
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
        $theURL = '/applicant/claims/specific/non-pt/police-report';

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
                                <h1 class="govuk-heading-xl">Were you on a direct route?</h1>
</legend>
                                <p class="govuk-body">A direct route means you took a reasonable route from start to end considering traffic conditions. You did not divert for other reasons, for example, visiting a friend.   </p>

            <form method="post" enctype="multipart/form-data" novalidate>
            @csrf
                                                    <div class="govuk-form-group {{$directroute['error']}}">
    <a id="/claim-details/claim-accident-non-sporting-direct-route/non-sporting-direct-route"></a>
    <fieldset class="govuk-fieldset">
@php echo $directroute['errorLabel']; @endphp

                                            <div
            class="govuk-radios govuk-radios--inline"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-direct-route/non-sporting-direct-route-yes" name="/claim-details/claim-accident-non-sporting-direct-route/non-sporting-direct-route" type="radio"
           value="Yes"   {{$directroutechk['Yes'] ?? ''}}         >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-direct-route/non-sporting-direct-route-yes">Yes</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-direct-route/non-sporting-direct-route-no" name="/claim-details/claim-accident-non-sporting-direct-route/non-sporting-direct-route" type="radio"
           value="No"    {{$directroutechk['No'] ?? ''}}          >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-direct-route/non-sporting-direct-route-no">No</label>
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
