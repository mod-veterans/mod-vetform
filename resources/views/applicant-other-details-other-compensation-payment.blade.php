@include('framework.functions')
@php


//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$payment = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);


if (empty($_POST)) {
    //load the data if set
    if (!empty($data['sections']['other-compensation']['payment'])) {
        $payment['data']            = @$data['sections']['other-compensation']['payment'];
        $paymentchk[$payment['data']] = ' checked';
    }
} else {


}



//as this is a journey-deciding page, we want to detect a change in choice (if returning from a CYA page) so we can
//kill off the return URL

if ( (!empty($_POST['/other-compensation/claim-outcome/claim-outcome-payment-result'])) && (!empty($data['sections']['other-compensation']['payment'])) &&
($data['sections']['other-compensation']['payment'] == $_POST['/other-compensation/claim-outcome/claim-outcome-payment-result']) ) {

    //same choice, return applies

} else {

   unset($_GET['return']);

}



if (!empty($_POST)) {


    //set the entered field names


    if (!empty($_POST['/other-compensation/claim-outcome/claim-outcome-payment-result'])) {


        switch ($_POST['/other-compensation/claim-outcome/claim-outcome-payment-result']) {

            case "Yes":
                $data['sections']['other-compensation']['payment'] = 'Yes';
                $paymentchk['Yes'] = ' checked';
                $theURL = '/applicant/other-details/other-compensation/amount-received';

            break;

            case "No":
                $data['sections']['other-compensation']['payment'] = 'No';
                 $paymentchk['No'] = ' checked';
                $theURL = '/applicant/other-details/other-compensation/check-answers';
            break;


            default:
                die('unexpected input');
            break;


        }



    } else {

        $errors = 'Y';
        $errorsList[] = '<a href="#/other-compensation/claim-outcome/claim-outcome-payment-result">Please tell us if you have received a payment</a>';
        $payment['error'] = 'govuk-form-group--error';
        $payment['errorLabel'] =
        '<span id="/other-compensation/claim-outcome/claim-outcome-payment-result-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Please tell us if you have received a payment
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
                                <h1 class="govuk-heading-xl">Did you receive a payment? </h1>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-character-count" data-module="govuk-character-count" data-maxlength="500">

    </div>
                                    <div class="govuk-form-group {{$payment['error']}} ">
    <a id="/other-compensation/claim-outcome/claim-outcome-payment-result"></a>
    <fieldset class="govuk-fieldset">
@php echo $payment['errorLabel']; @endphp
                                            <div
            class="govuk-radios govuk-radios--inline"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/other-compensation/claim-outcome/claim-outcome-payment-result-yes" name="/other-compensation/claim-outcome/claim-outcome-payment-result" type="radio"
           value="Yes"     {{$paymentchk['Yes'] ?? ''}}       >
    <label class="govuk-label govuk-radios__label" for="/other-compensation/claim-outcome/claim-outcome-payment-result-yes">Yes</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/other-compensation/claim-outcome/claim-outcome-payment-result-no" name="/other-compensation/claim-outcome/claim-outcome-payment-result" type="radio"
           value="No"     {{$paymentchk['No'] ?? ''}}         >
    <label class="govuk-label govuk-radios__label" for="/other-compensation/claim-outcome/claim-outcome-payment-result-no">No</label>
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


@include('framework.footer')
