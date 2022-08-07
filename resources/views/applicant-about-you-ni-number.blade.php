@include('framework.functions')
@php


//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$ninumber = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);


if (empty($_POST)) {
    //load the data if set
    if (!empty($data['sections']['about-you']['email'])) {
        $ninumber['data']            = @$data['sections']['about-you']['ninumber'];

    }

} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {


    //set the entered field names
        $ninumber['data']            = $_POST['afcs/about-you/personal-details/national-insurance/ni-number'];



        if (!validateNINUmber($_POST['afcs/about-you/personal-details/national-insurance/ni-number'])) {

            $errors = 'Y';
            $errorsList[] = '<a href="#afcs/about-you/personal-details/national-insurance/ni-number">Enter a National Insurance number in the correct format</a>';
            $ninumber['error'] = 'govuk-form-group--error';
            $ninumber['errorLabel'] =
            '<span id="afcs/about-you/personal-details/national-insurance/ni-number" class="govuk-error-message">
                <span class="govuk-visually-hidden">Error:</span>Enter a National Insurance number in the correct format
             </span>';



        } else {


               $data['sections']['about-you']['ninumber'] = $_POST['afcs/about-you/personal-details/national-insurance/ni-number'];


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

        $theURL = '/applicant/about-you/pension-scheme';
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
                                <h1 class="govuk-heading-xl">What is your National Insurance number?</h1>
                                <p class="govuk-body">The UK national insurance number of the person with the injury, illness or disability.</p>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group {{$ninumber['error']}} ">
    <label class="govuk-label" for="afcs/about-you/personal-details/national-insurance/ni-number">
        <span class="govuk-visually-hidden">NI Number</span>
    </label>
@php echo $ninumber['errorLabel']; @endphp
    <div id="afcs/about-you/personal-details/national-insurance/ni-number-hint" class="govuk-hint"> It’s on your National Insurance card, benefit letter, payslip or P60. For example, ‘QQ 12 34 56 C’.</div>
        <input
        class="govuk-input govuk-!-width-two-thirds "
        id="afcs/about-you/personal-details/national-insurance/ni-number" name="afcs/about-you/personal-details/national-insurance/ni-number" type="text"
                   value="{{$ninumber['data']}}"
                aria-describedby="afcs/about-you/personal-details/national-insurance/ni-number-hint"
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
