@include('framework.functions')
@php


//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$banklocation = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);


if (empty($_POST)) {
    //load the data if set
    if (!empty($data['sections']['bank-account']['banklocation'])) {
        $banklocation['data']            = @$data['sections']['bank-account']['banklocation'];
        $banklocationchk[$banklocation['data']] = ' checked';
    }
} else {


}



//as this is a journey-deciding page, we want to detect a change in choice (if returning from a CYA page) so we can
//kill off the return URL

if ( (!empty($_POST['/payment-details/bank-location/bank-location'])) && (!empty($data['sections']['bank-account']['banklocation'])) &&
($data['sections']['bank-account']['banklocation'] == $_POST['/payment-details/bank-location/bank-location']) ) {

    //same choice, return applies

} else {

   unset($_GET['return']);

}



if (!empty($_POST)) {


    //set the entered field names


    if (!empty($_POST['/payment-details/bank-location/bank-location'])) {


        switch ($_POST['/payment-details/bank-location/bank-location']) {

            case "In the United Kingdom":
                $data['sections']['bank-account']['banklocation'] = 'In the United Kingdom';
                $banklocationchk['In the United Kingdom'] = ' checked';
                $theURL = '/applicant/payment-details/bank-location/uk';

            break;

            case "Overseas":
                $data['sections']['bank-account']['banklocation'] = 'Overseas';
                $providebankchk['Overseas'] = ' checked';
                $theURL = '/applicant/payment-details/bank-location/overseas';
            break;


            default:
                die('unexpected input');
            break;


        }



    } else {

        $errors = 'Y';
        $errorsList[] = '<a href="#/payment-details/bank-location/bank-location">Select where your bank is located</a>';
        $banklocation['error'] = 'govuk-form-group--error';
        $banklocation['errorLabel'] =
        '<span id="/payment-details/bank-location/bank-location-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Select where your bank is located
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
                                <h1 class="govuk-heading-xl">Where is your bank account?</h1>
                                <form method="post" enctype="multipart/form-data" novalidate >
                                @csrf
                                                    <div class="govuk-form-group {{$banklocation['error']}} ">
    <a id="/payment-details/bank-location/bank-location"></a>
    <fieldset class="govuk-fieldset">
    @php echo $banklocation['errorLabel']; @endphp

                                            <div
            class="govuk-radios govuk-radios--inline"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/payment-details/bank-location/bank-location-in-the-united-kingdom" name="/payment-details/bank-location/bank-location" type="radio"
           value="In the United Kingdom"    {{$banklocationchk['In the United Kingdom'] ?? ''}}        >
    <label class="govuk-label govuk-radios__label" for="/payment-details/bank-location/bank-location-in-the-united-kingdom">In the United Kingdom</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/payment-details/bank-location/bank-location-overseas" name="/payment-details/bank-location/bank-location" type="radio"
           value="Overseas"      {{$banklocationchk['Overseas'] ?? ''}}      >
    <label class="govuk-label govuk-radios__label" for="/payment-details/bank-location/bank-location-overseas">Overseas</label>
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
