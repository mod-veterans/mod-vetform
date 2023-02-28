@include('framework.functions')
@php


//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$dob = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$dobday = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$dobmonth = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$dobyear = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);


if (empty($_POST)) {
    //load the data if set
    if (!empty($data['sections']['about-you']['dob'])) {
        $dobday['data']            = @$data['sections']['about-you']['dob']['day'];
        $dobmonth['data']            = @$data['sections']['about-you']['dob']['month'];
        $dobyear['data']            = @$data['sections']['about-you']['dob']['year'];
    }
} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {


    //set the entered field names

    if ( (!empty($_POST['afcs/about-you/personal-details/date-of-birth/date-of-birth-day'])) && (!empty($_POST['afcs/about-you/personal-details/date-of-birth/date-of-birth-month'])) && (!empty($_POST['afcs/about-you/personal-details/date-of-birth/date-of-birth-year'])) ) {


        $dobday['data']            = $_POST['afcs/about-you/personal-details/date-of-birth/date-of-birth-day'];
        $dobmonth['data']            = $_POST['afcs/about-you/personal-details/date-of-birth/date-of-birth-month'];
        $dobyear['data']            = $_POST['afcs/about-you/personal-details/date-of-birth/date-of-birth-year'];


        if ( (!is_numeric($dobday['data'])) || (!is_numeric($dobmonth['data'])) || (!is_numeric($dobyear['data'])) ) {


            $errors = 'Y';
            $errorsList[] = '<a href="#afcs/about-you/personal-details/date-of-birth/date-of-birth-day">Date of birth must only contain numbers</a>';
            $dob['error'] = 'govuk-form-group--error';
            $dob['errorLabel'] =
            '<span id="afcs/about-you/personal-details/date-of-birth/date-of-birth-day-error" class="govuk-error-message">
                <span class="govuk-visually-hidden">Error:</span> Date of birth must only contain numbers
             </span>';

        }elseif ( (strlen($dobday['data']) != 2) || (strlen($dobmonth['data']) != 2) || (strlen($dobyear['data']) != 4) ) {

            $errors = 'Y';
            $errorsList[] = '<a href="#afcs/about-you/personal-details/date-of-birth/date-of-birth-day">Date of birth must be in the format DD MM YYYY (for example, 07 03 1995)</a>';
            $dob['error'] = 'govuk-form-group--error';
            $dob['errorLabel'] =
            '<span id="afcs/about-you/personal-details/date-of-birth/date-of-birth-day-error" class="govuk-error-message">
                <span class="govuk-visually-hidden">Error:</span> Date of birth must be in the format DD MM YYYY (for example, 07 03 1995)
             </span>';





        }elseif (@checkdate($dobmonth['data'],$dobday['data'],$dobyear['data']) == FALSE) {


            $errors = 'Y';
            $errorsList[] = '<a href="#afcs/about-you/personal-details/date-of-birth/date-of-birth-day">Date of birth must be a real date</a>';
            $dob['error'] = 'govuk-form-group--error';
            $dob['errorLabel'] =
            '<span id="afcs/about-you/personal-details/date-of-birth/date-of-birth-day-error" class="govuk-error-message">
                <span class="govuk-visually-hidden">Error:</span> Date of birth must be a real date
             </span>';



        } elseif (checkDOB($dobmonth['data'],$dobday['data'],$dobyear['data']) == FALSE) {


              $errors = 'Y';
            $errorsList[] = '<a href="#afcs/about-you/personal-details/date-of-birth/date-of-birth-day">You cannot be aged younger than 14 years and the date cannot be in the future</a>';
            $dob['error'] = 'govuk-form-group--error';
            $dob['errorLabel'] =
            '<span id="afcs/about-you/personal-details/date-of-birth/date-of-birth-day-error" class="govuk-error-message">
                <span class="govuk-visually-hidden">Error:</span> You cannot be aged younger than 14 years and the date cannot be in the future
             </span>';



        } else {

            $data['sections']['about-you']['dob']['day'] = $_POST['afcs/about-you/personal-details/date-of-birth/date-of-birth-day'];
            $data['sections']['about-you']['dob']['month'] = $_POST['afcs/about-you/personal-details/date-of-birth/date-of-birth-month'];
            $data['sections']['about-you']['dob']['year'] = $_POST['afcs/about-you/personal-details/date-of-birth/date-of-birth-year'];
            $data['sections']['about-you']['dob']['formatted'] = $_POST['afcs/about-you/personal-details/date-of-birth/date-of-birth-year'].'-'.$_POST['afcs/about-you/personal-details/date-of-birth/date-of-birth-month'].'-'.$_POST['afcs/about-you/personal-details/date-of-birth/date-of-birth-day'];

        }


    } else {

            $errors = 'Y';
            $errorsList[] = '<a href="#afcs/about-you/personal-details/date-of-birth/date-of-birth-day">Tell us your date of birth</a>';
            $dob['error'] = 'govuk-form-group--error';
            $dob['errorLabel'] =
            '<span id="afcs/about-you/personal-details/date-of-birth/date-of-birth-day" class="govuk-error-message">
                <span class="govuk-visually-hidden">Error:</span> Tell us your date of birth
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

        $theURL = '/applicant/about-you/telephone-number';
        if (!empty($_GET['return'])) {
            if ($rURL = cleanURL($_GET['return'])) {
                $theURL = $rURL;
            }
        }

        header("Location: ".$theURL);
        die();

}

}
$page_title = 'What is your date of birth?';

@endphp


@include('framework.header')


    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
@php
echo $errorMessage;
@endphp

                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div
    class="govuk-form-group {{$dob['error']}} "
    aria-describedby="afcs/about-you/personal-details/date-of-birth/date-of-birth-hint  ">

    <fieldset class="govuk-fieldset">
 <legend class="govuk-fieldset__legend govuk-fieldset__legend--l">
                                <h1 class="govuk-heading-xl">What is your date of birth?</h1>
</legend>
                                                        <p class="govuk-body">The date of birth of the person with the injury, illness or disability.</p>

    @php echo $dob['errorLabel']; @endphp


        <div id="afcs/about-you/personal-details/date-of-birth/date-of-birth-hint" class="govuk-hint">For example 07 03 1995</div>

        <div class="govuk-date-input" id="afcs/about-you/personal-details/date-of-birth/date-of-birth">
                                                <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="afcs/about-you/personal-details/date-of-birth/date-of-birth-day">
                                Day
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-2 "
            id="afcs/about-you/personal-details/date-of-birth/date-of-birth-day"
            name="afcs/about-you/personal-details/date-of-birth/date-of-birth-day" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="2"
            value="{{$dobday['data']}}">
    </div>
</div>
                                                    <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="afcs/about-you/personal-details/date-of-birth/date-of-birth-month">
                                Month
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-2 "
            id="afcs/about-you/personal-details/date-of-birth/date-of-birth-month"
            name="afcs/about-you/personal-details/date-of-birth/date-of-birth-month" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="2"
            value="{{$dobmonth['data']}}">
    </div>
</div>
                                                    <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="afcs/about-you/personal-details/date-of-birth/date-of-birth-year">
                                Year
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-4 "
            id="afcs/about-you/personal-details/date-of-birth/date-of-birth-year"
            name="afcs/about-you/personal-details/date-of-birth/date-of-birth-year" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="4"
            value="{{$dobyear['data']}}">
    </div>
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
