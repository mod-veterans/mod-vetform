@include('framework.functions')
@php


//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$otherpaid = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);


if (empty($_POST)) {
    //load the data if set
    if (!empty($data['sections']['other-benefits']['other-paid'])) {
        $otherpaid['data']            = @$data['sections']['other-benefits']['other-paid'];
        $otherpaidchk[$otherpaid['data']] = ' checked';
    }
} else {


}



//as this is a journey-deciding page, we want to detect a change in choice (if returning from a CYA page) so we can
//kill off the return URL

if ( (!empty($_POST['/other-benefits/receiving-payments/payments'])) && (!empty($data['sections']['other-benefits']['other-paid'])) &&
($data['sections']['other-benefits']['other-paid'] == $_POST['/other-benefits/receiving-payments/payments']) ) {

    //same choice, return applies

} else {

   unset($_GET['return']);

}



if (!empty($_POST)) {


    //set the entered field names


    if (!empty($_POST['/other-benefits/receiving-payments/payments'])) {


        switch ($_POST['/other-benefits/receiving-payments/payments']) {

            case "Yes":
                $data['sections']['other-benefits']['other-paid'] = 'Yes';
                $otherpaidchk['Yes'] = ' checked';
                $theURL = '/applicant/other-details/benefits/other-payments/details';

            break;

            case "No":
                $data['sections']['other-benefits']['other-paid'] = 'No';
                $otherpaidchk['No'] = ' checked';
                $theURL = '/applicant/other-details/benefits/check-answers';
            break;


            default:
                die('unexpected input');
            break;


        }



    } else {

        $errors = 'Y';
        $errorsList[] = '<a href="#/other-benefits/receiving-payments/payments">Select if you have been paid under these schemes</a>';
        $otherpaid['error'] = 'govuk-form-group--error';
        $otherpaid['errorLabel'] =
        '<span id="/other-benefits/receiving-payments/payments-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Select if you have been paid under these schemes
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
                                <h1 class="govuk-heading-xl">Have you ever been paid any of the following?</h1>
                                <p class="govuk-body">These schemes make payments for certain illnesses caused by exposure to asbestos and dust.</p>
  </legend>
                       <ul class="govuk-list govuk-list--bullet govuk-list--spaced">
                         <li>Diffuse Mesothelioma 2014 Scheme</li>
                         <li>Diffuse Mesothelioma 2008 Scheme</li>
                         <li>The Workers Compensation 1979 Pneumoconiosis Act</li>
                       </ul>

            <form method="post" enctype="multipart/form-data" novalidate >
            @csrf
                                                    <div class="govuk-form-group {{$otherpaid['error']}} ">
    <a id="/other-benefits/receiving-payments/payments"></a>
    <fieldset class="govuk-fieldset">
@php//echo @$otherpaid['errorLabel']; @endphp
                                            <div
            class="govuk-radios govuk-radios--inline"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/other-benefits/receiving-payments/payments-yes" name="/other-benefits/receiving-payments/payments" type="radio"
           value="Yes"   {{$otherpaidchk['Yes'] ?? ''}}      >
    <label class="govuk-label govuk-radios__label" for="/other-benefits/receiving-payments/payments-yes">Yes</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/other-benefits/receiving-payments/payments-no" name="/other-benefits/receiving-payments/payments" type="radio"
           value="No"    {{$otherpaidchk['No'] ?? ''}}         >
    <label class="govuk-label govuk-radios__label" for="/other-benefits/receiving-payments/payments-no">No</label>
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
