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
$epawref1 = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$epawref2 = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$epawref3 = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$epawref4 = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);


if (empty($_POST)) {
    //load the data if set
    if (!empty($data['sections']['applicant-who']['legal-authority']['epaw']['served'])) {
        $served['data']           = @$data['sections']['applicant-who']['legal-authority']['epaw']['served'];
        $epawref1['data']        = @$data['sections']['applicant-who']['legal-authority']['epaw']['epaw-reference-1'];
        $epawref2['data']        = @$data['sections']['applicant-who']['legal-authority']['epaw']['epaw-reference-2'];
        $epawref3['data']        = @$data['sections']['applicant-who']['legal-authority']['epaw']['epaw-reference-3'];
        $epawref4['data']        = @$data['sections']['applicant-who']['legal-authority']['epaw']['epaw-reference-4'];


        $servedchk[$served['data']] = ' checked';

    }
} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {


    //set the entered field names


    $served['data'] = @$_POST['afcs/about-you/personal-details/served-special-forces'];
    $epawref1['data'] = @$_POST['afcs/about-you/personal-details/epaw-reference-1'];
    $epawref2['data'] = @$_POST['afcs/about-you/personal-details/epaw-reference-2'];
    $epawref3['data'] = @$_POST['afcs/about-you/personal-details/epaw-reference-3'];
    $epawref4['data'] = @$_POST['afcs/about-you/personal-details/epaw-reference-4'];

    if (empty($_POST['afcs/about-you/personal-details/served-special-forces'])) {

                $errors = 'Y';
                $errorsList[] = '<a href="#afcs/about-you/personal-details/served-special-forces">Tell us if you have served in or supported the Special Forces</a>';
                $served['error'] = 'govuk-form-group--error';
                $served['errorLabel'] =
                '<span id="afcs/about-you/personal-details/served-special-forces-error" class="govuk-error-message">
                    <span class="govuk-visually-hidden">Error:</span> Tell us if you have served in or supported the Special Forces
                 </span>';


       } elseif ($_POST['afcs/about-you/personal-details/served-special-forces'] == 'Yes') {

            $servedchk['Yes'] = 'checked';


            if (!empty($_POST['afcs/about-you/personal-details/epaw-reference-1'])) {

                $data['sections']['applicant-who']['legal-authority']['epaw']['epaw-reference-1'] = $_POST['afcs/about-you/personal-details/epaw-reference-1'];
                $data['sections']['applicant-who']['legal-authority']['epaw']['epaw-reference-2'] = $_POST['afcs/about-you/personal-details/epaw-reference-2'];
                $data['sections']['applicant-who']['legal-authority']['epaw']['epaw-reference-3'] = $_POST['afcs/about-you/personal-details/epaw-reference-3'];
                $data['sections']['applicant-who']['legal-authority']['epaw']['epaw-reference-4'] = $_POST['afcs/about-you/personal-details/epaw-reference-4'];
                $data['sections']['applicant-who']['legal-authority']['epaw']['served'] = 'Yes';



            } else {


                $errors = 'Y';
                $errorsList[] = '<a href="#afcs/about-you/personal-details/contact-number/mobile-number">Tell us your EPAW reference in number/date format</a>';
                $epawref1['error'] = 'govuk-form-group--error';
                $epawref1['errorLabel'] =
                '<span id="afcs/about-you/personal-details/contact-number/mobile-number-error" class="govuk-error-message">
                    <span class="govuk-visually-hidden">Error:</span> Tell us your EPAW reference in number/date format
                 </span>';
                 $numHidden = '';

            }



        } elseif ($_POST['afcs/about-you/personal-details/served-special-forces'] == 'No') {

                $data['sections']['applicant-who']['legal-authority']['epaw']['epaw-reference-1'] = '';
                $data['sections']['applicant-who']['legal-authority']['epaw']['epaw-reference-2'] = '';
                $data['sections']['applicant-who']['legal-authority']['epaw']['epaw-reference-3'] = '';
                $data['sections']['applicant-who']['legal-authority']['epaw']['epaw-reference-4'] = '';
                $data['sections']['applicant-who']['legal-authority']['epaw']['served'] = 'No';
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

        $theURL = '/applicant/legal-authority';
        if (!empty($_GET['return'])) {
            if ($rURL = cleanURL($_GET['return'])) {
                $theURL = $rURL;
            }
        }

        header("Location: ".$theURL);
        die();

    }

}


$page_title = 'Rules for Special Forces';
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

                                <h1 class="govuk-heading-xl">Rules for Special Forces</h1>



  <div class="govuk-body">
  If the person named in this application has ever served with the United Kingdom Special Forces (UKSF), either directly or in a support role, you must contact the MOD A Block Disclosure Cell for advice before using this service.  You may be asked to apply for Express Prior Authority in Writing (EPAW) and will be given a reference number to quote when you make your claim. Email <a href="mailto:MAB-Disclosures@mod.gov.uk">MAB-Disclosures@mod.gov.uk</a> explaining you want to make an armed forces compensation claim.
  </p>




<div class="govuk-form-group {{$served['error'] ?? ''}}">
  <fieldset class="govuk-fieldset" aria-describedby="contact-hint">
          @php echo $served['errorLabel']; @endphp
    <div class="govuk-radios" data-module="govuk-radios">
  <legend class="govuk-fieldset__legend govuk-fieldset__legend--m">
Has the person you are applying for ever served in or supported the Special Forces?
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
          @php echo $epawref1['errorLabel']; @endphp

                <input class="govuk-input govuk-date-input__input govuk-input--width-4 " id="afcs/about-you/personal-details/epaw-reference-1" name="afcs/about-you/personal-details/epaw-reference-1"  type="text" value="{{$epawref1['data']}}" aria-describedby="afcs/about-you/personal-details/epaw-reference" maxlength="4" > -

 <input class="govuk-input govuk-date-input__input govuk-input--width-2 " id="afcs/about-you/personal-details/epaw-reference-2" name="afcs/about-you/personal-details/epaw-reference-2"  type="text" value="{{$epawref2['data']}}" aria-describedby="afcs/about-you/personal-details/epaw-reference" maxlength="2" > /

 <input class="govuk-input govuk-date-input__input govuk-input--width-2" id="afcs/about-you/personal-details/epaw-reference-3" name="afcs/about-you/personal-details/epaw-reference-3"  type="text" value="{{$epawref3['data']}}" aria-describedby="afcs/about-you/personal-details/epaw-reference" maxlength="2" > /

 <input class="govuk-input govuk-date-input__input govuk-input--width-4" id="afcs/about-you/personal-details/epaw-reference-4" name="afcs/about-you/personal-details/epaw-reference-4"  type="text" value="{{$epawref4['data']}}" aria-describedby="afcs/about-you/personal-details/epaw-reference" maxlength="4" >
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
