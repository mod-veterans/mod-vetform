@include('framework.functions')
@php



//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$lpacode = array('data'=>'', 'error'=>'', 'errorLabel'=>'');



//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);


if (empty($_POST)) {
    //load the data if set
    if (!empty($data['sections']['applicant-who']['legal-authority']['lpacode'])) {
        $lpacode['data']           = @$data['sections']['applicant-who']['legal-authority']['lpacode'];
    }
} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {


    //set the entered field names


    $lpacode['data'] = @$_POST['afcs/about-you/personal-details/lpacode'];


    if (empty($_POST['afcs/about-you/personal-details/lpacode'])) {

                $errors = 'Y';
                $errorsList[] = '<a href="#afcs/about-you/personal-details/lpacode">Tell us your LPA Access Code</a>';
                $lpacode['error'] = 'govuk-form-group--error';
                $lpacode['errorLabel'] =
                '<span id="afcs/about-you/personal-details/lpacode-error" class="govuk-error-message">
                    <span class="govuk-visually-hidden">Error:</span> Tell us your LPA Access Code
                 </span>';


       } elseif (strlen(str_replace("-", "",$_POST['afcs/about-you/personal-details/lpacode'])) == 12) {

            $data['sections']['applicant-who']['legal-authority']['lpacode'] = $_POST['afcs/about-you/personal-details/lpacode'];




            } else {


                $errors = 'Y';
                $errorsList[] = '<a href="#afcs/about-you/personal-details/lpacode">the LPA Access Code you provided does not appear to be valid</a>';
                $lpacode['error'] = 'govuk-form-group--error';
                $lpacode['errorLabel'] =
                '<span id="afcs/about-you/personal-details/contact-number/mobile-number-error" class="govuk-error-message">
                    <span class="govuk-visually-hidden">Error:</span> The LPA Access code you provided does not appear to be valid
                 </span>';
                 $numHidden = '';

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

        $theURL = '/applicant/legal-authority/information';
        if (!empty($_GET['return'])) {
            if ($rURL = cleanURL($_GET['return'])) {
                $theURL = $rURL;
            }
        }

        header("Location: ".$theURL);
        die();

    }

}


$page_title = 'Enter your LPA Access Code';

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
  <legend class="govuk-fieldset__legend govuk-fieldset__legend--l">
                                <h1 class="govuk-heading-xl">Enter your LPA Access Code</h1>
                            </legend>

<p class="govuk-body">Access codes are 13 characters long and start with a V.  For example, V-AB12-CD34-EF56</p>


<details class="govuk-details" data-module="govuk-details">
  <summary class="govuk-details__summary">
    <span class="govuk-details__summary-text">
     The code I've been given does not begin with a V
    </span>
  </summary>
  <div class="govuk-details__text">

The donor may have given you the wrong code. Ask them to go to <a href="https://gov.uk/use-lpa">www.gov.uk/use-lpa</a> to create an LPA access code.
  </div>
</details>




<div class="govuk-form-group {{$lpacode['error'] ?? ''}}">
  <fieldset class="govuk-fieldset" aria-describedby="contact-hint">

        <div class="govuk-form-group">
            <legend class="govuk-fieldset__legend govuk-fieldset__legend--l">
          <label class="govuk-label" for="contact-by-email">
            LPA Access Code
          </label>
          @php echo $lpacode['errorLabel']; @endphp

               <strong>V-</strong> <input class="govuk-input govuk-date-input__input govuk-input--width-20 " id="afcs/about-you/personal-details/lpacode" name="afcs/about-you/personal-details/lpacode"  type="text" value="{{$lpacode['data']}}" aria-describedby="afcs/about-you/personal-details/lpacode" maxlength="16" >
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
