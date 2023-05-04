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
$downloadpdf = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);




if (!empty($_POST)) {




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

        $theURL = '/application-complete';

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

$page_title ='Your download is ready';

$headMeta = '<meta http-equiv=REFRESH CONTENT="2; url=/pdf-download">';

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
                                <h1 class="govuk-heading-xl">Your download is ready</h1>
    </legend>
                                <p class="govuk-body">Your download should start automatically. You can also <a href="/pdf-download">download it manually</a>.</p>



<div class="govuk-inset-text">
The Internet browser you use when downloading a file determines where the file is saved. Most browsers save a file to a Downloads folder on your computer or device.
</div>




                                <div class="govuk-warning-text">
  <span class="govuk-warning-text__icon" aria-hidden="true">!</span>
  <strong class="govuk-warning-text__text">
    <span class="govuk-warning-text__assistive">Warning</span>
    Downloading your application does not send your application. You must click ‘submit your application’ below. Once submitted, you cannot access your claim again online and your data will be deleted from this online service.
  </strong>
</div>


          @php echo $downloadpdf['errorLabel']; @endphp



<p class="govuk-body"><strong>I have downloaded my answers and I want to submit my application.</strong></p>

                <div class="govuk-form-group">
   <button class="govuk-button govuk-!-margin-right-2" data-module="govuk-button">Submit your application</button>
@include('framework.bottombuttons')

    </div>
            </form>
            </div>
        </div>
    </main>
</div>

  <script src="/js/app2.js"></script>
@include('framework.footer')


