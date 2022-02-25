@include('framework.functions')
@php



//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$refnum= array('data'=>'', 'error'=>'', 'errorLabel'=>'');



//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);


if (empty($_POST)) {
    //load the data if set
    if (!empty($data['sections']['about-you']['refnum'])) {
        $refnum['data']           = @$data['sections']['about-you']['refnum'];

    }
} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {


    //set the entered field names

    $refnum['data'] = cleanTextData($_POST['afcs/about-you/personal-details/previous-claim-reference/previous-claim-reference']);


    if (empty($_POST['afcs/about-you/personal-details/previous-claim-reference/previous-claim-reference'])) {


    } else {
        $data['sections']['about-you']['refnum'] = cleanTextData($_POST['afcs/about-you/personal-details/previous-claim-reference/previous-claim-reference']);
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

        $theURL = '/applicant/about-you/save-return';
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
   <legend class="govuk-fieldset__legend govuk-fieldset__legend--l">
                                <h1 class="govuk-heading-xl">What was the claim reference number?</h1>
</legend>
<p class="govuk-body">If you can’t remember, leave this blank.</p>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="afcs/about-you/personal-details/previous-claim-reference/previous-claim-reference">
        <span class="govuk-visually-hidden">Previous claim reference number</span>
    </label>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="afcs/about-you/personal-details/previous-claim-reference/previous-claim-reference" name="afcs/about-you/personal-details/previous-claim-reference/previous-claim-reference" type="text"
                   value="{{$refnum['data']}}" maxlength="50"
            >
</div>



                <div class="govuk-form-group">
   <button class="govuk-button govuk-!-margin-right-2" data-module="govuk-button">Save and continue</button>
            <br><a href="/cancel" class="govuk-link"
           data-module="govuk-button">
            Cancel application
        </a>

    </div>
            </form>
            </div>
        </div>
    </main>
</div>



@include('framework.footer')
