@include('framework.functions')
@php

//Add in the auto-complete for country
$footerScripts = array();
$footerScripts[] = '
<script type="text/javascript" src="https://modvets-dev2.london.cloudapps.digital/js/location-autocomplete.min.js"></script>
    <script type="text/javascript">
        openregisterLocationPicker({
            selectElement: document.getElementById("/other-compensation/claim-solicitor-details/claim-solicitor__country"),
            url: "/assets/data/location-autocomplete-graph.json"

        })
</script>

';


//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields


$bankname = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$accountname = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$iban = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$bsbcode = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$swiftcode = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$transitroute = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$accountreason = array('data'=>'', 'error'=>'', 'errorLabel'=>'');



//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);



if (empty($_POST)) {
    //load the data if set
    if (!empty($data['sections']['bank-account']['overseas-bank-address'])) {


        $bankname['data']                   = @$data['sections']['bank-account']['overseas-bank-address']['bankname'];
        $accountname['data']               = @$data['sections']['bank-account']['overseas-bank-address']['accountname'];
        $iban['data']                       = @$data['sections']['bank-account']['overseas-bank-address']['iban'];
        $bsbcode['data']                    = @$data['sections']['bank-account']['overseas-bank-address']['bsbcode'];
        $swiftcode['data']                  = @$data['sections']['bank-account']['overseas-bank-address']['swiftcode'];
        $transitroute['data']               = @$data['sections']['bank-account']['overseas-bank-address']['transitroute'];
        $accountreason['data']               = @$data['sections']['bank-account']['overseas-bank-address']['accountreason'];



    }
} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {


    //set the entered field names

    $bankname['data'] = cleanTextData($_POST['/payment-details/bank-united-kingdom/bank-name']);
    $accountname['data'] = cleanTextData($_POST['/payment-details/bank-overseas/bank-account-name']);
    $iban['data'] = cleanTextData($_POST['/payment-details/bank-overseas/bank-account-iban']);
    $bsbcode['data'] = cleanTextData($_POST['/payment-details/bank-overseas/bank-account-bsb']);
    $swiftcode['data'] = cleanTextData($_POST['/payment-details/bank-overseas/bank-account-bic']);
    $transitroute['data'] = cleanTextData($_POST['/payment-details/bank-overseas/bank-account-transit']);
    $accountreason['data'] = cleanTextData($_POST['/payment-details/bank-overseas/bank-account-confirmation']);




    if (empty($_POST['/payment-details/bank-united-kingdom/bank-name'])) {

        $errors = 'Y';
        $errorsList[] = '<a href="#/payment-details/bank-united-kingdom/bank-name">Please give us the name of your bank</a>';
        $address1['error'] = 'govuk-form-group--error';
        $address1['errorLabel'] =
        '<span id="/payment-details/bank-united-kingdom/bank-name-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Please give us the name of your bank
         </span>';



    } else {
        $data['sections']['bank-account']['overseas-bank-address']['bankname'] = cleanTextData($_POST['/payment-details/bank-united-kingdom/bank-name']);
    }


    if (empty($_POST['/payment-details/bank-overseas/bank-account-name'])) {

        $errors = 'Y';
        $errorsList[] = '<a href="#/payment-details/bank-overseas/bank-account-name">Please give us the name on this account</a>';
        $address1['error'] = 'govuk-form-group--error';
        $address1['errorLabel'] =
        '<span id="/payment-details/bank-overseas/bank-account-name-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Please give us the name on this account
         </span>';


    } else {
        $data['sections']['bank-account']['overseas-bank-address']['accountname'] = cleanTextData($_POST['/payment-details/bank-overseas/bank-account-name']);
    }

    if (empty($_POST['/payment-details/bank-overseas/bank-account-iban'])) {

        $errors = 'Y';
        $errorsList[] = '<a href="#/payment-details/bank-overseas/bank-account-iban">Please give us the account IBAN</a>';
        $address1['error'] = 'govuk-form-group--error';
        $address1['errorLabel'] =
        '<span id="/payment-details/bank-overseas/bank-account-iban-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Please give us the account IBAN
         </span>';

    } else {
        $data['sections']['bank-account']['overseas-bank-address']['iban'] = cleanTextData($_POST['/payment-details/bank-overseas/bank-account-iban']);
    }

    if (empty($_POST['/payment-details/bank-overseas/bank-account-bsb'])) {

    } else {
        $data['sections']['bank-account']['overseas-bank-address']['bsbcode'] = cleanTextData($_POST['/payment-details/bank-overseas/bank-account-bsb']);
    }

    if (empty($_POST['/payment-details/bank-overseas/bank-account-bic'])) {

    } else {
        $data['sections']['bank-account']['overseas-bank-address']['swiftcode'] = cleanTextData($_POST['/payment-details/bank-overseas/bank-account-bic']);
    }

    if (empty($_POST['/payment-details/bank-overseas/bank-account-transit'])) {

    } else {
        $data['sections']['bank-account']['overseas-bank-address']['transitroute'] = cleanTextData($_POST['/payment-details/bank-overseas/bank-account-transit']);
    }

    if (empty($_POST['/payment-details/bank-overseas/bank-account-confirmation'])) {

    } else {
        $data['sections']['bank-account']['overseas-bank-address']['accountreason'] = cleanTextData($_POST['/payment-details/bank-overseas/bank-account-confirmation']);
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

        $theURL = '/applicant/payment-details/check-answers';
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
                                <h1 class="govuk-heading-xl">Overseas bank account details</h1>
                                <p class="govuk-body">You can ask your bank or check your bank statement for these details.</p>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf

  <div class="govuk-form-group ">
    <label class="govuk-label" for="/payment-details/bank-united-kingdom/bank-name">
        Name of bank or account provider
    </label>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/payment-details/bank-united-kingdom/bank-name" name="/payment-details/bank-united-kingdom/bank-name" type="text"
                   value="{{$bankname['data']}}"
            >
</div>





                                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="/payment-details/bank-overseas/bank-account-name">
        Name on the account
    </label>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/payment-details/bank-overseas/bank-account-name" name="/payment-details/bank-overseas/bank-account-name" type="text"
         autocomplete="name"
                  value="{{$accountname['data']}}"
            >
</div>

                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="/payment-details/bank-overseas/bank-account-iban">
        International Bank Account Number (IBAN)
    </label>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/payment-details/bank-overseas/bank-account-iban" name="/payment-details/bank-overseas/bank-account-iban" type="numeric"
                   value="{{$iban['data']}}"
            >
</div>

                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="/payment-details/bank-overseas/bank-account-bsb">
        BSB Code
    </label>
    <div id="/payment-details/bank-united-kingdom/bank-account-sort-code-hint" class="govuk-hint">Bank State Branch Code (if used in your country)</div>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/payment-details/bank-overseas/bank-account-iban" name="/payment-details/bank-overseas/bank-account-bsb" type="numeric"
                   value="{{$bsbcode['data']}}"
            >
</div>


                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="/payment-details/bank-overseas/bank-account-bic">
        BIC (Business Identifier Code) or SWIFT code
    </label>
    <div id="/payment-details/bank-overseas/bank-account-bic" class="govuk-hint">Must be between 8 and 11 digits long.</div>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/payment-details/bank-overseas/bank-account-bic" name="/payment-details/bank-overseas/bank-account-bic" type="numeric"
                   value="{{$swiftcode['data']}}"
            >
</div>

                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="/payment-details/bank-overseas/bank-account-transit">
        Transit Routing Number
    </label>
    <div id="/payment-details/bank-overseas/bank-account-transit-hint" class="govuk-hint">if used in your country</div>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/payment-details/bank-overseas/bank-account-transit" name="/payment-details/bank-overseas/bank-account-transit" type="numeric"
                   value="{{$transitroute['data']}}"
            >
</div>



                                    <div class="govuk-character-count" data-module="govuk-character-count" data-maxlength="100">
    <div class="govuk-form-group">
        <label class="govuk-label" for="/payment-details/bank-overseas/bank-account-confirmation">
        If this is not your account, tell us whose account it is and why you want to use it.
    </label>
                <textarea class="govuk-textarea  govuk-js-character-count " id="/payment-details/bank-overseas/bank-account-confirmation"
                  name="/payment-details/bank-overseas/bank-account-confirmation" rows="5" maxlength="100"
                                    aria-describedby="/payment-details/bank-overseas/bank-account-confirmation-info ">{{$accountreason['data']}}</textarea>
                    <div id="/payment-details/bank-overseas/bank-account-confirmation-info" class="govuk-hint govuk-character-count__message" aria-live="polite">
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
