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
$telephone = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$doyouhavealternative = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);


if (empty($_POST)) {
    //load the data if set
    if (!empty($data['sections']['about-you']['telephonenumber']['doyouhavealternative'])) {
        $telephone['data']            = @$data['sections']['about-you']['telephonenumber']['telephone'];
        $doyouhavealternative['data']          = @$data['sections']['about-you']['telephonenumber']['doyouhavealternative'];

        if ($doyouhavealternative['data'] == 'Yes') {

         $doyouhavealternativechk['Yes'] = 'checked';
        } else {
                 $doyouhavealternativechk['No'] = 'checked';
        }

    }
} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {


    //set the entered field names
        $telephone['data']            = $_POST['afcs/about-you/personal-details/contact-number/mobile-number'];
if (!empty($_POST['afcs/about-you/personal-details/contact-number/do-you-have'])) {
        $doyouhavealternative['data']            = $_POST['afcs/about-you/personal-details/contact-number/do-you-have'];
}

if (empty($_POST['afcs/about-you/personal-details/contact-number/do-you-have'])) {

                $errors = 'Y';
                $errorsList[] = '<a href="#afcs/about-you/personal-details/contact-number/do-you-have">Please tell us if you have an alternative number</a>';
                $doyouhavealternative['error'] = 'govuk-form-group--error';
                $doyouhavealternative['errorLabel'] =
                '<span id="afcs/about-you/personal-details/contact-number/do-you-have-error" class="govuk-error-message">
                    <span class="govuk-visually-hidden">Error:</span> Please tell us if you have an alternative number
                 </span>';


       } elseif ($_POST['afcs/about-you/personal-details/contact-number/do-you-have'] == 'Yes') {

            $doyouhavealternativechk['Yes'] = 'checked';


            if (!empty($_POST['afcs/about-you/personal-details/contact-number/mobile-number'])) {

                $data['sections']['about-you']['telephonenumber']['telephone'] = $_POST['afcs/about-you/personal-details/contact-number/mobile-number'];
                $data['sections']['about-you']['telephonenumber']['doyouhavealternative'] = 'Yes';



            } else {


                $errors = 'Y';
                $errorsList[] = '<a href="#afcs/about-you/personal-details/contact-number/mobile-number">Please give us your alternative number</a>';
                $telephone['error'] = 'govuk-form-group--error';
                $telephone['errorLabel'] =
                '<span id="afcs/about-you/personal-details/contact-number/mobile-number-error" class="govuk-error-message">
                    <span class="govuk-visually-hidden">Error:</span> Please give us your alternative number
                 </span>';
                 $numHidden = '';

            }



        } elseif ($_POST['afcs/about-you/personal-details/contact-number/do-you-have'] == 'No') {

            $data['sections']['about-you']['telephonenumber']['telephone'] = '';
            $data['sections']['about-you']['telephonenumber']['doyouhavealternative'] = 'No';
            $doyouhavealternativechk['No'] = 'checked';

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
    <legend class="govuk-fieldset__legend govuk-fieldset__legend--l">
                                <h1 class="govuk-heading-xl">Is there another number you can be contacted on?</h1>
    </legend>
                                <p class="govuk-body">We'll use this to contact you if we have any questions about this claim.</p>

            <form method="post" enctype="multipart/form-data" novalidate>
            @csrf


<div class="govuk-form-group {{$doyouhavemobile['error'] ?? ''}}">
  <fieldset class="govuk-fieldset" aria-describedby="contact-hint">
          @php echo $doyouhavealternative['errorLabel']; @endphp
    <div class="govuk-radios" data-module="govuk-radios">
      <div class="govuk-radios__item">
        <input class="govuk-radios__input" id="contact" name="afcs/about-you/personal-details/contact-number/do-you-have" type="radio" value="Yes" data-aria-controls="conditional-contact"  {{$doyouhavealternativechk['Yes'] ?? ''}}>
        <label class="govuk-label govuk-radios__label" for="contact">
          Yes
        </label>
      </div>
      <div class="govuk-radios__conditional {{$numHidden ?? ''}}" id="conditional-contact">
        <div class="govuk-form-group">
          <label class="govuk-label" for="contact-by-email">
            Telephone number
          </label>
          @php echo $telephone['errorLabel']; @endphp
    <div id="afcs/about-you/personal-details/contact-number/mobile-number-hint" class="govuk-hint">For overseas numbers include the country code, for example +49</div>
                 <input
        class="govuk-input govuk-!-width-two-thirds "
        id="afcs/about-you/personal-details/contact-number/mobile-number" name="afcs/about-you/personal-details/contact-number/mobile-number" type="tel"
         autocomplete="tel"
           inputmode="numeric" pattern="[0-9]*"
                value="{{$telephone['data']}}"
                aria-describedby="afcs/about-you/personal-details/contact-number/mobile-number-hint"
            >

      </div>
      </div>
      <div class="govuk-radios__item">
        <input class="govuk-radios__input" id="contact-2" name="afcs/about-you/personal-details/contact-number/do-you-have" type="radio" value="No" data-aria-controls="conditional-contact-2" {{$doyouhavealternativechk['No'] ?? ''}}>
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
