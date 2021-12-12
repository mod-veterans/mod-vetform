@include('framework.functions')
@php



//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$nameinservice = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);



//this gets teh current record ID to edit and sets it for reference
if (empty($_GET['servicerecord'])) {

    if (empty($data['settings']['service-details-record-num'])) {
        header("Location: /applicant/about-you/service-details");
        die();
    } else {
        $thisRecord = $data['settings']['service-details-record-num'];
    }

} else {
    $thisRecord = cleanRecordID($_GET['servicerecord']);
    $data['settings']['service-details-record-num'] = $thisRecord;
}



if (empty($_POST)) {
    //load the data if set
    if (!empty($data['sections']['service-details']['records'][$thisRecord]['nameinservice'])) {
        $nameinservice['data']           = @$data['sections']['service-details']['records'][$thisRecord]['nameinservice'];


    }
} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {


    //set the entered field names

    $nameinservice['data'] = cleanTextData($_POST['afcs/about-you/service-details/service-name/name-in-service']);





    if (empty($_POST['afcs/about-you/service-details/service-name/name-in-service'])) {
        /*
        $errors = 'Y';
        $errorsList[] = '<a href="#afcs/about-you/service-details/service-name/name-in-service">Please give us your full service name</a>';
        $nameinservice['error'] = 'govuk-form-group--error';
        $nameinservice['errorLabel'] =
        '<span id="afcs/about-you/service-details/service-name/name-in-service-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Please give us your full service name
         </span>';
         */

    } else {
        $data['sections']['service-details']['records'][$thisRecord]['nameinservice'] = cleanTextData($_POST['afcs/about-you/service-details/service-name/name-in-service']);
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

        $theURL = '/applicant/about-you/service-details/add-service/service-number';
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
                                <h1 class="govuk-heading-xl">Did you have a different name during this period of service?</h1>
</legend>
                                <p class="govuk-body">If you used a different name during this period of service, enter all names used below, otherwise leave this section blank. </p>
                       <p class="govuk-body">If you do not wish to disclose a name you used, please write &#8216;contact me for details&#8217; and we will get in touch with you to discuss this further if we need to.</p>

            <form method="post" enctype="multipart/form-data" novalidate >
            @csrf
                                                    <div class="govuk-form-group {{$nameinservice['error']}} ">
    <label class="govuk-label" for="afcs/about-you/service-details/service-name/name-in-service">
        <span class="govuk-visually-hidden">Enter the full name in service</span>
    </label>
@php echo $nameinservice['errorLabel']; @endphp
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="afcs/about-you/service-details/service-name/name-in-service" name="afcs/about-you/service-details/service-name/name-in-service" type="text"
         autocomplete="name"
                  value="{{$nameinservice['data']}}"
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
