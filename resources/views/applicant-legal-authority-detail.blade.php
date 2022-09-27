@include('framework.functions')
@php


//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$details = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);


if (empty($_POST)) {
    //load the data if set
    if (!empty($data['sections']['applicant-who']['legal authority'])) {
        $details['data']            = @$data['sections']['applicant-who']['legal authority']['details'];
    }
} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {


    //set the entered field names

    $details['data'] = cleanTextData($_POST['/applicant/nominee-details/nominee-details']);





    if (empty($_POST['/applicant/nominee-details/nominee-details'])) {
        $errors = 'Y';
        $errorsList[] = '<a href="#/applicant/nominee-details/nominee-details">Tell us what legal authority you have</a>';
        $details['error'] = 'govuk-form-group--error';
        $details['errorLabel'] =
        '<span id="/applicant/nominee-details/nominee-details" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Tell us what legal authority you have
         </span>';

    } else {
        $data['sections']['applicant-who']['legal authority']['details'] = cleanTextData($_POST['/applicant/nominee-details/nominee-details']);
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
        $theURL = '/applicant/legal-authority/information';
        if (!empty($_GET['return'])) {
            if ($rURL = cleanURL($_GET['return'])) {
                $theURL = $rURL;
            }
        }

        header("Location: ".$theURL);
        die();

    }
}

$page_title = 'What legal authority do you have to make a claim for someone else?';

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

<legend class="govuk-fieldset__legend govuk-fieldset__legend--l">
                                <h1 class="govuk-heading-xl">What legal authority do you have to make a claim for someone else?</h1>
</legend>
                                <p class="govuk-body">For example, Power of Attorney held.</p>
    <div class="govuk-character-count" data-module="govuk-character-count" data-maxlength="100">
    <div class="govuk-form-group {{$details['error']}}">
        <label class="govuk-label" for="/applicant/nominee-details/nominee-details">
        @php echo $details['errorLabel']; @endphp
        <span class="govuk-visually-hidden">What legal authority do you have to make a claim on behalf of the person named?</span>
    </label>
                <textarea class="govuk-textarea  govuk-js-character-count " id="/applicant/nominee-details/nominee-details"
                  name="/applicant/nominee-details/nominee-details" rows="5" maxlength="100"
                                    aria-describedby="/applicant/nominee-details/nominee-details-info ">{{$details['data']}}</textarea>
                    <div id="/applicant/nominee-details/nominee-details-info" class="govuk-hint govuk-character-count__message" aria-live="polite">
                You can enter up to 100 characters
            </div>
    </div>
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
