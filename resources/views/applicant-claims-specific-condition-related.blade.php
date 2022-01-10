@include('framework.functions')
@php

//error handling setup
$errorMessage = '';
$errors = 'N';
$errorsList = array();
$count = '';
//set fields
$condition = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


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
    if (!empty($data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['why'])) {
        $condition['data'] = @$data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['why'];
    }
} else {

}


if (!empty($_POST)) {


    //set the entered field names


    if (!empty($_POST['/claim-details/claim-illness-note/claim-illness-note'])) {

        $data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['why'] = cleanTextData($_POST['/claim-details/claim-illness-note/claim-illness-note']);


    } else {
    $data['sections']['claims']['records'][$thisRecord]['specific']['non-pt']['why'] = '';
        /*
        $errors = 'Y';
        $errorsList[] = '<a href="#/claim-details/claim-illness-note/claim-illness-note">Please tell us what type of medical condition you are claiming for</a>';
        $condition['error'] = 'govuk-form-group--error';
        $condition['errorLabel'] =
        '<span id="/claim-details/claim-illness-note/claim-illness-noter-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Please tell us what type of medical condition you are claiming for
         </span>';
         */

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
        $theURL = '/applicant/claims/specific/non-pt/check-answers';

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
                                <h1 class="govuk-heading-xl">Why is your condition related to your armed forces service?</h1>
                                <p class="govuk-body"> In your own words, tell us why you feel your claimed medical condition or injury is caused or made worse by your service in the armed forces. If your condition developed over time, tell us what activities you think were the cause.  Avoid including specific operational details.  You can also use this section to explain the impact the conditions have on you. If you want to think about your answer, you can use the ‘save and return later’ function.</p>
                                <p class="govuk-body">If you are claiming for a road traffic accident and you were not on a direct route between your starting point and destination, please tell us why here.</p>

    <p class="govuk-body"><strong>Reminder:</strong> If you have served or are serving (whether directly or in a support role) with the United
    Kingdom Special Forces (UKSF), you must seek advice from the MOD A Block Disclosure Cell BEFORE completing this
    section. The Disclosure Cell can be contacted by emailing <a href="mailto:MAB-Disclosures@mod.gov.uk">MAB-Disclosures@mod.gov.uk</a>.</p>

            <form method="post" enctype="multipart/form-data" novalidate >
            @csrf
                                                    <div class="govuk-form-group">
        <label class="govuk-label" for="/claim-details/claim-illness-note/claim-illness-note">
        <span class="govuk-visually-hidden">Why is your condition related to your armed forces service?</span>
    </label>
                <textarea class="govuk-textarea " id="/claim-details/claim-illness-note/claim-illness-note"
                  name="/claim-details/claim-illness-note/claim-illness-note" rows="5" maxlength="2500"
                                    aria-describedby="">{{$condition['data'] ?? ''}}</textarea>
  <div id="with-hint-info" class="govuk-hint govuk-character-count__message" aria-live="polite">
    You can enter up to 2,500 characters
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
