@include('framework.functions')
@php


//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();
$numHidden = 'govuk-radios__conditional--hidden';


//set fields
$emailpermission = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);


if (empty($_POST)) {
    //load the data if set
    if (!empty($data['sections']['about-you']['email-address']['emailpermission'])) {
        $emailpermission['data']            = @$data['sections']['about-you']['email-address']['emailpermission'];

        if ($emailpermission['data'] == 'Yes') {

         $emailpermissionchk['Yes'] = 'checked';
        } else {
         $emailpermissionchk['No'] = 'checked';
        }

    }
} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {


if (empty($_POST['afcs/about-you/personal-details/email-address/emailpermission'])) {

                $errors = 'Y';
                $errorsList[] = '<a href="#afcs/about-you/personal-details/email-address/email-permission">Please tell us if you want us to contact you about your claim by email</a>';
                $emailpermission['error'] = 'govuk-form-group--error';
                $emailpermission['errorLabel'] =
                '<span id="afcs/about-you/personal-details/email-address/email-permission-error" class="govuk-error-message">
                    <span class="govuk-visually-hidden">Error:</span> Please tell us if you want us to contact you about your claim by email
                 </span>';


       } elseif ($_POST['afcs/about-you/personal-details/email-address/emailpermission'] == 'Yes') {

            $theURL = '/applicant/about-you/ni-number';

            $emailpermissionchk['Yes'] = 'checked';
            $data['sections']['about-you']['email-address']['emailpermission'] = 'Yes';

       } else {
            $emailpermissionchk['No'] = 'checked';
            $data['sections']['about-you']['email-address']['emailpermission'] = 'No';

             $theURL = '/applicant/about-you/ni-number';
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
                                <h1 class="govuk-heading-xl">Using email to contact you</h1>
    </legend>
                                <p class="govuk-body">Veterans UK will conduct correspondence with customers about their claim using a nominated email address if that is their preference. There are some types of personal information we would not be able to include in email correspondence.</p>

<p class="govuk-body">Read the information below if you would like us to use email to contact you:
</p>
<ul class="govuk-list govuk-list--bullet govuk-list--spaced">
<li>I authorise Veterans UK to use email whenever possible in its correspondence with me using my nominated email address entered. I accept that information including bank account details, National Insurance Numbers, medical details and any other information that could compromise my identity will not be included in emails.</li>

<li>I understand that correspondence transmitted by email may be open to abuse because it is transmitted over an unsecured network. I accept that the MOD will not be liable for any loss, interception or unauthorised use of information transmitted this way. </li>

<li>If your email address changes, tell us as soon as possible.</li>
</ul>




            <form method="post" enctype="multipart/form-data" novalidate>
            @csrf


                                <h2 class="govuk-heading-m">Do you want us to contact you about your claim by email?</h2>

<div class="govuk-form-group {{$emailpermission['error'] ?? ''}}">
  <fieldset class="govuk-fieldset" aria-describedby="contact-hint">
          @php echo $emailpermission['errorLabel']; @endphp
    <div class="govuk-radios" data-module="govuk-radios">
      <div class="govuk-radios__item">
        <input class="govuk-radios__input" id="afcs/about-you/personal-details/email-address/email-permission" name="afcs/about-you/personal-details/email-address/emailpermission" type="radio" value="Yes" data-aria-controls="conditional-contact"  {{$emailpermissionchk['Yes'] ?? ''}}>
        <label class="govuk-label govuk-radios__label" for="contact">
          Yes
        </label>
      </div>

      <div class="govuk-radios__item">
        <input class="govuk-radios__input" id="afcs/about-you/personal-details/email-address/email-permission" name="afcs/about-you/personal-details/email-address/emailpermission" type="radio" value="No" data-aria-controls="conditional-contact-2" {{$emailpermissionchk['No'] ?? ''}}>
        <label class="govuk-label govuk-radios__label" for="contact-2">
          No
        </label>
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

  <script src="/js/app2.js"></script>
@include('framework.footer')
