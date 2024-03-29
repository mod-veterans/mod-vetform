@include('framework.functions')
@php

//error handling setup
$errorMessage = '';
$errors = 'N';
$errorsList = array();
$count = '';
//set fields
$organised = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


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
    if (!empty($data['sections']['claims']['records'][$thisRecord]['specific']['pt']['authorised'])) {
        $organised['data']            = @$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['authorised'];
        $organisedchk[$organised['data']] = ' checked';
    }
} else {


}



if (!empty($_POST)) {


    //set the entered field names


    if (!empty($_POST['/claim-details/claim-accident-sporting-authorise/sporting-authorise'])) {


        switch ($_POST['/claim-details/claim-accident-sporting-authorise/sporting-authorise']) {

            case "Yes":
               $data['sections']['claims']['records'][$thisRecord]['specific']['pt']['authorised'] = 'Yes';
               $organisedchk['Yes'] = ' checked';

            break;

            case "No":
                $data['sections']['claims']['records'][$thisRecord]['specific']['pt']['authorised'] = 'No';
                 $organisedchk['No'] = ' checked';
            break;


            default:
                die('unexpected input');
            break;


        }



    } else {

        $errors = 'Y';
        $errorsList[] = '<a href="#/claim-details/claim-accident-sporting-authorise/sporting-authorise-yes">Tell us if the activity was authorised or organised by the Armed Forces</a>';
        $organised['error'] = 'govuk-form-group--error';
        $organised['errorLabel'] =
        '<span id="/claim-details/claim-accident-condition/claim-accident-condition-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Tell us if the activity was authorised or organised by the Armed Forces
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
        $theURL = '/applicant/claims/specific/pt/unit-representation';

        if (!empty($_GET['return'])) {
            if ($rURL = cleanURL($_GET['return'])) {
                $theURL = $rURL;
            }
        }

        header("Location: ".$theURL);
        die();

}

}

$page_title = 'Was the activity authorised or organised by the Armed Forces?';

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
                                                    <div class="govuk-form-group {{$organised['error']}} ">
    <a id="/claim-details/claim-accident-sporting-authorise/sporting-authorise"></a>
    <fieldset class="govuk-fieldset">
  <legend class="govuk-fieldset__legend govuk-fieldset__legend--l">
<h1 class="govuk-heading-xl">Was the activity authorised or organised by the Armed Forces?</h1>
    </legend>
@php echo $organised['errorLabel']; @endphp
                                            <div
            class="govuk-radios govuk-radios--inline"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-sporting-authorise/sporting-authorise-yes" name="/claim-details/claim-accident-sporting-authorise/sporting-authorise" type="radio"
           value="Yes"     {{$organisedchk['Yes'] ?? ''}}       >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-sporting-authorise/sporting-authorise-yes">Yes</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-accident-sporting-authorise/sporting-authorise-no" name="/claim-details/claim-accident-sporting-authorise/sporting-authorise" type="radio"
           value="No"    {{$organisedchk['No'] ?? ''}}        >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-sporting-authorise/sporting-authorise-no">No</label>
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
