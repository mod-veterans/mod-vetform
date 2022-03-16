@include('framework.functions')
@php


//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$previous = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);


if (empty($_POST)) {
    //load the data if set
    if (!empty($data['sections']['about-you']['previous-claim'])) {
        $previous['data']            = @$data['sections']['about-you']['previous-claim'];
        $previouschk[$previous['data']] = ' checked';
    }
} else {


}



//as this is a journey-deciding page, we want to detect a change in choice (if returning from a CYA page) so we can
//kill off the return URL

if ( (!empty($_POST['afcs/about-you/personal-details/previous-claim/previous-claim'])) && (!empty($data['sections']['about-you']['previous-claim'])) &&
($data['sections']['about-you']['previous-claim'] == $_POST['afcs/about-you/personal-details/previous-claim/previous-claim']) ) {

    //same choice, return applies

} else {

   unset($_GET['return']);

}



if (!empty($_POST)) {


    //set the entered field names


    if (!empty($_POST['afcs/about-you/personal-details/previous-claim/previous-claim'])) {


        switch ($_POST['afcs/about-you/personal-details/previous-claim/previous-claim']) {

            case "Yes":
                $data['sections']['about-you']['previous-claim'] = 'Yes';
                $previouschk['Yes'] = ' checked';
                $theURL = '/applicant/about-you/previous-claim/claim-number';

            break;

            case "No":
                $data['sections']['about-you']['previous-claim'] = 'No';
                $nominatechk['No'] = ' checked';
                $theURL = '/applicant/about-you/save-return';
            break;


            default:
                die('unexpected input');
            break;


        }



    } else {

        $errors = 'Y';
        $errorsList[] = '<a href="#afcs/about-you/personal-details/previous-claim/previous-claim">Please tell us if you have made a previous claim</a>';
        $previous['error'] = 'govuk-form-group--error';
        $previous['errorLabel'] =
        '<span id="/representative/representative-selection/nominated-representative-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Please tell us if you have made a previous claim
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
                                <h1 class="govuk-heading-xl">Have you made a claim before?</h1>
</legend>

 <p class="govuk-body">We only need to know about war pension or armed forces compensation scheme claims.</p>

                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group {{$previous['error']}} ">
    <a id="afcs/about-you/personal-details/previous-claim/previous-claim"></a>
    <fieldset class="govuk-fieldset">
@php echo $previous['errorLabel']; @endphp
                                            <div
            class="govuk-radios govuk-radios--inline"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="afcs/about-you/personal-details/previous-claim/previous-claim-yes" name="afcs/about-you/personal-details/previous-claim/previous-claim" type="radio"
           value="Yes"   @php echo @$previouschk['Yes']; @endphp         >
    <label class="govuk-label govuk-radios__label" for="afcs/about-you/personal-details/previous-claim/previous-claim-yes">Yes</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="afcs/about-you/personal-details/previous-claim/previous-claim-no" name="afcs/about-you/personal-details/previous-claim/previous-claim" type="radio"
           value="No"      @php echo @$previouschk['No']; @endphp       >
    <label class="govuk-label govuk-radios__label" for="afcs/about-you/personal-details/previous-claim/previous-claim-no">No</label>
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
