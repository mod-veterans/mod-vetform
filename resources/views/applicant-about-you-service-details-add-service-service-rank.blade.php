@include('framework.functions')
@php



//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$servicerank = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


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
    if (!empty($data['sections']['service-details']['records'][$thisRecord]['service-rank'])) {
        $servicerank['data']           = @$data['sections']['service-details']['records'][$thisRecord]['service-rank'];
    }
} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {


    //set the entered field names

    $servicerank['data'] = cleanTextData($_POST['afcs/about-you/service-details/service-rank/service-rank']);





    if (empty($_POST['afcs/about-you/service-details/service-rank/service-rank'])) {
        $errors = 'Y';
        $errorsList[] = '<a href="#afcs/about-you/service-details/service-rank/service-rank">Tell us your service rank</a>';
        $servicerank['error'] = 'govuk-form-group--error';
        $servicerank['errorLabel'] =
        '<span id="afcs/about-you/service-details/service-rank/service-rank-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Tell us your service rank
         </span>';

    } else {

        $data['sections']['service-details']['records'][$thisRecord]['service-rank'] = cleanTextData($_POST['afcs/about-you/service-details/service-rank/service-rank']);

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

        $theURL = '/applicant/about-you/service-details/add-service/specialism';
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
                                <h1 class="govuk-heading-xl">What is your rank?</h1>
</legend>
                                <p class="govuk-body">Rank on discharge from this period of service or current rank if still serving.</p>
<p class="govuk-body">For example, Private, SSgt.</p>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group {{$servicerank['error']}}">
    <label class="govuk-label" for="afcs/about-you/service-details/service-rank/service-rank">
        <span class="govuk-visually-hidden">Service rank</span>
    </label>
@php echo $servicerank['errorLabel']; @endphp
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="afcs/about-you/service-details/service-rank/service-rank" name="afcs/about-you/service-details/service-rank/service-rank" type="text"
         autocomplete="name"
                  value="{{$servicerank['data']}}"
          maxlength="75"  >
<div id="afcs/about-you/service-details/service-rank/service-rank-info" class="govuk-hint govuk-character-count__message" aria-live="polite">
                You can enter up to 75 characters
            </div>
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
