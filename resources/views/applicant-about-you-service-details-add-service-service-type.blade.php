@include('framework.functions')
@php



//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$servicetype = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


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
    if (!empty($data['sections']['service-details']['records'][$thisRecord]['servicetype'])) {
        $servicetype['data']           = $data['sections']['service-details']['records'][$thisRecord]['servicetype'];
        $rolechk[$servicetype['data']] = ' checked';

    }
} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {





    if (!empty($_POST['afcs/about-you/service-details/service-type/service-type'])) {

        //set the entered field names


        switch ($_POST['afcs/about-you/service-details/service-type/service-type']) {

            case "Regular":
                $data['sections']['service-details']['records'][$thisRecord]['servicetype'] = 'Regular';
                $rolechk['Regular'] = ' checked';

            break;

            case "Reserve (includes Full Time Reserve Service)":
                $data['sections']['service-details']['records'][$thisRecord]['servicetype'] = 'Reserve (includes Full Time Reserve Service)';
                $rolechk['Reserve (includes Full Time Reserve Service)'] = ' checked';
            break;


        }


    } else {

        $errors = 'Y';
        $errorsList[] = '<a href="#afcs/about-you/service-details/service-branch/service-type">Please tell us your service type</a>';
        $servicetype['error'] = 'govuk-form-group--error';
        $servicetype['errorLabel'] =
        '<span id="afcs/about-you/service-details/service-branch/service-type-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Please tell us your service type
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

        $theURL = '/applicant/about-you/service-details/add-service/rank';
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
                                <h1 class="govuk-heading-xl">What was/is your service type?</h1>
</legend>
<p class="govuk-body">For this period of service</p>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group {{$servicetype['error']}}">
    <a id="afcs/about-you/service-details/service-type/service-type"></a>
    <fieldset class="govuk-fieldset">
@php echo $servicetype['errorLabel']; @endphp
                                            <div
            class="govuk-radios govuk-radios--inline"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="afcs/about-you/service-details/service-type/service-type-regular" name="afcs/about-you/service-details/service-type/service-type" type="radio"
           value="Regular"      @php echo @$rolechk['Regular']; @endphp      >
    <label class="govuk-label govuk-radios__label" for="afcs/about-you/service-details/service-type/service-type-regular">Regular</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="afcs/about-you/service-details/service-type/service-type-reserve(includes-full-time-reserve-service)" name="afcs/about-you/service-details/service-type/service-type" type="radio"
           value="Reserve (includes Full Time Reserve Service)"    @php echo @$rolechk['Reserve (includes Full Time Reserve Service)']; @endphp        >
    <label class="govuk-label govuk-radios__label" for="afcs/about-you/service-details/service-type/service-type-reserve(includes-full-time-reserve-service)">Reserve (includes Full Time Reserve Service)</label>
</div>

                    </div>
    </fieldset>
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
