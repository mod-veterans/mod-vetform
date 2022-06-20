@include('framework.functions')
@php



//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$havelpa = array('data'=>'', 'error'=>'', 'errorLabel'=>'');




//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);


if (empty($_POST)) {
    //load the data if set
    if (!empty($data['sections']['applicant-who']['legal-authority']['havelpa'])) {
        $havelpa['data']           = @$data['sections']['applicant-who']['legal-authority']['havelpa'];

        $havelpachk[$havelpa['data']] = ' checked';

    }
} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {


    //set the entered field names


    $havelpa['data'] = @$_POST['afcs/about-you/personal-details/have-lpa-code'];


    if (empty($_POST['afcs/about-you/personal-details/have-lpa-code'])) {

                $errors = 'Y';
                $errorsList[] = '<a href="#afcs/about-you/personal-details/have-lpa-code">Please tell us if you have an LPA access code</a>';
                $served['error'] = 'govuk-form-group--error';
                $served['errorLabel'] =
                '<span id="afcs/about-you/personal-details/have-lpa-code-error" class="govuk-error-message">
                    <span class="govuk-visually-hidden">Error:</span> Please tell us if you have an LPA access code
                 </span>';


       } elseif ($_POST['afcs/about-you/personal-details/have-lpa-code'] == 'Yes') {

            $havelpachk['Yes'] = 'checked';
                $data['sections']['applicant-who']['legal-authority']['havelpa'] = 'Yes';
                $theURL = '/applicant/legal-authority/lpa';

        } elseif ($_POST['afcs/about-you/personal-details/have-lpa-code'] == 'No') {

                $data['sections']['applicant-who']['legal-authority']['havelpa'] = 'No';
            $havelpachk['No'] = 'checked';
            $theURL = '/applicant/legal-authority/information';

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
        <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
@php
echo $errorMessage;
@endphp

                                <h1 class="govuk-heading-xl">Do you have a Lasting Power of Attorney (LPA) Access Code?</h1>


<p class="govuk-body">An LPA access code is a unique code given to you by the donor named on a lasting power of attorney.</p>




<div class="govuk-form-group {{$served['error'] ?? ''}}">
  <fieldset class="govuk-fieldset" aria-describedby="contact-hint">
          @php echo $havelpa['errorLabel']; @endphp
    <div class="govuk-radios" data-module="govuk-radios">
  <legend class="govuk-fieldset__legend govuk-fieldset__legend--m">
Do you have a Lasting Power of Attorney (LPA) Access Code?
</legend>

       <div class="govuk-radios__item">
        <input class="govuk-radios__input" id="contact-2" name="afcs/about-you/personal-details/have-lpa-code" type="radio" value="No" data-aria-controls="conditional-contact-2" {{$havelpachk['No'] ?? ''}}>
        <label class="govuk-label govuk-radios__label" for="contact-2">
          No
        </label>
      </div>


      <div class="govuk-radios__item">
        <input class="govuk-radios__input" id="contact" name="afcs/about-you/personal-details/have-lpa-code" type="radio" value="Yes" data-aria-controls="conditional-contact"  {{$havelpachk['Yes'] ?? ''}}>
        <label class="govuk-label govuk-radios__label" for="contact">
          Yes
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
