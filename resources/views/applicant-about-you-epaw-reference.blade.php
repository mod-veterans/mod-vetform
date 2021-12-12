@include('framework.functions')
@php



//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$epaw = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$epawref = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);


if (empty($_POST)) {
    //load the data if set
    if (!empty($data['sections']['about-you']['refnum'])) {
        $epaw['data']           = @$data['sections']['about-you']['epaw']['got'];
        $epawref['data']        = @$data['sections']['about-you']['epaw']['ref'];
        $epawchk[$epaw['data']] = ' checked';

    }
} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {


    //set the entered field names


    $epaw['data'] = @$_POST['afcs/about-you/personal-details/epaw-number'];
    $epawref['data'] = @$_POST['afcs/about-you/personal-details/epaw-reference'];


    if (empty($_POST['afcs/about-you/personal-details/epaw-number'])) {

        $errors = 'Y';
        $errorsList[] = '<a href="#afcs/about-you/personal-details/epaw-number">Please tell us if you do not have, or do have (or have requested) and EPAW reference number</a>';
        $epaw['error'] = 'govuk-form-group--error';
        $epaw['errorLabel'] =
        '<span id="/representative/representative-address/country-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Please tell us if you do not have, or do have (or have requested) and EPAW reference number
         </span>';


    } else {
        $data['sections']['about-you']['epaw']['got'] = $_POST['afcs/about-you/personal-details/epaw-number'];
        $epawchk[$epaw['data']] = ' checked';
    }



    if (empty($_POST['afcs/about-you/personal-details/epaw-reference'])) {

        $data['sections']['about-you']['epaw']['ref'] = '';

    } else {
        $data['sections']['about-you']['epaw']['ref'] = $_POST['afcs/about-you/personal-details/epaw-reference'];

    }


    if ($_POST['afcs/about-you/personal-details/epaw-number'] == 'No – I do not have an EPAW reference number.') {
        $data['sections']['about-you']['epaw']['ref'] = '';
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

        $theURL = '/applicant/about-you/save-return';
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
                                <h1 class="govuk-heading-xl">Do you have an Express Prior Authority in Writing (EPAW) reference?</h1>
</legend>
                                <p class="govuk-body">This is a requirement for those who are serving in or who have served in UK Special Forces, including in a support role.</p>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group {{$epaw['error']}}">
    <a id="afcs/about-you/personal-details/epaw-number"></a>
    <fieldset class="govuk-fieldset">
@php echo $epaw['errorLabel']; @endphp
                                            <div
            class="govuk-radios govuk-radios--inline"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="afcs/about-you/personal-details/previous-claim/previous-claim-yes" name="afcs/about-you/personal-details/epaw-number" type="radio"
           value="No – I do not have an EPAW reference number."      @php echo @$epawchk['No – I do not have an EPAW reference number.']; @endphp    >
    <label class="govuk-label govuk-radios__label" for="afcs/about-you/personal-details/epaw-number-yes">No – I do not have an EPAW reference number.</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="afcs/about-you/personal-details/epaw-number-no" name="afcs/about-you/personal-details/epaw-number" type="radio"
           value="Yes - I do have (or have requested) an EPAW reference number."  @php echo @$epawchk['Yes - I do have (or have requested) an EPAW reference number.']; @endphp           >
    <label class="govuk-label govuk-radios__label" for="afcs/about-you/personal-details/epaw-number-no">Yes - I do have (or have requested) an EPAW reference number.</label>
</div>





                    </div>
    </fieldset>
<br />
  <div class="govuk-form-group">
    <label class="govuk-label" for="afcs/about-you/personal-details/epaw-reference">
        EPAW Reference (if received)
    </label>
        <input
        class="govuk-input govuk-!-width-two-thirds "
        id="afcs/about-you/personal-details/epaw-reference" name="afcs/about-you/personal-details/epaw-reference" type="text"
                      value="{{$epawref['data']}}"
                aria-describedby="afcs/about-you/personal-details/epaw-reference" maxlength="15"
            >

</div>


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
