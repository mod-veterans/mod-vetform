@include('framework.functions')
@php



//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$type = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


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
    if (!empty($data['sections']['medical-treatment']['records'][$thisRecord]['type'])) {
        $type['data']           = @$data['sections']['medical-treatment']['records'][$thisRecord]['type'];
    }
} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {


    //set the entered field names

    $type['data'] = cleanTextData($_POST['/other-medical-treatment-condition/other-medical-treatment-condition']);





    if (empty($_POST['/other-medical-treatment-condition/other-medical-treatment-condition'])) {
        $errors = 'Y';
        $errorsList[] = '<a href="#/other-medical-treatment-condition/other-medical-treatment-condition">Please tell us what type you received treatment for</a>';
        $type['error'] = 'govuk-form-group--error';
        $type['errorLabel'] =
        '<span id="/other-medical-treatment-condition/other-medical-treatment-condition-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Please tell us what type you received treatment for
         </span>';

    } else {

        $data['sections']['medical-treatment']['records'][$thisRecord]['type'] = cleanTextData($_POST['/other-medical-treatment-condition/other-medical-treatment-condition']);

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

        $theURL = '/applicant/other-details/other-medical-treatment/check-answers';
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
                                <h1 class="govuk-heading-xl">What treatment did you receive?</h1>
</legend>
                                <p class="govuk-body">For example surgery, specialist consultation, tests, physiotherapy</p>

            <form method="post" enctype="multipart/form-data" novalidate>
            @csrf
                                                    <div class="govuk-character-count" data-module="govuk-character-count" data-maxlength="100">
    <div class="govuk-form-group  {{$type['error']}}">
        <label class="govuk-label" for="/other-medical-treatment-condition/other-medical-treatment-condition">
        <span class="govuk-visually-hidden">What type of treatment did you receive?</span>
    </label>
@php echo $type['errorLabel']; @endphp
                <textarea class="govuk-textarea  govuk-js-character-count " id="/other-medical-treatment-condition/other-medical-treatment-condition"
                  name="/other-medical-treatment-condition/other-medical-treatment-condition" rows="5"
                                    aria-describedby="/other-medical-treatment-condition/other-medical-treatment-condition-info ">{{$type['data']}}</textarea>
                    <div id="/other-medical-treatment-condition/other-medical-treatment-condition-info" class="govuk-hint govuk-character-count__message" aria-live="polite">
                You can enter up to 250 characters
            </div>
    </div>
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
