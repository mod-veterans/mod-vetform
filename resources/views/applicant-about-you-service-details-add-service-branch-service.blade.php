@include('framework.functions')
@php



//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$servicebranch = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


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
    if (!empty($data['sections']['service-details']['records'][$thisRecord]['servicebranch'])) {
        $servicebranch['data']           = $data['sections']['service-details']['records'][$thisRecord]['servicebranch'];
        $rolechk[$servicebranch['data']] = ' checked';

    }
} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {





    if (!empty($_POST['afcs/about-you/service-details/service-branch/service-branch'])) {

        //set the entered field names

        $servicebranch['data'] = cleanTextData($_POST['afcs/about-you/service-details/service-branch/service-branch']);


        switch ($_POST['afcs/about-you/service-details/service-branch/service-branch']) {

            case "Royal Navy":
                $data['sections']['service-details']['records'][$thisRecord]['servicebranch'] = 'Royal Navy';
                $rolechk['Royal Navy'] = ' checked';

            break;

            case "Army":
                $data['sections']['service-details']['records'][$thisRecord]['servicebranch'] = 'Army';
                $rolechk['Army'] = ' checked';
            break;

            case "Royal Air Force":
                $data['sections']['service-details']['records'][$thisRecord]['servicebranch'] = 'Royal Air Force';
                $rolechk['Royal Air Force'] = ' checked';
            break;

            case "Royal Marines":
                $data['sections']['service-details']['records'][$thisRecord]['servicebranch'] = 'Royal Marines';
                $rolechk['Royal Marines'] = ' checked';
            break;

        }



    } else {

        $errors = 'Y';
        $errorsList[] = '<a href="#afcs/about-you/service-details/service-branch/service-branch">Tell us your service branch</a>';
        $servicebranch['error'] = 'govuk-form-group--error';
        $servicebranch['errorLabel'] =
        '<span id="afcs/about-you/service-details/service-branch/service-branch-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Tell us your service branch
         </span>';

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

        $theURL = '/applicant/about-you/service-details/add-service/service-type';
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
                                <h1 class="govuk-heading-xl">What was/is your service branch?</h1>
</legend>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group {{$servicebranch['error']}}">
    <a id="afcs/about-you/service-details/service-branch/service-branch"></a>
    <fieldset class="govuk-fieldset">
@php echo $servicebranch['errorLabel']; @endphp
                                            <div
            class="govuk-radios"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="afcs/about-you/service-details/service-branch/service-branch-royal-navy" name="afcs/about-you/service-details/service-branch/service-branch" type="radio"
           value="Royal Navy"    @php echo @$rolechk['Royal Navy']; @endphp      >
    <label class="govuk-label govuk-radios__label" for="afcs/about-you/service-details/service-branch/service-branch-royal-navy">Royal Navy</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="afcs/about-you/service-details/service-branch/service-branch-royal-marines" name="afcs/about-you/service-details/service-branch/service-branch" type="radio"
           value="Royal Marines"      @php echo @$rolechk['Royal Marines']; @endphp       >
    <label class="govuk-label govuk-radios__label" for="afcs/about-you/service-details/service-branch/service-branch-royal-marines">Royal Marines</label>
</div>


                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="afcs/about-you/service-details/service-branch/service-branch-army" name="afcs/about-you/service-details/service-branch/service-branch" type="radio"
           value="Army"      @php echo @$rolechk['Army']; @endphp       >
    <label class="govuk-label govuk-radios__label" for="afcs/about-you/service-details/service-branch/service-branch-army">Army</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="afcs/about-you/service-details/service-branch/service-branch-royal-air-force" name="afcs/about-you/service-details/service-branch/service-branch" type="radio"
           value="Royal Air Force"  @php echo @$rolechk['Royal Air Force']; @endphp           >
    <label class="govuk-label govuk-radios__label" for="afcs/about-you/service-details/service-branch/service-branch-royal-air-force">Royal Air Force</label>
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




@include('framework.footer')
