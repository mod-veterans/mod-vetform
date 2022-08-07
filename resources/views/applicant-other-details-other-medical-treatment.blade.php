@include('framework.functions')
@php

//error handling setup
$errorMessage = '';
$errors = 'N';
$errorsList = array();
$count = '';
//set fields
$treatment = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


    $userID = $_SESSION['vets-user'];
    $data = getData($userID);




if ( (!empty($_GET['action'])) && ($_GET['action'] == 'complete') ) {

    $data['sections']['other-medical']['completed'] = TRUE;

    storeData($userID,$data);

    header("Location: /tasklist");
    die();
}



/////////////////////////
//STACK / RECORD HANDLING
/////////////////////////


    if ( (!empty($_GET['delRecord'])) && (is_numeric($_GET['delRecord'])) ) {
        //lets delete the record
        unset($data['sections']['medical-treatment']['records'][$_GET['delRecord']]);
        storeData($userID,$data);
    }

    //are there already treatment records?

    if (!empty($data['sections']['medical-treatment']['records'])) {

        $count = 0;
        $treatmentList = '';
        foreach ($data['sections']['medical-treatment']['records'] as $k=>$curTreatment) {
        $count++;

            $treatmentList .='
            <div>
             <dt class="govuk-summary-list__value">
                            Hospital / Facility '.$count.'
            </dt>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link govuk-warning govuk-!-margin-right-5" href="/applicant/other-details/other-medical-treatment?delRecord='.$k.'">Delete<span class="govuk-visually-hidden"> name</span>
                </a>
                <a class="govuk-link" href="/applicant/other-details/other-medical-treatment/hospital-address?medicalrecord='.$k.'">
                    Change<span class="govuk-visually-hidden"> name</span>
                </a>
            </dd>
            </div>



            ';



        }

        $lastRecID = ($k + 1);


    } else {

        //no treatment records yet, lets set the first one up

        $data['settings']['medical-treatment-record-num'] = 1;
        $lastRecID = 1;
        //store our changes

        storeData($userID,$data);

    }


/////////////////////////////
//END STACK / RECORD HANDLING
/////////////////////////////

echo $data['settings']['medical-treatment-record-num'];


if ($lastRecID < 2) {


//set fields
$treatment = array('data'=>'', 'error'=>'', 'errorLabel'=>'');



if (empty($_POST)) {
    //load the data if set
    if (!empty($data['sections']['medical-treatment']['received'])) {
        $treatment['data']            = @$data['sections']['medical-treatment']['received'];
        $treatmentchk[$treatment['data']] = ' checked';
    }
} else {


}




if (!empty($data['sections']['medical-treatment']['received'])) {


    //as this is a journey-deciding page, we want to detect a change in choice (if returning from a CYA page) so we can
    //kill off the return URL

   if ( (!empty($_POST['/treatment-status/treatment-status'])) &&
    ($data['sections']['medical-treatment']['received'] == $_POST['/treatment-status/treatment-status']) ) {

        //same choice, return applies

    } else {

       unset($_GET['return']);

    }

}






if (!empty($_POST)) {


    //set the entered field names


    if (!empty($_POST['/treatment-status/treatment-status'])) {


        switch ($_POST['/treatment-status/treatment-status']) {

            case "Yes":
               $data['sections']['medical-treatment']['received'] = 'Yes';
               $treatmentchk['Yes'] = ' checked';
               $theURL = '/applicant/other-details/other-medical-treatment/hospital-address';

            break;

            case "No":
                $data['sections']['medical-treatment']['received'] = 'No';
                 $typechk['No'] = ' checked';
                 $theURL = '/applicant/other-details/other-medical-treatment/no-check-answers';
            break;


            default:
                die('unexpected input');
            break;


        }



    } else {

        $errors = 'Y';
        $errorsList[] = '<a href="#/other-compensation/claim-payment-type/claim-outcome-payment-type">Tell us if you received medical treatment</a>';
        $treatment['error'] = 'govuk-form-group--error';
        $treatment['errorLabel'] =
        '<span id="/other-compensation/claim-payment-type/claim-outcome-payment-type-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Tell us if you received medical treatment
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

        if (!empty($_GET['return'])) {
            if ($rURL = cleanURL($_GET['return'])) {
                $theURL = $rURL;
            }
        }

        header("Location: ".$theURL);
        die();

}

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
                                <h1 class="govuk-heading-xl">Further hospital or medical treatment</h1>
</legend>

@php
if ($lastRecID < 2) {
@endphp

                                <p class="govuk-body">Tell us if you have been treated at any other hospitals or medical facilities for the conditions on this application. This includes if you’re on a waiting list for treatment to start.</p>
                                <div class="govuk-inset-text">
                                    You do not need to tell us again about hospitals or facilities you entered in the claim section.
                                </div>


                                <p class="govuk-body">If you’ve visited the same hospital or facility several times, you only need to tell us the details once. </p>

                                <p class="govuk-body">
You can add as many hospitals or facilities as needed.  You’ll be asked if you want to ‘add another hospital/facility’ at the end of this section.
</p>

<p class="govuk-body"><strong>Have you received, or are waiting for, treatment at any other hospitals or medical facilities?</strong></p>


                                <form method="post" enctype="multipart/form-data" novalidate >
                                @csrf
                                                    <div class="govuk-form-group {{$treatment['error']}} ">
    <a id="/treatment-status/treatment-status"></a>
    <fieldset class="govuk-fieldset">
@php echo $treatment['errorLabel']; @endphp
                         <div class="govuk-radios govuk-radios--inline">
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/treatment-status/treatment-status-yes" name="/treatment-status/treatment-status" type="radio"
           value="Yes"     {{$treatmentchk['Yes'] ?? ''}}       >
    <label class="govuk-label govuk-radios__label" for="/treatment-status/treatment-status-yes">Yes</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/treatment-status/treatment-status-no" name="/treatment-status/treatment-status" type="radio"
           value="No"      {{$treatmentchk['No'] ?? ''}}      >
    <label class="govuk-label govuk-radios__label" for="/treatment-status/treatment-status-no">No - I’ve not had further treatment for the conditions on this application.</label>
</div>

                    </div>
    </fieldset>
</div>



                <div class="govuk-form-group">
   <button class="govuk-button govuk-!-margin-right-2" data-module="govuk-button">Save and continue</button>
@include('framework.bottombuttons')

    </div>
            </form>
@php
} else {
@endphp

                         <dl class="govuk-summary-list">
@php
echo $treatmentList;
@endphp

                            </dl>

                <div class="govuk-form-group govuk-!-margin-top-4">
            <a class="govuk-button" href="/applicant/other-details/other-medical-treatment/hospital-address?medicalrecord={{$lastRecID}}">
                Add another Hospital / Medical Facility            </a>
            <br>
            <a class="govuk-link" href="/applicant/other-details/other-medical-treatment?action=complete">Return to Task List</a>
        </div>


@php
}
@endphp


            </div>
        </div>
    </main>
</div>



@include('framework.footer')
