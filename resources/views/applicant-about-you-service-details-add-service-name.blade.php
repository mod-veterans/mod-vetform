@include('framework.functions')
@php



//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();
$differentnamechk = array();
$donotwanttodisclosechk = '';

//set fields
$nameinservice = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$differentname = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$donotwanttodisclose = array('data'=>'', 'error'=>'', 'errorLabel'=>'');



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

    if (!empty($data['sections']['service-details']['records'][$thisRecord]['differentname'])) {
        $differentname['data']           = @$data['sections']['service-details']['records'][$thisRecord]['differentname'];

        if ($differentname['data']  == 'No') {
            $differentnamechk['No'] = 'checked';
        }
        if ($differentname['data']  == 'Yes') {
            $differentnamechk['Yes'] = 'checked';
        }

    }
    if (!empty($data['sections']['service-details']['records'][$thisRecord]['donotwanttodisclose'])) {
        $donotwanttodisclose['data'] = @$data['sections']['service-details']['records'][$thisRecord]['donotwanttodisclose'];
        if ($donotwanttodisclose['data'] == 'Yes') {
            $donotwanttodisclosechk = 'checked';

        }
    }




} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {


    //set the entered field names

    $nameinservice['data'] = cleanTextData($_POST['afcs/about-you/service-details/service-name/name-in-service']);


    if (empty($_POST['afcs/about-you/service-details/service-name/differentname'])) {

        $errors = 'Y';
        $errorsList[] = '<a href="#afcs/about-you/service-details/service-name/differentname">Please tell us if you had a different name</a>';
        $differentname['error'] = 'govuk-form-group--error';
        $differentname['errorLabel'] =
        '<span id="afcs/about-you/service-details/service-name/differentname-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Please tell us if you had a different name
         </span>';


    } else {
        $differentname['data'] = cleanTextData($_POST['afcs/about-you/service-details/service-name/differentname']);
        $data['sections']['service-details']['records'][$thisRecord]['differentname'] = $differentname['data'];

    }



    if (empty($_POST['afcs/about-you/service-details/service-name/donotwanttodisclose'])) {
        $_POST['afcs/about-you/service-details/service-name/donotwanttodisclose'] = 'No';
        $data['sections']['service-details']['records'][$thisRecord]['donotwanttodisclose'] = 'No';
    } else {
        $data['sections']['service-details']['records'][$thisRecord]['nameinservice'] = '';
        $_POST['afcs/about-you/service-details/service-name/name-in-service'] = '';



    }




    if ((!empty($_POST['afcs/about-you/service-details/service-name/differentname']))&&($_POST['afcs/about-you/service-details/service-name/differentname'] == 'Yes')) {

        $differentnamechk['Yes'] = 'checked';

        if (empty($_POST['afcs/about-you/service-details/service-name/name-in-service'])) {

            $data['sections']['service-details']['records'][$thisRecord]['nameinservice'] = '';

            if ($_POST['afcs/about-you/service-details/service-name/donotwanttodisclose'] == 'Yes') {

                $donotwanttodisclose['data'] = cleanTextData($_POST['afcs/about-you/service-details/service-name/donotwanttodisclose']);
                $data['sections']['service-details']['records'][$thisRecord]['donotwanttodisclose'] = 'Yes';
                $data['sections']['service-details']['records'][$thisRecord]['nameinservice'] = '';
                $donotwanttodisclosechk = 'checked';

            } else {


                $errors = 'Y';
                $errorsList[] = '<a href="#afcs/about-you/service-details/service-name/name-in-service">Please give us your service name for this period of service</a>';
                $nameinservice['error'] = 'govuk-form-group--error';
                $nameinservice['errorLabel'] =
                '<span id="afcs/about-you/service-details/service-name/name-in-service-error" class="govuk-error-message">
                    <span class="govuk-visually-hidden">Error:</span> Please give us your service name for this period of service
                 </span>';

            }

        } else {
            $data['sections']['service-details']['records'][$thisRecord]['nameinservice'] = cleanTextData($_POST['afcs/about-you/service-details/service-name/name-in-service']);
        }


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

            <form method="post" enctype="multipart/form-data" novalidate >
            @csrf

<div class="govuk-form-group {{$served['error'] ?? ''}}">
  <fieldset class="govuk-fieldset" aria-describedby="contact-hint">
          @php echo $differentname['errorLabel']; @endphp
    <div class="govuk-radios" data-module="govuk-radios">

       <div class="govuk-radios__item">
        <input class="govuk-radios__input" id="contact-2" name="afcs/about-you/service-details/service-name/differentname" type="radio" value="No" data-aria-controls="conditional-contact-2" {{$differentnamechk['No'] ?? ''}}>
        <label class="govuk-label govuk-radios__label" for="contact-2">
          No
        </label>
      </div>


      <div class="govuk-radios__item">
        <input class="govuk-radios__input" id="contact" name="afcs/about-you/service-details/service-name/differentname" type="radio" value="Yes" data-aria-controls="conditional-contact"  {{$differentnamechk['Yes'] ?? ''}}>
        <label class="govuk-label govuk-radios__label" for="contact">
          Yes
        </label>
      </div>
      <div class="govuk-radios__conditional {{$numHidden ?? ''}}" id="conditional-contact">
        <div class="govuk-form-group">
          <label class="govuk-label" for="contact-by-email">
            Tell us the names you used during this period of service.
          </label>
          @php echo $nameinservice['errorLabel']; @endphp
                 <input
        class="govuk-input govuk-!-width-two-thirds "
        id="afcs/about-you/service-details/service-name/name-in-service" name="afcs/about-you/service-details/service-name/name-in-service" type="text"
         autocomplete="name"
                  value="{{$nameinservice['data']}}"
            >

<br /><br />
<div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="615fda227931d" name="afcs/about-you/service-details/service-name/donotwanttodisclose" type="checkbox"
           value="Yes"       {{@$donotwanttodisclosechk ?? ''}}    >
    <label class="govuk-label govuk-checkboxes__label" for="615fda227931d">I do not want to disclose my name in service</label>
</div>


      </div>


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

  <script src="/js/app2.js"></script>
@include('framework.footer')
