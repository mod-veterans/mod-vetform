@include('framework.functions')
@php


//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$providebank = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);


if (empty($_POST)) {
    //load the data if set
    if (!empty($data['sections']['other-benefits']['other-paid'])) {
        $providebank['data']            = @$data['sections']['bank-account']['providebank'];
        $providebankchk[$providebank['data']] = ' checked';
    }
} else {


}



//as this is a journey-deciding page, we want to detect a change in choice (if returning from a CYA page) so we can
//kill off the return URL

if ( (!empty($_POST['/payment-details/bank-details/bank-details'])) && (!empty($data['sections']['bank-account']['providebank'])) &&
($data['sections']['bank-account']['providebank'] == $_POST['/payment-details/bank-details/bank-details']) ) {

    //same choice, return applies

} else {

   unset($_GET['return']);

}



if (!empty($_POST)) {


    //set the entered field names


    if (!empty($_POST['/payment-details/bank-details/bank-details'])) {


        switch ($_POST['/payment-details/bank-details/bank-details']) {

            case "Yes":
                $data['sections']['bank-account']['providebank'] = 'Yes';
                $providebankchk['Yes'] = ' checked';
                $theURL = '/applicant/payment-details/bank-location';

            break;

            case "No I am still serving so any payments will be made into my JPA salary account":
                $data['sections']['bank-account']['providebank'] = 'No I am still serving so any payments will be made into my JPA salary account';
                $providebankchk['No I am still serving so any payments will be made into my JPA salary account'] = ' checked';
                $theURL = '/applicant/payment-details/check-answers';
            break;

            case "No I do not want to provide details now.  Please contact me again if my claim is successful":
                $data['sections']['bank-account']['providebank'] = 'No I do not want to provide details now.  Please contact me again if my claim is successful';
                $providebankchk['No I do not want to provide details now.  Please contact me again if my claim is successful'] = ' checked';
                $theURL = '/applicant/payment-details/check-answers';
            break;

            default:
                die('unexpected input');
            break;


        }



    } else {

        $errors = 'Y';
        $errorsList[] = '<a href="#/payment-details/bank-details/bank-details">Please tell us if you would like to provide your bank account details</a>';
        $providebank['error'] = 'govuk-form-group--error';
        $providebank['errorLabel'] =
        '<span id="/payment-details/bank-details/bank-details-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Please tell us if you would like to provide your bank account details
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
                                <h1 class="govuk-heading-xl">Providing your bank account details</h1>
    </legend>
                                <p class="govuk-body">Providing your bank account details now will speed up the payment process if your claim is successful.
                       If you would prefer not to provide your account details now, we will contact you again if any money
                       is due to you after your claim is assessed.  This may mean any payment due could take longer to be received.</p>
                       <p class="govuk-body">
                           <strong>Note for Serving Personnel only:</strong>
                           If you are currently serving and receive your pay via the JPA system, we will pay any money due into the account your salary is paid into.
                       </p>

            <form method="post" enctype="multipart/form-data" novalidate>
            @csrf
                                                    <div class="govuk-form-group {{$providebank['error']}} ">
    <a id="/payment-details/bank-details/bank-details"></a>
    <fieldset class="govuk-fieldset">
@php echo $providebank['errorLabel']; @endphp

                                            <div
            class="govuk-radios"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/payment-details/bank-details/bank-details-yes" name="/payment-details/bank-details/bank-details" type="radio"
           value="Yes"     {{$providebankchk['Yes'] ?? ''}}       >
    <label class="govuk-label govuk-radios__label" for="/payment-details/bank-details/bank-details-yes">Yes</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/payment-details/bank-details/bank-details-no-i-am-still-serving-so-any-payments-will-be-made-into-my-j-p-a-salary-account" name="/payment-details/bank-details/bank-details" type="radio"
           value="No I am still serving so any payments will be made into my JPA salary account"    {{$providebankchk['No I am still serving so any payments will be made into my JPA salary account'] ?? ''}}         >
    <label class="govuk-label govuk-radios__label" for="/payment-details/bank-details/bank-details-no-i-am-still-serving-so-any-payments-will-be-made-into-my-j-p-a-salary-account">No I am still serving so any payments will be made into my JPA salary account</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/payment-details/bank-details/bank-details-no-i-do-not-want-to-provide-details-now.-please-contact-me-again-if-my-claim-is-successful" name="/payment-details/bank-details/bank-details" type="radio"
           value="No I do not want to provide details now.  Please contact me again if my claim is successful"    {{$providebankchk['No I do not want to provide details now.  Please contact me again if my claim is successful'] ?? ''}}        >
    <label class="govuk-label govuk-radios__label" for="/payment-details/bank-details/bank-details-no-i-do-not-want-to-provide-details-now.-please-contact-me-again-if-my-claim-is-successful">No I do not want to provide details now.  Please contact me again if my claim is successful</label>
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
