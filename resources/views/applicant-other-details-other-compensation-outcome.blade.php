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
    if (!empty($data['sections']['other-compensation']['outcome'])) {
        $details['data']            = @$data['sections']['other-compensation']['outcome'];
    }
} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {


    //set the entered field names

    $details['data'] = cleanTextData($_POST['/other-compensation/claim-outcome/claim-outcome-benefactor']);





    if (empty($_POST['/other-compensation/claim-outcome/claim-outcome-benefactor'])) {
        $errors = 'Y';
        $errorsList[] = '<a href="#/other-compensation/claim-outcome/claim-outcome-benefactor">Tell us who you claimed from</a>';
        $details['error'] = 'govuk-form-group--error';
        $details['errorLabel'] =
        '<span id="/other-compensation/claim-outcome/claim-outcome-benefactor-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Tell us who you claimed from
         </span>';

    } else {
        $data['sections']['other-compensation']['outcome'] = cleanTextData($_POST['/other-compensation/claim-outcome/claim-outcome-benefactor']);
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
        $theURL = '/applicant/other-details/other-compensation/payment';
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
                                <h1 class="govuk-heading-xl">Who did you claim from?</h1>
                                <p class="govuk-body">Include any reference numbers you have.</p>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-character-count" data-module="govuk-character-count" data-maxlength="500">
    <div class="govuk-form-group {{$details['error']}}">
@php echo $details['errorLabel']; @endphp
                <textarea class="govuk-textarea  govuk-js-character-count " id="/other-compensation/claim-outcome/claim-outcome-benefactor"
                  name="/other-compensation/claim-outcome/claim-outcome-benefactor" rows="5" maxlength="500"
                                    aria-describedby="/other-compensation/claim-outcome/claim-outcome-benefactor-info ">{{$details['data']}}</textarea>
                    <div id="/other-compensation/claim-outcome/claim-outcome-benefactor-info" class="govuk-hint govuk-character-count__message" aria-live="polite">
                You can enter up to 500 characters
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
