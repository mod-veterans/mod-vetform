@include('framework.functions')
@php


//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields

$bankname = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$accountname = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$sortcode = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$accountnumber = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$rollnumber = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$accountreason = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);



if (empty($_POST)) {
    //load the data if set
    if (!empty($data['sections']['bank-account']['bank-address'])) {

        $bankname['data']            = @$data['sections']['bank-account']['bank-address']['bankname'];
        $accountname['data']            = @$data['sections']['bank-account']['bank-address']['accountname'];
        $sortcode['data']                = @$data['sections']['bank-account']['bank-address']['sortcode'];
        $accountnumber['data']              = @$data['sections']['bank-account']['bank-address']['accountnumber'];
        $rollnumber['data']             = @$data['sections']['bank-account']['bank-address']['rollnumber'];
        $accountreason['data']            = @$data['sections']['bank-account']['bank-address']['accountreason'];


    }
} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {


    //set the entered field names

    $bankname['data'] = cleanTextData($_POST['/payment-details/bank-united-kingdom/bank-name']);
    $accountname['data'] = cleanTextData($_POST['/payment-details/bank-united-kingdom/bank-account-name']);
    $sortcode['data'] = cleanTextData($_POST['/payment-details/bank-united-kingdom/bank-account-sort-code']);
    $accountnumber['data'] = cleanTextData($_POST['/payment-details/bank-united-kingdom/bank-account-number']);
    $rollnumber['data'] = cleanTextData($_POST['/payment-details/bank-united-kingdom/bank-account-number']);
    $accountreason['data'] = cleanTextData($_POST['/payment-details/bank-united-kingdom/bank-account-roll-number']);





    if (empty($_POST['/payment-details/bank-united-kingdom/bank-name'])) {

        $errors = 'Y';
        $errorsList[] = '<a href="#/payment-details/bank-united-kingdom/bank-name">Tell us the name of your bank</a>';
        $bankname['error'] = 'govuk-form-group--error';
        $bankname['errorLabel'] =
        '<span id="/payment-details/bank-united-kingdom/bank-name-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Tell us the name of your bank
         </span>';



    } else {
        $data['sections']['bank-account']['bank-address']['bankname'] = cleanTextData($_POST['/payment-details/bank-united-kingdom/bank-name']);
    }



    if (empty($_POST['/payment-details/bank-united-kingdom/bank-account-name'])) {

        $errors = 'Y';
        $errorsList[] = '<a href="#/payment-details/bank-united-kingdom/bank-account-name">Tell us the name on this account</a>';
        $accountname['error'] = 'govuk-form-group--error';
        $accountname['errorLabel'] =
        '<span id="/payment-details/bank-united-kingdom/bank-account-name-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Tell us the name on this account
         </span>';



    } else {
        $data['sections']['bank-account']['bank-address']['accountname'] = cleanTextData($_POST['/payment-details/bank-united-kingdom/bank-account-name']);
    }



    if (empty($_POST['/payment-details/bank-united-kingdom/bank-account-sort-code'])) {

        $errors = 'Y';
        $errorsList[] = '<a href="#/payment-details/bank-united-kingdom/bank-account-sort-code">Tell us your sort code</a>';
        $sortcode['error'] = 'govuk-form-group--error';
        $sortcode['errorLabel'] =
        '<span id="/payment-details/bank-united-kingdom/bank-account-sort-code-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Tell us your sort code
         </span>';


    } else {
        $data['sections']['bank-account']['bank-address']['sortcode'] = cleanTextData($_POST['/payment-details/bank-united-kingdom/bank-account-sort-code']);
    }



    if (empty($_POST['/payment-details/bank-united-kingdom/bank-account-number'])) {


        $errors = 'Y';
        $errorsList[] = '<a href="#/payment-details/bank-united-kingdom/bank-account-number">Tell us your account number</a>';
        $accountnumber['error'] = 'govuk-form-group--error';
        $accountnumber['errorLabel'] =
        '<span id="/payment-details/bank-united-kingdom/bank-account-number-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Tell us your account number
         </span>';




    } else {
        $data['sections']['bank-account']['bank-address']['accountnumber'] = cleanTextData($_POST['/payment-details/bank-united-kingdom/bank-account-number']);
    }



    if (empty($_POST['/payment-details/bank-united-kingdom/bank-account-roll-number'])) {


    } else {
        $data['sections']['bank-account']['bank-address']['rollnumber'] = cleanTextData($_POST['/payment-details/bank-united-kingdom/bank-account-roll-number']);
    }


    if (empty($_POST['/payment-details/bank-united-kingdom/bank-account-confirmation'])) {

    } else {
        $data['sections']['bank-account']['bank-address']['accountreason'] = cleanTextData($_POST['/payment-details/bank-united-kingdom/bank-account-confirmation']);
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

                                <h1 class="govuk-heading-xl">UK bank or building society account details</h1>
                                <div class="govuk-body">You can ask your bank or check your bank statement for these details.</div>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group {{$bankname['error']}} ">
    @php echo $bankname['errorLabel']; @endphp
    <label class="govuk-label" for="/payment-details/bank-united-kingdom/bank-name">
        Name of bank, building society or other account provider
    </label>

            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/payment-details/bank-united-kingdom/bank-name" name="/payment-details/bank-united-kingdom/bank-name" type="text"
                   value="{{$bankname['data']}}"
            >
</div>
                                    <div class="govuk-form-group {{$accountname['error']}}">
@php echo $accountname['errorLabel']; @endphp
    <label class="govuk-label" for="/payment-details/bank-united-kingdom/bank-account-name">
        Name on the account
    </label>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/payment-details/bank-united-kingdom/bank-account-name" name="/payment-details/bank-united-kingdom/bank-account-name" type="text"
         autocomplete="name"
                  value="{{$accountname['data']}}"
            >
</div>
                                    <div class="govuk-form-group {{$sortcode['error']}}">
@php echo $sortcode['errorLabel']; @endphp
    <label class="govuk-label" for="/payment-details/bank-united-kingdom/bank-account-sort-code">
        Sort code
    </label>
    <div id="/payment-details/bank-united-kingdom/bank-account-sort-code-hint" class="govuk-hint">Must be 6 digits</div>
        <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/payment-details/bank-united-kingdom/bank-account-sort-code" name="/payment-details/bank-united-kingdom/bank-account-sort-code" type="numeric"
                   value="{{$sortcode['data']}}"
                aria-describedby="/payment-details/bank-united-kingdom/bank-account-sort-code-hint"
            >
</div>
                                    <div class="govuk-form-group {{$accountnumber['error']}}">
 @php echo $accountnumber['errorLabel']; @endphp
    <label class="govuk-label" for="/payment-details/bank-united-kingdom/bank-account-number">
        Account number
    </label>
    <div id="/payment-details/bank-united-kingdom/bank-account-account-number-hint" class="govuk-hint">Must be between 6 and 8 digits</div>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/payment-details/bank-united-kingdom/bank-account-number" name="/payment-details/bank-united-kingdom/bank-account-number" type="numeric"
                   value="{{$accountnumber['data']}}" aria-describedby="/payment-details/bank-united-kingdom/bank-account-account-number-hint"
            >
</div>
                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="/payment-details/bank-united-kingdom/bank-account-roll-number">
        Building society roll number (if you have one)
    </label>
    <div id="/payment-details/bank-united-kingdom/bank-account-roll-number-hint" class="govuk-hint">You can find it on your card, statement or passbook.</div>
        <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/payment-details/bank-united-kingdom/bank-account-roll-number" name="/payment-details/bank-united-kingdom/bank-account-roll-number" type="numeric"
                   value="{{$rollnumber['data']}}"
                aria-describedby="/payment-details/bank-united-kingdom/bank-account-roll-number-hint"
            >
</div>
                                    <div class="govuk-character-count" data-module="govuk-character-count" data-maxlength="100">
    <div class="govuk-form-group">
        <label class="govuk-label" for="/payment-details/bank-united-kingdom/bank-account-confirmation">
        If this is not your account, tell us whose account it is and why you want to use it.
    </label>
                <textarea class="govuk-textarea  govuk-js-character-count " id="/payment-details/bank-united-kingdom/bank-account-confirmation"
                  name="/payment-details/bank-united-kingdom/bank-account-confirmation" rows="5" maxlength="100"
                                    aria-describedby="/payment-details/bank-united-kingdom/bank-account-confirmation-info ">{{$accountreason['data']}}</textarea>
                    <div id="/payment-details/bank-united-kingdom/bank-account-confirmation-info" class="govuk-hint govuk-character-count__message" aria-live="polite">
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
        </div>
    </main>
</div>



@include('framework.footer')
