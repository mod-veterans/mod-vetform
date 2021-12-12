@include('framework.functions')
@php


//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$mobile = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$telephone = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);


if (empty($_POST)) {
    //load the data if set
    if (!empty($data['sections']['about-you']['telephonenumber'])) {
        $mobile['data']            = @$data['sections']['about-you']['telephonenumber']['mobile'];
        $telephone['data']          = @$data['sections']['about-you']['telephonenumber']['alt'];
    }
} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {


    //set the entered field names
        $mobile['data']            = $_POST['afcs/about-you/personal-details/contact-number/mobile-number'];
        $telephone['data']            = $_POST['afcs/about-you/personal-details/contact-number/alternative-number'];


        if (!empty($_POST['afcs/about-you/personal-details/contact-number/mobile-number'])) {

            $data['sections']['about-you']['telephonenumber']['mobile'] = $_POST['afcs/about-you/personal-details/contact-number/mobile-number'];


        } else {

            $data['sections']['about-you']['telephonenumber']['mobile'] = '';

            /*
            $errors = 'Y';
            $errorsList[] = '<a href="#afcs/about-you/personal-details/contact-number/mobile-number">Please give us your mobile number</a>';
            $mobile['error'] = 'govuk-form-group--error';
            $mobile['errorLabel'] =
            '<span id="afcs/about-you/personal-details/contact-number/mobile-number-error" class="govuk-error-message">
                <span class="govuk-visually-hidden">Error:</span> Please give us your mobile number
             </span>';
             */
        }


        if (!empty($_POST['afcs/about-you/personal-details/contact-number/alternative-number'])) {

            $data['sections']['about-you']['telephonenumber']['alt'] = $_POST['afcs/about-you/personal-details/contact-number/alternative-number'];


        } else {


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

        $theURL = '/applicant/about-you/email-address';
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
                                <h1 class="govuk-heading-xl">What is your telephone number?</h1>
                                <p class="govuk-body">We'll use this to contact you if we have any questions about this claim.</p>

            <form method="post" enctype="multipart/form-data" novalidate>
            @csrf
                                                    <div class="govuk-form-group {{$mobile['error']}}">
    <label class="govuk-label" for="afcs/about-you/personal-details/contact-number/mobile-number">
        Mobile telephone number
    </label>
    @php echo $mobile['errorLabel']; @endphp
    <div id="afcs/about-you/personal-details/contact-number/mobile-number-hint" class="govuk-hint">For overseas numbers include the country code</div>
        <input
        class="govuk-input govuk-!-width-two-thirds "
        id="afcs/about-you/personal-details/contact-number/mobile-number" name="afcs/about-you/personal-details/contact-number/mobile-number" type="tel"
         autocomplete="tel"
           inputmode="numeric" pattern="[0-9]*"
                value="{{$mobile['data']}}"
                aria-describedby="afcs/about-you/personal-details/contact-number/mobile-number-hint"
            >
</div>
                                    <div class="govuk-form-group {{$telephone['error']}} ">
    <label class="govuk-label" for="afcs/about-you/personal-details/contact-number/alternative-number">
        Alternative telephone number (optional)
    </label>
    @php echo $telephone['errorLabel']; @endphp
    <div id="afcs/about-you/personal-details/contact-number/alternative-number-hint" class="govuk-hint">For overseas numbers include the country code</div>
        <input
        class="govuk-input govuk-!-width-two-thirds "
        id="afcs/about-you/personal-details/contact-number/alternative-number" name="afcs/about-you/personal-details/contact-number/alternative-number" type="tel"
         autocomplete="tel"
           inputmode="numeric" pattern="[0-9]*"
                value="{{$telephone['data']}}"
                aria-describedby="afcs/about-you/personal-details/contact-number/alternative-number-hint"
            >
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
