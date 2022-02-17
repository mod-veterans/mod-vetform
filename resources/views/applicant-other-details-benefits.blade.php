@include('framework.functions')
@php


//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$benefits = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);


if (empty($_POST)) {
    //load the data if set
    if (!empty($data['sections']['other-benefits'])) {
        $benefits['data']            = @$data['sections']['other-benefits']['benefits'];

    }

} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {

    if (empty( $_POST['/other-benefits/receiving-other-benefits/receiving-benefits'])) {

            $errors = 'Y';
            $errorsList[] = '<a href="#/other-benefits/receiving-other-benefits/receiving-benefits">Please tell us if you are currently receiving or applying for any of the below.</a>';
            $benefits['error'] = 'govuk-form-group--error';
            $benefits['errorLabel'] =
            '<span id="/other-benefits/receiving-other-benefits/receiving-benefits-error" class="govuk-error-message">
                <span class="govuk-visually-hidden">Error:</span>Please tell us if you are currently receiving or applying for any of the below.
             </span>';


    } else {


    //set the entered field names
        $benefitsarray          = $_POST['/other-benefits/receiving-other-benefits/receiving-benefits'];

        $benefits['data']  = implode(', ',$benefitsarray);

               $data['sections']['other-benefits']['benefits'] = $benefits['data'];

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

        $theURL = '/applicant/other-details/benefits/other-payments';
        if (!empty($_GET['return'])) {
            if ($rURL = cleanURL($_GET['return'])) {
                $theURL = $rURL;
            }
        }

        header("Location: ".$theURL);
        die();

    }

}

//sort out which ones to display


$showArr = explode(', ',$benefits['data']);

foreach ($showArr as $cur) {
    $benefitschk[$cur] = ' checked';
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

                                <p class="govuk-heading-xl">Other benefits, allowances or entitlements </p>

                                <p class="govuk-body">
    Payments from the Armed Forces Compensation Scheme and War Pension Scheme may affect benefits from the Department for Work and Pensions (DWP) or other authorities. You must tell them if you later get a payment from us.</p>


            <form method="post" enctype="multipart/form-data" novalidate >
            @csrf
                                                    <div class="govuk-form-group" {{$benefits['error']}};>
    <fieldset class="govuk-fieldset" aria-describedby="contact-hint">
@php echo $benefits['errorLabel']; @endphp

  <legend class="govuk-fieldset__legend govuk-fieldset__legend--m">
                                <h1 class="govuk-heading-l">Do you get or have you applied for any of the following? </h1>
    </legend>
        <div id="contact-hint" class="govuk-hint">Please tick all that apply.</div>
                                <div class="govuk-checkboxes" data-module="govuk-checkboxes">
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="61668e5b34e44" name="/other-benefits/receiving-other-benefits/receiving-benefits[]" type="checkbox"
           value="Tax credits paid to you or your family"     {{$benefitschk['Tax credits paid to you or your family'] ?? ''}}       >
    <label class="govuk-label govuk-checkboxes__label" for="61668e5b34e44">Universal Credit or tax credits paid to you or your family</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="61668e5b34fa1" name="/other-benefits/receiving-other-benefits/receiving-benefits[]" type="checkbox"
           value="Housing Benefit or Council Tax Benefit"    {{$benefitschk['Housing Benefit or Council Tax Benefit'] ?? ''}}          >
    <label class="govuk-label govuk-checkboxes__label" for="61668e5b34fa1">Housing Benefit or Council Tax Benefit (if not paid as Universal Credit)</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="61668e5b350b3" name="/other-benefits/receiving-other-benefits/receiving-benefits[]" type="checkbox"
           value="Industrial Injuries Disablement Benefit"    {{$benefitschk['Industrial Injuries Disablement Benefit'] ?? ''}}         >
    <label class="govuk-label govuk-checkboxes__label" for="61668e5b350b3">Industrial Injuries Disablement Benefit</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="61668e5b351ab" name="/other-benefits/receiving-other-benefits/receiving-benefits[]" type="checkbox"
           value="None of the above"       {{$benefitschk['None of the above'] ?? ''}}      >
    <label class="govuk-label govuk-checkboxes__label" for="61668e5b351ab">None of the above</label>
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
