@include('framework.functions')
@php



//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$paymentday = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$paymentmonth = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$paymentyear = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$paymentapproximate = array('data'=>'', 'error'=>'', 'errorLabel'=>'');



//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);



if (empty($_POST)) {
    //load the data if set
    if (!empty($data['sections']['other-compensation']['payment-date'])) {
        $paymentday['data']           = @$data['sections']['other-compensation']['payment-date']['day'];
        $paymentmonth['data']           = @$data['sections']['other-compensation']['payment-date']['month'];
        $paymentyear['data']           = @$data['sections']['other-compensation']['payment-date']['year'];
        $paymentapproximate['data']   = @$data['sections']['other-compensation']['payment-date']['approximate'];

        if ($paymentapproximate['data'] == 'Yes') {
        $approximatechk = ' checked';
        }


    }
} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {


    //set the entered field names
    $paymentday['data'] = cleanTextData($_POST['/other-compensation/claim-payment-date/claim-payment-date-day']);
    $paymentmonth['data'] = cleanTextData($_POST['/other-compensation/claim-payment-date/claim-payment-date-month']);
    $paymentyear['data'] = cleanTextData($_POST['/other-compensation/claim-payment-date/claim-payment-date-year']);


    if (empty($_POST['/other-compensation/claim-payment-date/claim-payment-date-year'])) {
        $errors = 'Y';
        $errorsList[] = '<a href="#afcs/about-you/service-details/service-rank/service-rank">Please give us at least an approximate year</a>';
        $paymentyear['error'] = 'govuk-form-group--error';
        $paymentyear['errorLabel'] =
        '<span id="afcs/about-you/service-details/service-rank/service-rank-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Please give us at least an approximate year
         </span>';

    } else {

        $data['sections']['other-compensation']['payment-date']['year'] = cleanTextData($_POST['/other-compensation/claim-payment-date/claim-payment-date-year']);

    }

    $data['sections']['other-compensation']['payment-date']['month'] = cleanTextData($_POST['/other-compensation/claim-payment-date/claim-payment-date-month']);
    $data['sections']['other-compensation']['payment-date']['day'] = cleanTextData($_POST['/other-compensation/claim-payment-date/claim-payment-date-day']);


    if (empty($_POST['/other-medical-treatment-end-date/medical-treatment-end-date-estimated'])) {

        $data['sections']['other-compensation']['payment-date']['approximate'] = '';

    } else {


        $data['sections']['other-compensation']['payment-date']['approximate'] = cleanTextData($_POST['/other-medical-treatment-end-date/medical-treatment-end-date-estimated']);
        $approximatechk = ' checked';

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

        $theURL = '/applicant/other-details/other-compensation/solicitor';
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
                                <h1 class="govuk-heading-xl">When did you get this payment?</h1>
</legend>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group {{$paymentyear['error']}}">
    <input name="/other-compensation/claim-payment-date/claim-payment-date-year" type="hidden" value="">
</div>
                                    <div
    class="govuk-form-group "
    aria-describedby="/other-compensation/claim-payment-date/claim-payment-date-hint  ">

    <fieldset class="govuk-fieldset">
@php echo $paymentyear['errorLabel']; @endphp


        <div id="/other-compensation/claim-payment-date/claim-payment-date-hint" class="govuk-hint">For example 27 3 2007. If you can’t remember, enter an approximate year.</div>

        <div class="govuk-date-input" id="/other-compensation/claim-payment-date/claim-payment-date">
                                                <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="/other-compensation/claim-payment-date/claim-payment-date-day">
                                Day
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-2 "
            id="/other-compensation/claim-payment-date/claim-payment-date-day"
            name="/other-compensation/claim-payment-date/claim-payment-date-day" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="2"
            value="{{$paymentday['data']}}">
    </div>
</div>
                                                    <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="/other-compensation/claim-payment-date/claim-payment-date-month">
                                Month
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-2 "
            id="/other-compensation/claim-payment-date/claim-payment-date-month"
            name="/other-compensation/claim-payment-date/claim-payment-date-month" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="2"
            value="{{$paymentmonth['data']}}">
    </div>
</div>
                                                    <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="/other-compensation/claim-payment-date/claim-payment-date-year">
                                Year
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-4 "
            id="/other-compensation/claim-payment-date/claim-payment-date-year"
            name="/other-compensation/claim-payment-date/claim-payment-date-year" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="4"
            value="{{$paymentyear['data']}}">
    </div>
</div>
                                    </div>
    </fieldset>
</div>

                                    <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="61600b80d46d6" name="/other-medical-treatment-end-date/medical-treatment-end-date-estimated" type="checkbox"
           value="Yes"     {{$approximatechk ?? ''}}       >
    <label class="govuk-label govuk-checkboxes__label" for="61600b80d46d6">This date is approximate</label>
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
