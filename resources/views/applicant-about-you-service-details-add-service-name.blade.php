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


    if (empty($_POST['afcs/about-you/service-details/service-name/differentname'])) {

        $errors = 'Y';
        $errorsList[] = '<a href="#afcs/about-you/service-details/service-name/differentname-no">Tell us if you had a different name</a>';
        $differentname['error'] = 'govuk-form-group--error';
        $differentname['errorLabel'] =
        '<span id="afcs/about-you/service-details/service-name/differentname-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Tell us if you had a different name
         </span>';


    } else {
        $differentname['data'] = cleanTextData($_POST['afcs/about-you/service-details/service-name/differentname']);
        $data['sections']['service-details']['records'][$thisRecord]['differentname'] = $differentname['data'];

    }



    if (empty($_POST['afcs/about-you/service-details/service-name/donotwanttodisclose'])) {
        $_POST['afcs/about-you/service-details/service-name/donotwanttodisclose'] = 'unticked';
        $data['sections']['service-details']['records'][$thisRecord]['donotwanttodisclose'] = 'unticked';
    } else {


    }


    if ((!empty($_POST['afcs/about-you/service-details/service-name/differentname']))&&($_POST['afcs/about-you/service-details/service-name/differentname'] == 'Yes')) {


        $differentname['data'] = cleanTextData($_POST['afcs/about-you/service-details/service-name/differentname']);
        $data['sections']['service-details']['records'][$thisRecord]['differentname'] = $differentname['data'];
        $differentnamechk['Yes'] = 'checked';

        if (empty($_POST['afcs/about-you/service-details/service-name/name-in-service'])) {

            $data['sections']['service-details']['records'][$thisRecord]['nameinservice'] = '';

            if ($_POST['afcs/about-you/service-details/service-name/donotwanttodisclose'] == 'Yes') {

                $donotwanttodisclose['data'] = cleanTextData($_POST['afcs/about-you/service-details/service-name/donotwanttodisclose']);
                $data['sections']['service-details']['records'][$thisRecord]['donotwanttodisclose'] = 'Yes';
                $donotwanttodisclosechk = 'checked';

            } else {


                $errors = 'Y';
                $errorsList[] = '<a href="#afcs/about-you/service-details/service-name/name-in-service">Tell us your service name for this period of service</a>';
                $nameinservice['error'] = 'govuk-form-group--error';
                $nameinservice['errorLabel'] =
                '<span id="afcs/about-you/service-details/service-name/name-in-service-error" class="govuk-error-message">
                    <span class="govuk-visually-hidden">Error:</span> Tell us your service name for this period of service
                 </span>';

            }

        } else {
            $data['sections']['service-details']['records'][$thisRecord]['nameinservice'] = cleanTextData($_POST['afcs/about-you/service-details/service-name/name-in-service']);

            if (empty($_POST['afcs/about-you/service-details/service-name/donotwanttodisclose'])) {
                $data['sections']['service-details']['records'][$thisRecord]['donotwanttodisclose'] = 'unticked';
            } else {
                $data['sections']['service-details']['records'][$thisRecord]['donotwanttodisclose'] = $_POST['afcs/about-you/service-details/service-name/donotwanttodisclose'];
            }


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

$page_title = 'Did you have a different name during this period of service?';

@endphp



@include('framework.header')


    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">

@php
echo $errorMessage;
@endphp


            <form method="post" enctype="multipart/form-data" novalidate >
            @csrf

<div class="govuk-form-group {{$differentname['error'] ?? ''}}">
  <fieldset class="govuk-fieldset">
 <legend class="govuk-fieldset__legend govuk-fieldset__legend--l">
                                <h1 class="govuk-heading-xl">Did you have a different name during this period of service?</h1>
</legend>
          @php echo $differentname['errorLabel']; @endphp
    <div class="govuk-radios" data-module="govuk-radios">

       <div class="govuk-radios__item">
        <input class="govuk-radios__input" id="afcs/about-you/service-details/service-name/differentname-no" name="afcs/about-you/service-details/service-name/differentname" type="radio" value="No" data-aria-controls="conditional-contact-2" {{$differentnamechk['No'] ?? ''}}>
        <label class="govuk-label govuk-radios__label" for="afcs/about-you/service-details/service-name/differentname-no">
          No
        </label>
      </div>


      <div class="govuk-radios__item">
        <input class="govuk-radios__input" id="afcs/about-you/service-details/service-name/differentname-yes" name="afcs/about-you/service-details/service-name/differentname" type="radio" value="Yes" data-aria-controls="conditional-contact"  {{$differentnamechk['Yes'] ?? ''}}>
        <label class="govuk-label govuk-radios__label" for="afcs/about-you/service-details/service-name/differentname-yes">
          Yes
        </label>
      </div>
      <div class="govuk-radios__conditional {{$numHidden ?? ''}}" id="conditional-contact">
        <div class="govuk-form-group">
          <label class="govuk-label" for="afcs/about-you/service-details/service-name/name-in-service">
            Tell us the names on your service records for this period of service.  We do not need to know about nicknames.
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
@include('framework.bottombuttons')

    </div>
            </form>
            </div>
        </div>
    </main>
</div>

  <script src="/js/app2.js"></script>
@include('framework.footer')
