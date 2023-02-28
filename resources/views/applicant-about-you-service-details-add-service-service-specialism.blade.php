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
$specialism1 = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$specialism1Duration = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$specialism2 = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$specialism2Duration = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$specialism3 = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$specialism3Duration = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$specialism4 = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$specialism4Duration = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$specialism5 = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$specialism5Duration = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$specialism6 = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$specialism6Duration = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$specialism7 = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$specialism7Duration = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$specialism8 = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$specialism8Duration = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$specialism9 = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$specialism9Duration = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$specialism10 = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$specialism10Duration = array('data'=>'', 'error'=>'', 'errorLabel'=>'');





//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);



//if served with special forces, do not show this question
if (
(@$data['sections']['applicant-who']['legal-authority']['epaw']['served'] == 'Yes')
||
(@$data['sections']['applicant-who']['helper']['epaw']['served'] == 'Yes')
||
(@$data['sections']['applicant-who']['apply-yourself']['epaw']['served'] == 'Yes')
) {
    header("Location: /applicant/about-you/service-details/add-service/enlistment-date");
    die();
}





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
    if (!empty($data['sections']['service-details']['records'][$thisRecord]['specialism1'])) {
        $specialism1['data']           = @$data['sections']['service-details']['records'][$thisRecord]['specialism1'];
    }
    if (!empty($data['sections']['service-details']['records'][$thisRecord]['specialism1Duration'])) {
        $specialism1Duration['data']           = @$data['sections']['service-details']['records'][$thisRecord]['specialism1Duration'];
    }

    if (!empty($data['sections']['service-details']['records'][$thisRecord]['specialism2'])) {
        $specialism2['data']           = @$data['sections']['service-details']['records'][$thisRecord]['specialism2'];
    }
    if (!empty($data['sections']['service-details']['records'][$thisRecord]['specialism2Duration'])) {
        $specialism2Duration['data']           = @$data['sections']['service-details']['records'][$thisRecord]['specialism2Duration'];
    }

    if (!empty($data['sections']['service-details']['records'][$thisRecord]['specialism3'])) {
        $specialism3['data']           = @$data['sections']['service-details']['records'][$thisRecord]['specialism3'];
    }
    if (!empty($data['sections']['service-details']['records'][$thisRecord]['specialism3Duration'])) {
        $specialism3Duration['data']           = @$data['sections']['service-details']['records'][$thisRecord]['specialism3Duration'];
    }

    if (!empty($data['sections']['service-details']['records'][$thisRecord]['specialism4'])) {
        $specialism4['data']           = @$data['sections']['service-details']['records'][$thisRecord]['specialism4'];
    }
    if (!empty($data['sections']['service-details']['records'][$thisRecord]['specialism4Duration'])) {
        $specialism4Duration['data']           = @$data['sections']['service-details']['records'][$thisRecord]['specialism4Duration'];
    }

    if (!empty($data['sections']['service-details']['records'][$thisRecord]['specialism5'])) {
        $specialism5['data']           = @$data['sections']['service-details']['records'][$thisRecord]['specialism5'];
    }
    if (!empty($data['sections']['service-details']['records'][$thisRecord]['specialism5Duration'])) {
        $specialism5Duration['data']           = @$data['sections']['service-details']['records'][$thisRecord]['specialism5Duration'];
    }

    if (!empty($data['sections']['service-details']['records'][$thisRecord]['specialism6'])) {
        $specialism6['data']           = @$data['sections']['service-details']['records'][$thisRecord]['specialism6'];
    }
    if (!empty($data['sections']['service-details']['records'][$thisRecord]['specialism6Duration'])) {
        $specialism6Duration['data']           = @$data['sections']['service-details']['records'][$thisRecord]['specialism6Duration'];
    }

    if (!empty($data['sections']['service-details']['records'][$thisRecord]['specialism7'])) {
        $specialism7['data']           = @$data['sections']['service-details']['records'][$thisRecord]['specialism7'];
    }
    if (!empty($data['sections']['service-details']['records'][$thisRecord]['specialism7Duration'])) {
        $specialism7Duration['data']           = @$data['sections']['service-details']['records'][$thisRecord]['specialism7Duration'];
    }

    if (!empty($data['sections']['service-details']['records'][$thisRecord]['specialism8'])) {
        $specialism8['data']           = @$data['sections']['service-details']['records'][$thisRecord]['specialism8'];
    }
    if (!empty($data['sections']['service-details']['records'][$thisRecord]['specialism8Duration'])) {
        $specialism8Duration['data']           = @$data['sections']['service-details']['records'][$thisRecord]['specialism8Duration'];
    }

    if (!empty($data['sections']['service-details']['records'][$thisRecord]['specialism9'])) {
        $specialism9['data']           = @$data['sections']['service-details']['records'][$thisRecord]['specialism9'];
    }
    if (!empty($data['sections']['service-details']['records'][$thisRecord]['specialism9Duration'])) {
        $specialism9Duration['data']           = @$data['sections']['service-details']['records'][$thisRecord]['specialism9Duration'];
    }

    if (!empty($data['sections']['service-details']['records'][$thisRecord]['specialism10'])) {
        $specialism10['data']           = @$data['sections']['service-details']['records'][$thisRecord]['specialism10'];
    }
    if (!empty($data['sections']['service-details']['records'][$thisRecord]['specialism10Duration'])) {
        $specialism10Duration['data']           = @$data['sections']['service-details']['records'][$thisRecord]['specialism10Duration'];
    }




} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {


    //set the entered field names

    $specialism1['data'] = cleanTextData($_POST['afcs/about-you/service-details/service-trade/specialism1']);
    $specialism1Duration['data'] = cleanTextData($_POST['afcs/about-you/service-details/service-trade/specialism1Duration']);
    $specialism2['data'] = cleanTextData($_POST['afcs/about-you/service-details/service-trade/specialism2']);
    $specialism2Duration['data'] = cleanTextData($_POST['afcs/about-you/service-details/service-trade/specialism2Duration']);
    $specialism3['data'] = cleanTextData($_POST['afcs/about-you/service-details/service-trade/specialism3']);
    $specialism3Duration['data'] = cleanTextData($_POST['afcs/about-you/service-details/service-trade/specialism3Duration']);
    $specialism4['data'] = cleanTextData($_POST['afcs/about-you/service-details/service-trade/specialism4']);
    $specialism4Duration['data'] = cleanTextData($_POST['afcs/about-you/service-details/service-trade/specialism4Duration']);
    $specialism5['data'] = cleanTextData($_POST['afcs/about-you/service-details/service-trade/specialism5']);
    $specialism5Duration['data'] = cleanTextData($_POST['afcs/about-you/service-details/service-trade/specialism5Duration']);
    $specialism6['data'] = cleanTextData($_POST['afcs/about-you/service-details/service-trade/specialism6']);
    $specialism6Duration['data'] = cleanTextData($_POST['afcs/about-you/service-details/service-trade/specialism6Duration']);
    $specialism7['data'] = cleanTextData($_POST['afcs/about-you/service-details/service-trade/specialism7']);
    $specialism7Duration['data'] = cleanTextData($_POST['afcs/about-you/service-details/service-trade/specialism7Duration']);
    $specialism8['data'] = cleanTextData($_POST['afcs/about-you/service-details/service-trade/specialism8']);
    $specialism8Duration['data'] = cleanTextData($_POST['afcs/about-you/service-details/service-trade/specialism8Duration']);
    $specialism9['data'] = cleanTextData($_POST['afcs/about-you/service-details/service-trade/specialism9']);
    $specialism9Duration['data'] = cleanTextData($_POST['afcs/about-you/service-details/service-trade/specialism9Duration']);
    $specialism10['data'] = cleanTextData($_POST['afcs/about-you/service-details/service-trade/specialism10']);
    $specialism10Duration['data'] = cleanTextData($_POST['afcs/about-you/service-details/service-trade/specialism10Duration']);









    if (empty($_POST['afcs/about-you/service-details/service-trade/specialism1'])) {
        $errors = 'Y';
        $errorsList[] = '<a href="#afcs/about-you/service-details/service-trade/specialism1">Tell us at least one service trade or specialism for this period of service</a>';
        $specialism['error'] = 'govuk-form-group--error';
        $specialism['errorLabel'] =
        '<span id="afcs/about-you/service-details/service-trade/service-trade-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Tell us at least one service trade or specialism for this period of service
         </span>';

    } else {

        $data['sections']['service-details']['records'][$thisRecord]['specialism1'] = cleanTextData($_POST['afcs/about-you/service-details/service-trade/specialism1']);

    }


    if (empty($_POST['afcs/about-you/service-details/service-trade/specialism1Duration'])) {
    } else {

        $data['sections']['service-details']['records'][$thisRecord]['specialism1Duration'] = cleanTextData($_POST['afcs/about-you/service-details/service-trade/specialism1Duration']);

    }



    if (empty($_POST['afcs/about-you/service-details/service-trade/specialism1'])) {
    } else {
        $data['sections']['service-details']['records'][$thisRecord]['specialism1'] = cleanTextData($_POST['afcs/about-you/service-details/service-trade/specialism1']);
    }

    if (empty($_POST['afcs/about-you/service-details/service-trade/specialism1Duration'])) {
    } else {
        $data['sections']['service-details']['records'][$thisRecord]['specialism1Duration'] = cleanTextData($_POST['afcs/about-you/service-details/service-trade/specialism1Duration']);
    }

    if (empty($_POST['afcs/about-you/service-details/service-trade/specialism2'])) {
    } else {
        $data['sections']['service-details']['records'][$thisRecord]['specialism2'] = cleanTextData($_POST['afcs/about-you/service-details/service-trade/specialism2']);
    }

    if (empty($_POST['afcs/about-you/service-details/service-trade/specialism2Duration'])) {
    } else {
        $data['sections']['service-details']['records'][$thisRecord]['specialism2Duration'] = cleanTextData($_POST['afcs/about-you/service-details/service-trade/specialism2Duration']);
    }

    if (empty($_POST['afcs/about-you/service-details/service-trade/specialism3'])) {
    } else {
        $data['sections']['service-details']['records'][$thisRecord]['specialism3'] = cleanTextData($_POST['afcs/about-you/service-details/service-trade/specialism3']);
    }

    if (empty($_POST['afcs/about-you/service-details/service-trade/specialism3Duration'])) {
    } else {
        $data['sections']['service-details']['records'][$thisRecord]['specialism3Duration'] = cleanTextData($_POST['afcs/about-you/service-details/service-trade/specialism3Duration']);
    }

    if (empty($_POST['afcs/about-you/service-details/service-trade/specialism4'])) {
    } else {
        $data['sections']['service-details']['records'][$thisRecord]['specialism4'] = cleanTextData($_POST['afcs/about-you/service-details/service-trade/specialism4']);
    }

    if (empty($_POST['afcs/about-you/service-details/service-trade/specialism4Duration'])) {
    } else {
        $data['sections']['service-details']['records'][$thisRecord]['specialism4Duration'] = cleanTextData($_POST['afcs/about-you/service-details/service-trade/specialism4Duration']);
    }

    if (empty($_POST['afcs/about-you/service-details/service-trade/specialism5'])) {
    } else {
        $data['sections']['service-details']['records'][$thisRecord]['specialism5'] = cleanTextData($_POST['afcs/about-you/service-details/service-trade/specialism5']);
    }

    if (empty($_POST['afcs/about-you/service-details/service-trade/specialism5Duration'])) {
    } else {
        $data['sections']['service-details']['records'][$thisRecord]['specialism5Duration'] = cleanTextData($_POST['afcs/about-you/service-details/service-trade/specialism5Duration']);
    }

    if (empty($_POST['afcs/about-you/service-details/service-trade/specialism6'])) {
    } else {
        $data['sections']['service-details']['records'][$thisRecord]['specialism6'] = cleanTextData($_POST['afcs/about-you/service-details/service-trade/specialism6']);
    }

    if (empty($_POST['afcs/about-you/service-details/service-trade/specialism6Duration'])) {
    } else {
        $data['sections']['service-details']['records'][$thisRecord]['specialism6Duration'] = cleanTextData($_POST['afcs/about-you/service-details/service-trade/specialism6Duration']);
    }

    if (empty($_POST['afcs/about-you/service-details/service-trade/specialism7'])) {
    } else {
        $data['sections']['service-details']['records'][$thisRecord]['specialism7'] = cleanTextData($_POST['afcs/about-you/service-details/service-trade/specialism7']);
    }

    if (empty($_POST['afcs/about-you/service-details/service-trade/specialism7Duration'])) {
    } else {
        $data['sections']['service-details']['records'][$thisRecord]['specialism7Duration'] = cleanTextData($_POST['afcs/about-you/service-details/service-trade/specialism7Duration']);
    }

    if (empty($_POST['afcs/about-you/service-details/service-trade/specialism8'])) {
    } else {
        $data['sections']['service-details']['records'][$thisRecord]['specialism8'] = cleanTextData($_POST['afcs/about-you/service-details/service-trade/specialism8']);
    }

    if (empty($_POST['afcs/about-you/service-details/service-trade/specialism8Duration'])) {
    } else {
        $data['sections']['service-details']['records'][$thisRecord]['specialism8Duration'] = cleanTextData($_POST['afcs/about-you/service-details/service-trade/specialism8Duration']);
    }

    if (empty($_POST['afcs/about-you/service-details/service-trade/specialism9'])) {
    } else {
        $data['sections']['service-details']['records'][$thisRecord]['specialism9'] = cleanTextData($_POST['afcs/about-you/service-details/service-trade/specialism9']);
    }

    if (empty($_POST['afcs/about-you/service-details/service-trade/specialism9Duration'])) {
    } else {
        $data['sections']['service-details']['records'][$thisRecord]['specialism9Duration'] = cleanTextData($_POST['afcs/about-you/service-details/service-trade/specialism9Duration']);
    }

    if (empty($_POST['afcs/about-you/service-details/service-trade/specialism10'])) {
    } else {
        $data['sections']['service-details']['records'][$thisRecord]['specialism10'] = cleanTextData($_POST['afcs/about-you/service-details/service-trade/specialism10']);
    }

    if (empty($_POST['afcs/about-you/service-details/service-trade/specialism10Duration'])) {
    } else {
        $data['sections']['service-details']['records'][$thisRecord]['specialism10Duration'] = cleanTextData($_POST['afcs/about-you/service-details/service-trade/specialism10Duration']);
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

$page_title = 'What trades or professions have you had in service?';

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
                                <h1 class="govuk-heading-xl">What trades or professions have you had in service?</h1>
 </legend>
                                <p class="govuk-body">For example, navigator, infantry soldier, electrician, pilot.</p>

<div class="govuk-warning-text">
  <span class="govuk-warning-text__icon" aria-hidden="true">!</span>
  <strong class="govuk-warning-text__text">
    <span class="govuk-warning-text__assistive">Warning</span>
    Do not tell us about Special Forces trades or professions.
  </strong>
</div>

<p class="govuk-body">List all the trades or professions you have had (except Special Forces) in this period of service.</p>

                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group {{$specialism['error']}} ">
    <label class="govuk-label" for="afcs/about-you/service-details/service-trade/service-trade">
        <span class="govuk-visually-hidden">Service trade</span>
    </label>


    <div class="govuk-grid-row">
        <div class="govuk-grid-column-one-half">
            <label class="govuk-label"
                Trade or profession
            </label>
        </div>
        <div class="govuk-grid-column-one-half">
            <label class="govuk-label">
                How long for, for example 6 months?
            </label>
        </div>
    </div>


    <div class="govuk-grid-row govuk-!-margin-bottom-2">
        <div class="govuk-grid-column-one-half">
            @php echo $specialism1['errorLabel']; @endphp
            <input class="govuk-input" id="afcs/about-you/service-details/service-trade/specialism1" name="afcs/about-you/service-details/service-trade/specialism1" type="text" value="{{$specialism1['data']}}"  >
        </div>
        <div class="govuk-grid-column-one-half">
            @php echo $specialism1Duration['errorLabel']; @endphp
           <input class="govuk-input govuk-!-width-two-thirds" id="afcs/about-you/service-details/service-trade/specialism1Duration" name="afcs/about-you/service-details/service-trade/specialism1Duration" type="text" value="{{$specialism1Duration['data']}}"  >
        </div>
    </div>

    <div class="govuk-grid-row govuk-!-margin-bottom-2">
        <div class="govuk-grid-column-one-half">
            @php echo $specialism2['errorLabel']; @endphp
            <input class="govuk-input" id="afcs/about-you/service-details/service-trade/specialism2" name="afcs/about-you/service-details/service-trade/specialism2" type="text" value="{{$specialism2['data']}}"  >
        </div>
        <div class="govuk-grid-column-one-half">
            @php echo $specialism2Duration['errorLabel']; @endphp
           <input class="govuk-input govuk-!-width-two-thirds" id="afcs/about-you/service-details/service-trade/specialism2Duration" name="afcs/about-you/service-details/service-trade/specialism2Duration" type="text" value="{{$specialism2Duration['data']}}"  >
        </div>
    </div>

    <div class="govuk-grid-row govuk-!-margin-bottom-2">
        <div class="govuk-grid-column-one-half">
            @php echo $specialism3['errorLabel']; @endphp
            <input class="govuk-input" id="afcs/about-you/service-details/service-trade/specialism3" name="afcs/about-you/service-details/service-trade/specialism3" type="text" value="{{$specialism3['data']}}"  >
        </div>
        <div class="govuk-grid-column-one-half">
            @php echo $specialism3Duration['errorLabel']; @endphp
           <input class="govuk-input govuk-!-width-two-thirds" id="afcs/about-you/service-details/service-trade/specialism3Duration" name="afcs/about-you/service-details/service-trade/specialism3Duration" type="text" value="{{$specialism3Duration['data']}}"  >
        </div>
    </div>

    <div class="govuk-grid-row govuk-!-margin-bottom-2">
        <div class="govuk-grid-column-one-half">
            @php echo $specialism4['errorLabel']; @endphp
            <input class="govuk-input" id="afcs/about-you/service-details/service-trade/specialism4" name="afcs/about-you/service-details/service-trade/specialism4" type="text" value="{{$specialism4['data']}}"  >
        </div>
        <div class="govuk-grid-column-one-half">
            @php echo $specialism4Duration['errorLabel']; @endphp
           <input class="govuk-input govuk-!-width-two-thirds" id="afcs/about-you/service-details/service-trade/specialism4Duration" name="afcs/about-you/service-details/service-trade/specialism4Duration" type="text" value="{{$specialism4Duration['data']}}"  >
        </div>
    </div>

    <div class="govuk-grid-row govuk-!-margin-bottom-2">
        <div class="govuk-grid-column-one-half">
            @php echo $specialism5['errorLabel']; @endphp
            <input class="govuk-input" id="afcs/about-you/service-details/service-trade/specialism5" name="afcs/about-you/service-details/service-trade/specialism5" type="text" value="{{$specialism5['data']}}"  >
        </div>
        <div class="govuk-grid-column-one-half">
            @php echo $specialism5Duration['errorLabel']; @endphp
           <input class="govuk-input govuk-!-width-two-thirds" id="afcs/about-you/service-details/service-trade/specialism5Duration" name="afcs/about-you/service-details/service-trade/specialism5Duration" type="text" value="{{$specialism5Duration['data']}}"  >
        </div>
    </div>

    <div class="govuk-grid-row govuk-!-margin-bottom-2">
        <div class="govuk-grid-column-one-half">
            @php echo $specialism6['errorLabel']; @endphp
            <input class="govuk-input" id="afcs/about-you/service-details/service-trade/specialism6" name="afcs/about-you/service-details/service-trade/specialism6" type="text" value="{{$specialism6['data']}}"  >
        </div>
        <div class="govuk-grid-column-one-half">
            @php echo $specialism6Duration['errorLabel']; @endphp
           <input class="govuk-input govuk-!-width-two-thirds" id="afcs/about-you/service-details/service-trade/specialism6Duration" name="afcs/about-you/service-details/service-trade/specialism6Duration" type="text" value="{{$specialism6Duration['data']}}"  >
        </div>
    </div>

    <div class="govuk-grid-row govuk-!-margin-bottom-2">
        <div class="govuk-grid-column-one-half">
            @php echo $specialism7['errorLabel']; @endphp
            <input class="govuk-input" id="afcs/about-you/service-details/service-trade/specialism7" name="afcs/about-you/service-details/service-trade/specialism7" type="text" value="{{$specialism7['data']}}"  >
        </div>
        <div class="govuk-grid-column-one-half">
            @php echo $specialism7Duration['errorLabel']; @endphp
           <input class="govuk-input govuk-!-width-two-thirds" id="afcs/about-you/service-details/service-trade/specialism7Duration" name="afcs/about-you/service-details/service-trade/specialism7Duration" type="text" value="{{$specialism7Duration['data']}}"  >
        </div>
    </div>

    <div class="govuk-grid-row govuk-!-margin-bottom-2">
        <div class="govuk-grid-column-one-half">
            @php echo $specialism8['errorLabel']; @endphp
            <input class="govuk-input" id="afcs/about-you/service-details/service-trade/specialism8" name="afcs/about-you/service-details/service-trade/specialism8" type="text" value="{{$specialism8['data']}}"  >
        </div>
        <div class="govuk-grid-column-one-half">
            @php echo $specialism8Duration['errorLabel']; @endphp
           <input class="govuk-input govuk-!-width-two-thirds" id="afcs/about-you/service-details/service-trade/specialism8Duration" name="afcs/about-you/service-details/service-trade/specialism8Duration" type="text" value="{{$specialism8Duration['data']}}"  >
        </div>
    </div>

    <div class="govuk-grid-row govuk-!-margin-bottom-2">
        <div class="govuk-grid-column-one-half">
            @php echo $specialism9['errorLabel']; @endphp
            <input class="govuk-input" id="afcs/about-you/service-details/service-trade/specialism9" name="afcs/about-you/service-details/service-trade/specialism9" type="text" value="{{$specialism9['data']}}"  >
        </div>
        <div class="govuk-grid-column-one-half">
            @php echo $specialism9Duration['errorLabel']; @endphp
           <input class="govuk-input govuk-!-width-two-thirds" id="afcs/about-you/service-details/service-trade/specialism9Duration" name="afcs/about-you/service-details/service-trade/specialism9Duration" type="text" value="{{$specialism9Duration['data']}}"  >
        </div>
    </div>

    <div class="govuk-grid-row govuk-!-margin-bottom-2">
        <div class="govuk-grid-column-one-half">
            @php echo $specialism10['errorLabel']; @endphp
            <input class="govuk-input" id="afcs/about-you/service-details/service-trade/specialism10" name="afcs/about-you/service-details/service-trade/specialism10" type="text" value="{{$specialism10['data']}}"  >
        </div>
        <div class="govuk-grid-column-one-half">
            @php echo $specialism10Duration['errorLabel']; @endphp
           <input class="govuk-input govuk-!-width-two-thirds" id="afcs/about-you/service-details/service-trade/specialism10Duration" name="afcs/about-you/service-details/service-trade/specialism10Duration" type="text" value="{{$specialism10Duration['data']}}"  >
        </div>
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
