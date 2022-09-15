@include('framework.functions')
@php


//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$email = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$emailconfirm = array('data'=>'', 'error'=>'', 'errorLabel'=>'');

//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);


if (empty($_POST)) {
    //load the data if set
    if (!empty($data['sections']['about-you']['email'])) {
        $email['data']            = @$data['sections']['about-you']['email'];
        $emailconfirm['data']            = @$data['sections']['about-you']['email-confirm'];
    }

} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {


    //set the entered field names
        $email['data']            = $_POST['afcs/about-you/personal-details/email-address/email-address'];
        $emailconfirm['data']            = $_POST['afcs/about-you/personal-details/email-address/email-address-confirm'];

        if (($_POST['afcs/about-you/personal-details/email-address/email-address'] != $_POST['afcs/about-you/personal-details/email-address/email-address-confirm'])) {

            $errors = 'Y';
            $errorsList[] = '<a href="#afcs/about-you/personal-details/email-address/email-address">The email addresses do not match</a>';
            $email['error'] = 'govuk-form-group--error';
            $email['errorLabel'] =
            '<span id="afcs/about-you/personal-details/email-address/email-address-error" class="govuk-error-message">
                <span class="govuk-visually-hidden">Error:</span> Please enter matching email addresses
             </span>';

        } else {


        if (!validateEmail($_POST['afcs/about-you/personal-details/email-address/email-address'])) {


             $errors = 'Y';
            $errorsList[] = '<a href="#afcs/about-you/personal-details/contact-number/mobile-number">Enter an email address in the correct format, like name@example.com</a>';
            $email['error'] = 'govuk-form-group--error';
            $email['errorLabel'] =
            '<span id="afcs/about-you/personal-details/contact-number/mobile-number-error" class="govuk-error-message">
                <span class="govuk-visually-hidden">Error:</span> Enter an email address in the correct format, like name@example.com
             </span>';


        }







        if (!empty($_POST['afcs/about-you/personal-details/email-address/email-address'])) {



           $data['sections']['about-you']['email'] = $_POST['afcs/about-you/personal-details/email-address/email-address'];
           $data['sections']['about-you']['email-confirm'] = $_POST['afcs/about-you/personal-details/email-address/email-address-confirm'];

        } else {

            $errors = 'Y';
            $errorsList[] = '<a href="#afcs/about-you/personal-details/email-address/email-address">Enter an email address in the correct format, like name@example.com</a>';
            $email['error'] = 'govuk-form-group--error';
            $email['errorLabel'] =
            '<span id="afcs/about-you/personal-details/email-address/email-address-error" class="govuk-error-message">
                <span class="govuk-visually-hidden">Error:</span> Enter an email address in the correct format, like name@example.com
             </span>';
        }


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

        $theURL = '/applicant/about-you/email-permission';
        if (!empty($_GET['return'])) {
            if ($rURL = cleanURL($_GET['return'])) {
                $theURL = $rURL;
            }
        }

        header("Location: ".$theURL);
        die();

    }

}

$page_title = 'What is your email address?';

@endphp



@include('framework.header')

    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">

 @php
 echo $errorMessage;
 @endphp
                                <h1 class="govuk-heading-xl">What is your email address?</h1>
                                <p class="govuk-body">We’ll only use this to get in touch about your claim.</p>

<p class="govuk-body">Using an MOD email address, if you have one, means messages are more secure.</p>


            <form method="post" enctype="multipart/form-data" novalidate>
            @csrf
            <div class="govuk-form-group {{$email['error']}}">
    <label class="govuk-label" for="afcs/about-you/personal-details/email-address/email-address">
        <span class="govuk-visually-hidden">What is your email address</span>
    </label>
    <label class="govuk-label" for="afcs/about-you/personal-details/email-address/email-address">
        Email address
    </label>
    @php echo $email['errorLabel']; @endphp
        <input
        class="govuk-input govuk-!-width-two-thirds "
        id="afcs/about-you/personal-details/email-address/email-address" name="afcs/about-you/personal-details/email-address/email-address" type="email"
         autocomplete="email"
                  value="{{$email['data']}}"
                aria-describedby="afcs/about-you/personal-details/email-address/email-address-hint"
            >
</div>

            <div class="govuk-form-group ">
    <label class="govuk-label" for="afcs/about-you/personal-details/email-address/email-address-confirm">
        Confirm email address
    </label>

        <input
        class="govuk-input govuk-!-width-two-thirds "
        id="afcs/about-you/personal-details/email-address/email-address-confirm" name="afcs/about-you/personal-details/email-address/email-address-confirm" type="email"
         autocomplete="email"
                  value="{{$emailconfirm['data']}}"
                aria-describedby="afcs/about-you/personal-details/email-address/email-address-hint"
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
