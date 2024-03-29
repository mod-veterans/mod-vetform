@include('framework.functions')
@php


//error handling setup

//set fields
$fileinfo = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);



if (!empty($_POST)) {


    //set the entered field names


    if (!empty($_POST['/applicant/nominee-details/nominee-details'])) {
        $fileinfo['data'] = $_POST['/applicant/nominee-details/nominee-details'];
    } else {
        $fileinfo['data'] = '';
    }
    $data['sections']['supporting-documents']['file-information'] = $fileinfo['data'];

        //store our changes

        $data['sections']['supporting-documents']['completed'] = TRUE;

        storeData($userID,$data);

        $theURL = '/tasklist';
        if (!empty($_GET['return'])) {
            if ($rURL = cleanURL($_GET['return'])) {
                $theURL = $rURL;
            }
    }

    header("Location: ".$theURL);
    die();



} else {
$fileinfo['data'] = @$data['sections']['supporting-documents']['file-information'];

}



$page_title = 'Do you want to tell us anything about your documents?';

@endphp
@include('framework.header')
@include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                  <legend class="govuk-fieldset__legend govuk-fieldset__legend--l">
                                <h1 class="govuk-heading-xl">Do you want to tell us anything about your documents?</h1>
                                </legend>
                                <p class="govuk-body">If you want to tell us anything about the images you have uploaded, use the space below.</p>
                                <div class="govuk-inset-text">
 If for any reason you have chosen to send us any images of your condition/illness, you should tell us here.  </div>

            <form method="post" enctype="multipart/form-data" novalidate>
            @csrf


                                                    <div class="govuk-character-count" data-module="govuk-character-count" data-maxlength="100">
    <div class="govuk-form-group">
        <label class="govuk-label" for="/applicant/nominee-details/nominee-details">
        <span class="govuk-visually-hidden">What type of treatment did you receive?</span>
    </label>
                <textarea class="govuk-textarea  govuk-js-character-count " id="/applicant/nominee-details/nominee-details"
                  name="/applicant/nominee-details/nominee-details" rows="5"
                                    aria-describedby="/applicant/nominee-details/nominee-details-info" maxlength="750">{{$fileinfo['data'] ?? ''}}</textarea>
                    <div id="/applicant/nominee-details/nominee-details-info" class="govuk-hint govuk-character-count__message" aria-live="polite">
                You can enter up to 750 characters
            </div>
    </div>
    </div>



                <div class="govuk-form-group">

        <div class="govuk-form-group">
            <button class="govuk-button govuk-!-margin-right-2" data-module="govuk-button">Save and continue</button>
        </div>



@include('framework.bottombuttons')

    </div>
    </div>
            </form>
            </div>
        </div>
    </main>
</div>






@include('framework.footer')


