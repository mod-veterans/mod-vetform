@include('framework.functions')
@php


//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$compensation = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);


if (empty($_POST)) {
    //load the data if set
    if (!empty($data['sections']['other-compensation']['received-compensation'])) {
        $compensation['data']            = @$data['sections']['other-compensation']['received-compensation'];
        $compensationchk[$compensation['data']] = ' checked';
    }
} else {


}



//as this is a journey-deciding page, we want to detect a change in choice (if returning from a CYA page) so we can
//kill off the return URL

if ( (!empty($_POST['/other-compensation/received-compensation/received-compensation'])) && (!empty($data['sections']['other-compensation']['received-compensation'])) &&
($data['sections']['other-compensation']['received-compensation'] == $_POST['/other-compensation/received-compensation/received-compensation']) ) {

    //same choice, return applies

} else {

   unset($_GET['return']);

}



if (!empty($_POST)) {


    //set the entered field names


    if (!empty($_POST['/other-compensation/received-compensation/received-compensation'])) {


        switch ($_POST['/other-compensation/received-compensation/received-compensation']) {

            case "Yes":
                $data['sections']['other-compensation']['received-compensation'] = 'Yes';
                $compensationchk['Yes'] = ' checked';
                $theURL = '/applicant/other-details/other-compensation/conditions';

            break;

            case "No":
                $data['sections']['other-compensation']['received-compensation'] = 'No';
                 $compensationchk['No'] = ' checked';
                $theURL = '/applicant/other-details/other-compensation/no/check-answers';
            break;


            default:
                die('unexpected input');
            break;


        }



    } else {

        $errors = 'Y';
        $errorsList[] = '<a href="#/other-compensation/received-compensation/received-compensation">Please tell us if you have received other compensation</a>';
        $compensation['error'] = 'govuk-form-group--error';
        $compensation['errorLabel'] =
        '<span id="/other-compensation/received-compensation/received-compensation-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Please tell us if you have received other compensation
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

                                <h1 class="govuk-heading-xl">Are you claiming for or have you received compensation payments from other sources?</h1>
                                <p class="govuk-body">You only need to tell us about compensation for the medical conditions you are claiming for on this application.</p>
         <p class="govuk-body">Compensation includes any payments from MOD for criminal injuries or civil negligence payments received via the courts.  It includes compensation from civil authorities in Great Britain and Northern Ireland for criminal injuries or any other compensation payments received for the medical conditions you are claiming for.  You do not need to tell us about previous Armed Forces Compensation Scheme or War Pension payments.</p>

            <form method="post" enctype="multipart/form-data" novalidate>
            @csrf
                                                    <div class="govuk-form-group {{$compensation['error']}}">
    <a id="/other-compensation/received-compensation/received-compensation"></a>
    <fieldset class="govuk-fieldset">
                                    <legend
                    class="govuk-fieldset__legend govuk-fieldset__legend--m govuk-visually-hidden">
                    <h1 class
                    ="govuk-fieldset__heading">Are you claiming for or have you received compensation payments from other sources? (required)</h1>
                </legend>
@php echo $compensation['errorLabel']; @endphp
                                            <div
            class="govuk-radios govuk-radios--inline"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/other-compensation/received-compensation/received-compensation-yes" name="/other-compensation/received-compensation/received-compensation" type="radio"
           value="Yes"       @php echo @$compensationchk['Yes']; @endphp     >
    <label class="govuk-label govuk-radios__label" for="/other-compensation/received-compensation/received-compensation-yes">Yes</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/other-compensation/received-compensation/received-compensation-no" name="/other-compensation/received-compensation/received-compensation" type="radio"
           value="No"         @php echo @$compensationchk['No']; @endphp   >
    <label class="govuk-label govuk-radios__label" for="/other-compensation/received-compensation/received-compensation-no">No</label>
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
