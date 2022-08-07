@include('framework.functions')
@php


//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$type = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);


if (empty($_POST)) {
    //load the data if set
    if (!empty($data['sections']['other-compensation']['type'])) {
        $type['data']            = @$data['sections']['other-compensation']['type'];
        $typechk[$type['data']] = ' checked';
    }
} else {


}


if (!empty($_POST)) {


    //set the entered field names


    if (!empty($_POST['/other-compensation/claim-payment-type/claim-outcome-payment-type'])) {


        switch ($_POST['/other-compensation/claim-payment-type/claim-outcome-payment-type']) {

            case "Interim payment":
                $data['sections']['other-compensation']['type'] = 'Interim payment';
               $typechk['Interim payment'] = ' checked';

            break;

            case "Final settlement":
                $data['sections']['other-compensation']['type'] = 'Final settlement';
                 $typechk['Final settlement'] = ' checked';
            break;


            default:
                die('unexpected input');
            break;


        }



    } else {

        $errors = 'Y';
        $errorsList[] = '<a href="#/other-compensation/claim-payment-type/claim-outcome-payment-type">Tell us what type of payment</a>';
        $type['error'] = 'govuk-form-group--error';
        $type['errorLabel'] =
        '<span id="/other-compensation/claim-payment-type/claim-outcome-payment-type-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Tell us what type of payment
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
        $theURL = '/applicant/other-details/other-compensation/when';

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
                                <h1 class="govuk-heading-xl">What type of payment was this?</h1>
</legend>
                                <p class="govuk-body">Was this a final settlement or an interim payment made before a full and final decision.</p>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group {{$type['error']}} ">
    <a id="/other-compensation/claim-payment-type/claim-outcome-payment-type"></a>
    <fieldset class="govuk-fieldset">
@php echo $type['errorLabel']; @endphp
     <div
            class="govuk-radios govuk-radios--inline">
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/other-compensation/claim-payment-type/claim-outcome-payment-type-interim-settlement" name="/other-compensation/claim-payment-type/claim-outcome-payment-type" type="radio"
           value="Interim payment"     {{$typechk['Interim payment'] ?? ''}}       >
    <label class="govuk-label govuk-radios__label" for="/other-compensation/claim-payment-type/claim-outcome-payment-type-interim-settlement">Interim payment</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/other-compensation/claim-payment-type/claim-outcome-payment-type-final-settlement" name="/other-compensation/claim-payment-type/claim-outcome-payment-type" type="radio"
           value="Final settlement"    {{$typechk['Final settlement'] ?? ''}}        >
    <label class="govuk-label govuk-radios__label" for="/other-compensation/claim-payment-type/claim-outcome-payment-type-final-settlement">Final settlement</label>
</div>

                    </div>
    </fieldset>
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
