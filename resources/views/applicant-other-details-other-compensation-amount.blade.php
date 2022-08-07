@include('framework.functions')
@php


//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$amount = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);


if (empty($_POST)) {
    //load the data if set
    if (!empty($data['sections']['other-compensation']['amount'])) {
        $amount['data']            = @$data['sections']['other-compensation']['amount'];
    }
} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {


    //set the entered field names

    $amount['data'] = cleanTextData($_POST['/other-compensation/other-payment-received/amount-paid']);





    if (empty($_POST['/other-compensation/other-payment-received/amount-paid'])) {
        $errors = 'Y';
        $errorsList[] = '<a href="#/other-compensation/other-payment-received/amount-paid">Tell us the amount of payment you received</a>';
        $amount['error'] = 'govuk-form-group--error';
        $amount['errorLabel'] =
        '<span id="/other-compensation/other-payment-received/amount-paid-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Tell us the amount of payment you received
         </span>';

    } else {
        $data['sections']['other-compensation']['amount'] = cleanTextData($_POST['/other-compensation/other-payment-received/amount-paid']);
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
        $theURL = '/applicant/other-details/other-compensation/type';
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
                                <h1 class="govuk-heading-xl">How much did you get?</h1>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group {{$amount['error']}}">
    <label class="govuk-label" for="/other-compensation/other-payment-received/amount-paid">
        Amount paid
    </label>
@php echo $amount['errorLabel']; @endphp
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/other-compensation/other-payment-received/amount-paid" name="/other-compensation/other-payment-received/amount-paid" type="text"
                   value="{{$amount['data']}}"
            >
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
