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
$mobilepermission = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);


if (empty($_POST)) {
    //load the data if set
    if (!empty($data['sections']['about-you']['telephonenumber']['mobilepermission'])) {
        $mobilepermission['data']            = @$data['sections']['about-you']['telephonenumber']['mobilepermission'];

        if ($mobilepermission['data'] == 'Yes') {

         $mobilepermissionchk['Yes'] = 'checked';
        } else {
         $mobilepermissionchk['No'] = 'checked';
        }

    }
} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {


if (empty($_POST['afcs/about-you/personal-details/contact-number/mobilepermission'])) {

                $errors = 'Y';
                $errorsList[] = '<a href="#afcs/about-you/personal-details/contact-number/mobile-permission">Tell us if you want us to send you text messages about your claim</a>';
                $mobilepermission['error'] = 'govuk-form-group--error';
                $mobilepermission['errorLabel'] =
                '<span id="afcs/about-you/personal-details/contact-number/mobile-permission-error" class="govuk-error-message">
                    <span class="govuk-visually-hidden">Error:</span> Tell us if you want us to send you text messages about your claim
                 </span>';


       } elseif ($_POST['afcs/about-you/personal-details/contact-number/mobilepermission'] == 'Yes') {

            $theURL = '/applicant/about-you/email-address';

            $mobilepermissionchk['Yes'] = 'checked';
            $data['sections']['about-you']['telephonenumber']['mobilepermission'] = 'Yes';

       } else {
            $mobilepermissionchk['No'] = 'checked';
            $data['sections']['about-you']['telephonenumber']['mobilepermission'] = 'No';

             $theURL = '/applicant/about-you/email-address';
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

$page_title = 'Using text messages to contact you';

@endphp




@include('framework.header')


    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">

  @php
echo $errorMessage;
@endphp

                                <h1 class="govuk-heading-xl">Using text messages to contact you</h1>
                               <p class="govuk-body">Veterans UK is planning to introduce text messaging to update customers as their claim progresses.</p>

<p class="govuk-body">If you want us to use the number you have just provided to send you text message updates about your claim, read the information below:
</p>

<ul class="govuk-list govuk-list--bullet govuk-list--spaced">
<li>I authorise Veterans UK to use text messaging to update me about progress made on my claim.</li>

<li>I understand that messages sent by text may be open to abuse because they are sent over an unsecured network. I accept that the Ministry of Defence (MOD) will not be liable for any loss, interception or unauthorised use of information transmitted this way.</li>

<li>If your mobile number changes, tell us as soon as possible.</li>


</ul>


<div class="govuk-inset-text">We will never ask you for personal details or include website links in text messages we send to you.</div>



            <form method="post" enctype="multipart/form-data" novalidate>
            @csrf

    <legend class="govuk-fieldset__legend govuk-fieldset__legend--l">
                                <h2 class="govuk-heading-m">Do you want us to send you text messages about your claim?</h2>
    </legend>

<div class="govuk-form-group {{$mobilepermission['error'] ?? ''}}">
  <fieldset class="govuk-fieldset" aria-describedby="contact-hint">
          @php echo $mobilepermission['errorLabel']; @endphp
    <div class="govuk-radios" data-module="govuk-radios">
      <div class="govuk-radios__item">
        <input class="govuk-radios__input" id="afcs/about-you/personal-details/contact-number/mobilepermission" name="afcs/about-you/personal-details/contact-number/mobilepermission" type="radio" value="Yes" data-aria-controls="conditional-contact"  {{$mobilepermissionchk['Yes'] ?? ''}}>
        <label class="govuk-label govuk-radios__label" for="contact">
          Yes
        </label>
      </div>

      <div class="govuk-radios__item">
        <input class="govuk-radios__input" id="afcs/about-you/personal-details/contact-number/mobilepermission" name="afcs/about-you/personal-details/contact-number/mobilepermission" type="radio" value="No" data-aria-controls="conditional-contact-2" {{$mobilepermissionchk['No'] ?? ''}}>
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
