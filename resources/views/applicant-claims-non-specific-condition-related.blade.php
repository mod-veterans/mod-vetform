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
    if (!empty($data['sections']['claims']['records'][$thisRecord]['non-specific']['why'])) {
        $condition['data'] = @$data['sections']['claims']['records'][$thisRecord]['non-specific']['why'];
    }
} else {

}


if (!empty($_POST)) {


    //set the entered field names


    if (!empty($_POST['/claim-details/claim-illness-note/claim-illness-note'])) {

        $data['sections']['claims']['records'][$thisRecord]['non-specific']['why'] = cleanTextData($_POST['/claim-details/claim-illness-note/claim-illness-note']);


    } else {
    $data['sections']['claims']['records'][$thisRecord]['non-specific']['why'] = '';

        $errors = 'Y';
        $errorsList[] = '<a href="#/claim-details/claim-illness-note/claim-illness-note">Tell us why your condition related to your armed forces service</a>';
        $condition['error'] = 'govuk-form-group--error';
        $condition['errorLabel'] =
        '<span id="/claim-details/claim-illness-note/claim-illness-noter-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span>Tell us why your condition related to your armed forces service
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
        $theURL = '/applicant/claims/non-specific/check-answers';

        if (!empty($_GET['return'])) {
            if ($rURL = cleanURL($_GET['return'])) {
                $theURL = $rURL;
            }
        }

        header("Location: ".$theURL);
        die();

}

}

$page_title = 'Why is your condition related to your armed forces service?';

@endphp



@include('framework.header')

    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
@php echo $errorMessage; @endphp
                                 <legend class="govuk-fieldset__legend govuk-fieldset__legend--l">
                                <h1 class="govuk-heading-xl">Why is your condition related to your armed forces service?</h1>
                                </legend>
                                <p class="govuk-body">In your own words, tell us why you feel your claimed medical condition or injury is caused or made worse by your service in the armed forces.</p>
                                <div class="govuk-warning-text">
                                  <span class="govuk-warning-text__icon" aria-hidden="true">!</span>
                                  <strong class="govuk-warning-text__text">
                                    <span class="govuk-warning-text__assistive">Warning</span>
                                    Do not include specific operational details (OPSEC).
                                  </strong>
                                </div>
                                <p class="govuk-body">You can use this section to explain the impact the conditions have on you.</p>
                                <p class="govuk-body">If you want to think about your answer, you can use the ‘save and come back later’ function.</p>
                                 <div class="govuk-warning-text">
                                  <span class="govuk-warning-text__icon" aria-hidden="true">!</span>
                                  <strong class="govuk-warning-text__text">
                                    <span class="govuk-warning-text__assistive">Warning</span>
                                    You need permission to complete this section if you served in or supported the Special Forces.
                                  </strong>
                                </div>

 <details class="govuk-details" data-module="govuk-details">
  <summary class="govuk-details__summary">
    <span class="govuk-details__summary-text">
     You must read this text information if the person applying has ever served in or supported the Special Forces
    </span>
  </summary>
  <div class="govuk-details__text">
Reminder: If the person named in this application has ever served with the United Kingdom Special Forces (UKSF), either directly or in a support role, you must contact the MOD A Block Disclosure Cell for advice before using this service.  You may be asked to apply for Express Prior Authority in Writing (EPAW) and will be given a reference number to quote when you make your claim. Email <a href="mailto:MAB-Disclosures@mod.gov.uk">MAB-Disclosures@mod.gov.uk</a> explaining you want to make an armed forces compensation claim.
  </div>
</details>




            <form method="post" enctype="multipart/form-data" novalidate >
            @csrf
                                                    <div class="govuk-form-group {{$condition['error'] ?? ''}}">
        <label class="govuk-label" for="/claim-details/claim-illness-note/claim-illness-note">
        <span class="govuk-visually-hidden">Why is your condition related to your armed forces service?</span>
    </label>
    @php echo $condition['errorLabel']; @endphp
                <textarea class="govuk-textarea " id="/claim-details/claim-illness-note/claim-illness-note"
                  name="/claim-details/claim-illness-note/claim-illness-note" rows="5" maxlength="3500">{{$condition['data'] ?? ''}}</textarea>
  <div id="with-hint-info" class="govuk-hint govuk-character-count__message" aria-live="polite">
    You can enter up to 3,500 characters
  </div>
        </div>


<div class="govuk-inset-text">
If you’ve been affected by recalling your experiences, see our information on support available on  <a href="https://www.gov.uk/guidance/urgent-help-for-veterans" target="_New">GOV.UK</a> (opens in a new tab).
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
