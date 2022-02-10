@include('framework.functions')
@php

//error handling setup
$errorMessage = '';
$errors = 'N';
$errorsList = array();
$count = '';
//set fields
$accident = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


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
    if (!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['accident-form'])) {
        $accident['data']            = @$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['accident-form'];
        $accidentchk[$accident['data']] = ' checked';
    }
} else {


}


if (!empty($_POST)) {


    //set the entered field names


    if (!empty($_POST['/claim-details/claim-accident-non-sporting-form/non-sporting-form'])) {


        switch ($_POST['/claim-details/claim-accident-non-sporting-form/non-sporting-form']) {

            case "Yes":
               $data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['accident-form'] = 'Yes';
               $accidentchk['Yes'] = ' checked';

            break;

            case "No":
                $data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['accident-form'] = 'No';
                 $accidentchk['No'] = ' checked';

            break;


            default:
                die('unexpected input');
            break;


        }



    } else {

        $errors = 'Y';
        $errorsList[] = '<a href="#/claim-details/claim-accident-non-sporting-form/non-sporting-form">Please tell us if an accident form was completed</a>';
        $accident['error'] = 'govuk-form-group--error';
        $accident['errorLabel'] =
        '<span id="/claim-details/claim-accident-non-sporting-form/non-sporting-form-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Please tell us if an accident form was completed
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
        $theURL = '/applicant/claims/specific/non-pt/where-were-you';

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
                                <h1 class="govuk-heading-xl">Was an accident form completed?</h1>
</legend>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group {{$accident['error']}} ">
    <a id="/claim-details/claim-accident-non-sporting-form/non-sporting-form"></a>





<div class="govuk-form-group">
  <fieldset class="govuk-fieldset" aria-describedby="contact-hint">
@php echo $accident['errorLabel']; @endphp
    <div id="contact-hint" class="govuk-hint">
      Select one option.
    </div>
    <div class="govuk-radios" data-module="govuk-radios">
      <div class="govuk-radios__item">
        <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-form/non-sporting-form-yes" name="/claim-details/claim-accident-non-sporting-form/non-sporting-form" type="radio" value="Yes" data-aria-controls="conditional-contact" {{$accidentchk['Yes'] ?? ''}} >
        <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-form/non-sporting-form-yes">
          Yes
        </label>
      </div>
      <div class="govuk-radios__conditional govuk-radios__conditional--hidden" id="conditional-contact">


Please send us a copy if you have one.  You can upload a copy in ’Supporting Documents’ later.





      </div>
      <div class="govuk-radios__item">
        <input class="govuk-radios__input" id="/claim-details/claim-accident-non-sporting-form/non-sporting-form-no" name="/claim-details/claim-accident-non-sporting-form/non-sporting-form" type="radio" value="No" data-aria-controls="conditional-contact-2" {{$accidentchk['No'] ?? ''}}>
        <label class="govuk-label govuk-radios__label" for="/claim-details/claim-accident-non-sporting-form/non-sporting-form-no">
          No
        </label>
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



  <script src="/js/app2.js"></script>
@include('framework.footer')
