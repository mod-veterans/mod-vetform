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
        $errorsList[] = '<a href="#/claim-details/claim-illness-note/claim-illness-note">Please tell us why your condition related to your armed forces service</a>';
        $condition['error'] = 'govuk-form-group--error';
        $condition['errorLabel'] =
        '<span id="/claim-details/claim-illness-note/claim-illness-noter-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span>Please tell us why your condition related to your armed forces service
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

@endphp



@include('framework.header')

    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
@php echo $errorMessage; @endphp
                                <h1 class="govuk-heading-xl">Why is your condition related to your armed forces service?</h1>
                                <p class="govuk-body">In your own words, tell us why you feel your claimed medical condition or injury is caused or made worse by your service in the armed forces.</p>
                                <div class="govuk-warning-text">
                                  <span class="govuk-warning-text__icon" aria-hidden="true">!</span>
                                  <strong class="govuk-warning-text__text">
                                    <span class="govuk-warning-text__assistive">Warning</span>
                                    Do not include specific operational details.
                                  </strong>
                                </div>
                                <p class="govuk-body">You can use this section to explain the impact the conditions have on you.</p>
                                <p class="govuk-body">If you want to think about your answer, you can use the ‘save and return later’ function.</p>
                                 <div class="govuk-warning-text">
                                  <span class="govuk-warning-text__icon" aria-hidden="true">!</span>
                                  <strong class="govuk-warning-text__text">
                                    <span class="govuk-warning-text__assistive">Warning</span>
                                    You need permission to claim if you served in or supported the Special Forces.
                                  </strong>
                                </div>

 <details class="govuk-details" data-module="govuk-details">
  <summary class="govuk-details__summary">
    <span class="govuk-details__summary-text">
     You must read this text information if the person applying has ever served in or supported the Special Forces
    </span>
  </summary>
  <div class="govuk-details__text">
If the person named in this application is serving or has served in with United Kingdom Special Forces (UKSF), directly or in a support role, advice must be obtained from the MOD A Block Disclosure Cell before using this service. If the person named in this application has served at any time from 1996, they will be subject to the UKSF Confidentiality Contract and must apply for Express Prior Authority in Writing (EPAW) through the Disclosure Cell before submitting a claim where they may be asked to disclose details of their service with UKSF or any units directly supporting them. The Disclosure Cell can be contacted by emailing <a href="mailto:MAB-Disclosures@mod.gov.uk">MAB-Disclosures@mod.gov.uk</a>.
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