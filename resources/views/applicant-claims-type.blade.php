@include('framework.functions')
@php

//error handling setup
$errorMessage = '';
$errors = 'N';
$errorsList = array();
$count = '';
//set fields
$claim = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


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
    if (!empty($data['sections']['claims']['records'][$thisRecord]['type'])) {
        $claim['data']            = @$data['sections']['claims']['records'][$thisRecord]['type'];
        $claimchk[$claim['data']] = ' checked';
    }
} else {


}




if (!empty($data['sections']['claims']['records'][$thisRecord]['type'])) {


    //as this is a journey-deciding page, we want to detect a change in choice (if returning from a CYA page) so we can
    //kill off the return URL

   if ( (!empty($_POST['/claim-details/claim-illness/claim-illness'])) &&
    ($data['sections']['claims']['records'][$thisRecord]['type'] == $_POST['/claim-details/claim-illness/claim-illness']) ) {

        //same choice, return applies

    } else {

       unset($_GET['return']);

    }

}






if (!empty($_POST)) {


    //set the entered field names


    if (!empty($_POST['/claim-details/claim-illness/claim-illness'])) {


        switch ($_POST['/claim-details/claim-illness/claim-illness']) {

            case "A condition, injury or illness that is the result of a specific accident or incident":
               $data['sections']['claims']['records'][$thisRecord]['type'] = 'A condition, injury or illness that is the result of a specific accident or incident';
               $claimchk['A condition, injury or illness that is the result of a specific accident or incident'] = ' checked';
               $theURL = '/applicant/claims/specific';

            break;

            case "A condition, injury or illness that started over a period of time and is not related to a specific incident or accident":
                $data['sections']['claims']['records'][$thisRecord]['type'] = 'A condition, injury or illness that started over a period of time and is not related to a specific incident or accident';
                 $claimchk['A condition, injury or illness that started over a period of time and is not related to a specific incident or accident'] = ' checked';
                 $theURL = '/applicant/claims/non-specific';
            break;


            default:
                die('unexpected input');
            break;


        }



    } else {

        $errors = 'Y';
        $errorsList[] = '<a href="#/claim-details/claim-illness/claim-illness">Tell us what type of medical condition, injury or illness you are claiming for</a>';
        $claim['error'] = 'govuk-form-group--error';
        $claim['errorLabel'] =
        '<span id="/claim-details/claim-illness/claim-illness-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Tell us what type of medical condition, injury or illness you are claiming for
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
                                <h1 class="govuk-heading-xl">What was the cause of the medical condition, injury or illness you are claiming for?</h1>
    </legend>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group {{$claim['error']}}">
    <a id="/claim-details/claim-illness/claim-illness"></a>
    <fieldset class="govuk-fieldset">
@php echo $claim['errorLabel']; @endphp
                            <div id="/claim-details/claim-illness/claim-illness-hint" class="govuk-hint">Select the option that applies to your claim</div>
                <div
            class="govuk-radios govuk-radios--inline"  >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-illness/claim-illness-a-condition,-injury-or-illness-that-is-the-result-of-a-specific-accident-or-incident" name="/claim-details/claim-illness/claim-illness" type="radio"
           value="A condition, injury or illness that is the result of a specific accident or incident"    {{$claimchk['A condition, injury or illness that is the result of a specific accident or incident'] ?? '' }}       >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-illness/claim-illness-a-condition,-injury-or-illness-that-is-the-result-of-a-specific-accident-or-incident">A specific incident or accident<br /><br />
For example a road traffic accident, explosion, sporting incident, assault.  Includes mental health or long-term conditions caused or made worse by a specific incident.
</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/claim-details/claim-illness/claim-illness-a-condition,-injury-or-illness-that-started-over-a-period-of-time-and-is-not-related-to-a-specific-incident-or-accident" name="/claim-details/claim-illness/claim-illness" type="radio"
           value="A condition, injury or illness that started over a period of time and is not related to a specific incident or accident"    {{$claimchk['A condition, injury or illness that started over a period of time and is not related to a specific incident or accident'] ?? '' }}        >
    <label class="govuk-label govuk-radios__label" for="/claim-details/claim-illness/claim-illness-a-condition,-injury-or-illness-that-started-over-a-period-of-time-and-is-not-related-to-a-specific-incident-or-accident">An illness, condition or injury due to armed forces service over time.<br /><br />
For example illnesses, chronic conditions.  Includes mental health and other conditions caused or made worse by service over a longer period.
</label>
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
