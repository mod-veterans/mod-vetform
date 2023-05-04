@include('framework.functions')
@php


//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();
$numHidden = 'govuk-radios__conditional--hidden';
$theURL = '/application-complete';


//set fields
$downloadpdf = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);


if (empty($_POST)) {
    //load the data if set
    if (!empty($data['sections']['about-you']['downloadpdf'])) {
        $mobile['data']            = @$data['sections']['about-you']['downloadpdf'];
        $doyouhavemobile['data']          = @$data['sections']['about-you']['downloadpdf'];

        if ($downloadpdf['data'] == 'Yes') {

         $downloadpdfchk['Yes'] = 'checked';
        } else {
         $downloadpdfchk['No'] = 'checked';
        }

    }
} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {


    //set the entered field names
if (!empty($_POST['download-pdf'])) {
        $downloadpdf['data']            = $_POST['download-pdf'];
}

if (empty($_POST['download-pdf'])) {

                $errors = 'Y';
                $errorsList[] = '<a href="#download-pdf-yes">Tell us if you would like to download a PDF version of your entered data</a>';
                $downloadpdf['error'] = 'govuk-form-group--error';
                $downloadpdf['errorLabel'] =
                '<span id="download-pdf-error" class="govuk-error-message">
                    <span class="govuk-visually-hidden">Error:</span> Tell us if you would like to download a PDF version of your entered data
                 </span>';


    } elseif ($_POST['download-pdf'] == 'Yes') {

            $theURL = '/your-download';

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

$page_title ='Do you want to download a PDF copy of your data?';

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


<div class="govuk-form-group {{$downloadpdf['error'] ?? ''}}">
  <fieldset class="govuk-fieldset" aria-describedby="afcs/about-you/personal-details/contact-number/mobile-number-hint">
    <legend class="govuk-fieldset__legend govuk-fieldset__legend--l">
                                <h1 class="govuk-heading-xl">Do you want to download a copy of your answers?</h1>
    </legend>
                                <p class="govuk-body" id="afcs/about-you/personal-details/contact-number/mobile-number-hint">You can now download a copy of your completed application for your records.</p>

                                <div class="govuk-warning-text">
  <span class="govuk-warning-text__icon" aria-hidden="true">!</span>
  <strong class="govuk-warning-text__text">
    <span class="govuk-warning-text__assistive">Warning</span>
   You can only download a copy before you submit your claim. Once submitted, you cannot access your claim again online.
  </strong>
</div>



          @php echo $downloadpdf['errorLabel']; @endphp


                    <label class="govuk-label" for="download-pdf-yes"><h2>
            Do you want to download a copy of your claim?</h2>
          </label>




    <div class="govuk-radios" data-module="govuk-radios">
      <div class="govuk-radios__item">
        <input class="govuk-radios__input" id="download-pdf-yes" name="download-pdf" type="radio" value="Yes" data-aria-controls="download-pdf-yes-mesg"  {{$downloadpdfchk['Yes'] ?? ''}}>
        <label class="govuk-label govuk-radios__label" for="download-pdf-yes">
          Yes
        </label>

      </div>

        <div class="govuk-radios__conditional {{$numHidden ?? ''}}" id="download-pdf-yes-mesg">
        <p class="govuk-body">Your answers will be ready to download on the next page when you click the ‘save and continue’ button below.</p>
        <button class="govuk-button govuk-!-margin-right-2" data-module="govuk-button">Save and continue</button>
        </div>

      <div class="govuk-radios__item">
        <input class="govuk-radios__input" id="download-pdf-no" name="download-pdf" type="radio" value="No" data-aria-controls="download-pdf-no-mesg" {{$downloadpdfchk['No'] ?? ''}}>
        <label class="govuk-label govuk-radios__label" for="download-pdf-no">
          No
        </label>
      </div>

              <div class="govuk-radios__conditional {{$numHidden ?? ''}}" id="download-pdf-no-mesg">
        <p class="govuk-body"><strong>Submit your claim without downloading a copy of your answers?</strong></p>
        <button class="govuk-button govuk-!-margin-right-2" data-module="govuk-button">Submit your application</button>
        </div>

    </div>

  </fieldset>
</div>







                <div class="govuk-form-group">

@include('framework.bottombuttons')

    </div>
            </form>
            </div>
        </div>
    </main>
</div>

  <script src="/js/app2.js"></script>
@include('framework.footer')


