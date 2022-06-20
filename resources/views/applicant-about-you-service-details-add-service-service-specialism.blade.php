@include('framework.functions')
@php



//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$specialism = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


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
    if (!empty($data['sections']['service-details']['records'][$thisRecord]['specialism'])) {
        $specialism['data']           = @$data['sections']['service-details']['records'][$thisRecord]['specialism'];
    }
} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {


    //set the entered field names

    $specialism['data'] = cleanTextData($_POST['afcs/about-you/service-details/service-trade/service-trade']);





    if (empty($_POST['afcs/about-you/service-details/service-trade/service-trade'])) {
        $errors = 'Y';
        $errorsList[] = '<a href="#afcs/about-you/service-details/service-trade/service-trade">Please give us your service trade or specialism</a>';
        $specialism['error'] = 'govuk-form-group--error';
        $specialism['errorLabel'] =
        '<span id="afcs/about-you/service-details/service-trade/service-trade-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Please give us your service trade or specialism
         </span>';

    } else {

        $data['sections']['service-details']['records'][$thisRecord]['specialism'] = cleanTextData($_POST['afcs/about-you/service-details/service-trade/service-trade']);

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

        $theURL = '/applicant/about-you/service-details/add-service/enlistment-date';
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
                                <h1 class="govuk-heading-xl">What service trades or professions have you had?</h1>
 </legend>
                                <p class="govuk-body">For example, navigator, infantry soldier, electrician, pilot.</p>

<div class="govuk-warning-text">
  <span class="govuk-warning-text__icon" aria-hidden="true">!</span>
  <strong class="govuk-warning-text__text">
    <span class="govuk-warning-text__assistive">Warning</span>
    Do not refer to Special Forces trades or professions.
  </strong>
</div>

<p class="govuk-body">List all the trades or professions you have had (except Special Forces).</p>

                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group {{$specialism['error']}} ">
    <label class="govuk-label" for="afcs/about-you/service-details/service-trade/service-trade">
        <span class="govuk-visually-hidden">Service trade</span>
    </label>
@php echo $specialism['errorLabel']; @endphp
            <textarea
        class="govuk-textarea govuk-!-width-two-thirds " rows="5"
        id="afcs/about-you/service-details/service-trade/service-trade" name="afcs/about-you/service-details/service-trade/service-trade" type="text"
         autocomplete="name"
                  >{{$specialism['data']}}</textarea>

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
