@include('framework.functions')
@php



//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$served = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$epawref = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);


if (empty($_POST)) {
    //load the data if set
    if (!empty($data['sections']['applicant-who']['apply-yourself']['epaw']['served'])) {
        $served['data']           = @$data['sections']['applicant-who']['apply-yourself']['epaw']['served'];
        $epawref['data']        = @$data['sections']['applicant-who']['apply-yourself']['epaw']['epaw-reference'];
        $servedchk[$served['data']] = ' checked';

    }
} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {


    //set the entered field names


    $served['data'] = @$_POST['afcs/about-you/personal-details/served-special-forces'];
    $epawref['data'] = @$_POST['afcs/about-you/personal-details/epaw-reference'];


    if (empty($_POST['afcs/about-you/personal-details/served-special-forces'])) {

                $errors = 'Y';
                $errorsList[] = '<a href="#afcs/about-you/personal-details/served-special-forces">Please tell us if you have served in or supported the Special Forces</a>';
                $served['error'] = 'govuk-form-group--error';
                $served['errorLabel'] =
                '<span id="afcs/about-you/personal-details/served-special-forces-error" class="govuk-error-message">
                    <span class="govuk-visually-hidden">Error:</span> Please tell us if you have served in or supported the Special Forces
                 </span>';


       } elseif ($_POST['afcs/about-you/personal-details/served-special-forces'] == 'Yes') {

            $servedchk['Yes'] = 'checked';


            if (!empty($_POST['afcs/about-you/personal-details/epaw-reference'])) {

                $data['sections']['applicant-who']['apply-yourself']['epaw']['epaw-reference'] = $_POST['afcs/about-you/personal-details/epaw-reference'];
                $data['sections']['applicant-who']['apply-yourself']['epaw']['served'] = 'Yes';



            } else {


                $errors = 'Y';
                $errorsList[] = '<a href="#afcs/about-you/personal-details/contact-number/mobile-number">Please give us your EPAW number</a>';
                $epawref['error'] = 'govuk-form-group--error';
                $epawref['errorLabel'] =
                '<span id="afcs/about-you/personal-details/contact-number/mobile-number-error" class="govuk-error-message">
                    <span class="govuk-visually-hidden">Error:</span> Please give us your EPAW number
                 </span>';
                 $numHidden = '';

            }



        } elseif ($_POST['afcs/about-you/personal-details/served-special-forces'] == 'No') {

                $data['sections']['applicant-who']['apply-yourself']['epaw']['epaw-reference'] = '';
                $data['sections']['applicant-who']['apply-yourself']['epaw']['served'] = 'No';
            $servedchk['No'] = 'checked';

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

        $theURL = '/applicant/check-answers';
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
        <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
@php
echo $errorMessage;
@endphp

                                <h1 class="govuk-heading-xl">Express Prior Authority in Writing (EPAW)</h1>




<details class="govuk-details" data-module="govuk-details">
  <summary class="govuk-details__summary">
    <span class="govuk-details__summary-text">
     You must read this text information if you have ever served in or supported the Special Forces
    </span>
  </summary>
  <div class="govuk-details__text">
Have you ever served in with United Kingdom Special Forces (UKSF), directly or in a support role, advice must be obtained from the MOD A Block Disclosure Cell before using this service. If the person named in this application has served at any time from 1996, they will be subject to the UKSF Confidentiality Contract and must apply for Express Prior Authority in Writing (EPAW) through the Disclosure Cell before submitting a claim where they may be asked to disclose details of their service with UKSF or any units directly supporting them. The Disclosure Cell can be contacted by emailing <a href="mailto:MAB-Disclosures@mod.gov.uk">MAB-Disclosures@mod.gov.uk</a>.
  </div>
</details>




<div class="govuk-form-group {{$served['error'] ?? ''}}">
  <fieldset class="govuk-fieldset" aria-describedby="contact-hint">
          @php echo $served['errorLabel']; @endphp
    <div class="govuk-radios" data-module="govuk-radios">
  <legend class="govuk-fieldset__legend govuk-fieldset__legend--m">
Have you ever served in or supported the Special Forces?
</legend>

       <div class="govuk-radios__item">
        <input class="govuk-radios__input" id="contact-2" name="afcs/about-you/personal-details/served-special-forces" type="radio" value="No" data-aria-controls="conditional-contact-2" {{$servedchk['No'] ?? ''}}>
        <label class="govuk-label govuk-radios__label" for="contact-2">
          No
        </label>
      </div>


      <div class="govuk-radios__item">
        <input class="govuk-radios__input" id="contact" name="afcs/about-you/personal-details/served-special-forces" type="radio" value="Yes" data-aria-controls="conditional-contact"  {{$servedchk['Yes'] ?? ''}}>
        <label class="govuk-label govuk-radios__label" for="contact">
          Yes
        </label>
      </div>
      <div class="govuk-radios__conditional {{$numHidden ?? ''}}" id="conditional-contact">
        <div class="govuk-form-group">
          <label class="govuk-label" for="contact-by-email">
            EPAW reference
          </label>
          @php echo $epawref['errorLabel']; @endphp

                 <input
        class="govuk-input govuk-!-width-two-thirds "
        id="afcs/about-you/personal-details/epaw-reference" name="afcs/about-you/personal-details/epaw-reference" type="text"
                      value="{{$epawref['data']}}"
                aria-describedby="afcs/about-you/personal-details/epaw-reference" maxlength="15"
            >

      </div>

<div class="govuk-warning-text">
  <span class="govuk-warning-text__icon" aria-hidden="true">!</span>
  <strong class="govuk-warning-text__text">
    <span class="govuk-warning-text__assistive">Warning</span>
You must have an EPAW reference before completing this application.
  </strong>
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

  <script src="/js/app2.js"></script>
@include('framework.footer')
