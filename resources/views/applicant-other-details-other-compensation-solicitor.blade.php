@include('framework.functions')
@php


//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$solicitorhelp = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);


if (empty($_POST)) {
    //load the data if set
    if (!empty($data['sections']['other-compensation']['solicitorhelp'])) {
        $solicitorhelp['data']            = @$data['sections']['other-compensation']['solicitorhelp'];
        $solicitorhelpchk[$solicitorhelp['data']] = ' checked';
    }
} else {


}



//as this is a journey-deciding page, we want to detect a change in choice (if returning from a CYA page) so we can
//kill off the return URL

if ( (!empty($_POST['/other-compensation/claim-solicitor-help/claim-solicitor-help'])) && (!empty($data['sections']['other-compensation']['solicitorhelp'])) &&
($data['sections']['other-compensation']['solicitorhelp'] == $_POST['/other-compensation/claim-solicitor-help/claim-solicitor-help']) ) {

    //same choice, return applies

} else {

   unset($_GET['return']);

}



if (!empty($_POST)) {


    //set the entered field names


    if (!empty($_POST['/other-compensation/claim-solicitor-help/claim-solicitor-help'])) {


        switch ($_POST['/other-compensation/claim-solicitor-help/claim-solicitor-help']) {

            case "Yes":
                $data['sections']['other-compensation']['solicitorhelp'] = 'Yes';
                $solicitorhelpchk['Yes'] = ' checked';
                $theURL = '/applicant/other-details/other-compensation/solicitor/details';

            break;

            case "No":
                $data['sections']['other-compensation']['solicitorhelp'] = 'No';
                 $solicitorhelpchk['No'] = ' checked';
                $theURL = '/applicant/other-details/other-compensation/check-answers';
            break;


            default:
                die('unexpected input');
            break;


        }



    } else {

        $errors = 'Y';
        $errorsList[] = '<a href="#/other-compensation/claim-solicitor-help/claim-solicitor-help-yes">Did a solicitor help you?</a>';
        $solicitorhelp['error'] = 'govuk-form-group--error';
        $solicitorhelp['errorLabel'] =
        '<span id="/other-compensation/received-compensation/received-compensation-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Did solicitor help you?
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
$page_title = 'Did a solicitor help you?';

@endphp


@include('framework.header')



    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
@php
echo $errorMessage;
@endphp


                                <form method="post" enctype="multip art/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group {{$solicitorhelp['error']}}">
    <a id="/other-compensation/claim-solicitor-help/claim-solicitor-help"></a>
    <fieldset class="govuk-fieldset">
  <legend class="govuk-fieldset__legend govuk-fieldset__legend--l">
                                <h1 class="govuk-heading-xl">Did a solicitor help you?</h1>
</legend>
@php echo $solicitorhelp['errorLabel']; @endphp
                                            <div
            class="govuk-radios govuk-radios--inline"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/other-compensation/claim-solicitor-help/claim-solicitor-help-yes" name="/other-compensation/claim-solicitor-help/claim-solicitor-help" type="radio"
           value="Yes"    {{$solicitorhelpchk['Yes'] ?? ''}}        >
    <label class="govuk-label govuk-radios__label" for="/other-compensation/claim-solicitor-help/claim-solicitor-help-yes">Yes</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/other-compensation/claim-solicitor-help/claim-solicitor-help-no" name="/other-compensation/claim-solicitor-help/claim-solicitor-help" type="radio"
           value="No"     {{$solicitorhelpchk['No'] ?? ''}}       >
    <label class="govuk-label govuk-radios__label" for="/other-compensation/claim-solicitor-help/claim-solicitor-help-no">No</label>
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
