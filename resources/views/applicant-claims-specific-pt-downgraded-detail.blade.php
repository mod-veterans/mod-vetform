@include('framework.functions')
@php

//error handling setup
$errorMessage = '';
$errors = 'N';
$errorsList = array();
$count = '';
//set fields
$frommedical = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$tomedical = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$multiple = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


    $userID = $_SESSION['vets-user'];
    $data = getData($userID);


//this gets teh current record ID to edit and sets it for reference
if (empty($_GET['claimrecord'])) {

    if (empty($data['settings']['claim-record-num'])) {
        header("Location: /applicant/claims");
        die();
    } else {
        $thisRecord = $data['settings']['claim-record-num'];
    }

} else {
    $thisRecord = cleanRecordID($_GET['claimrecord']);
    $data['settings']['claim-record-num'] = $thisRecord;
}





if (empty($_POST)) {
    //load the data if set
    if (!empty($data['sections']['claims']['records'][$thisRecord]['specific']['pt']['medical-categories'])) {
        $frommedical['data'] = @$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['medical-categories']['frommedical'];
        $tomedical['data'] = @$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['medical-categories']['tomedical'];
        $multiple['data'] = @$data['sections']['claims']['records'][$thisRecord]['specific']['pt']['medical-categories']['multiple'];

        if ($multiple['data'] == 'Yes') {
            $multiplechk = ' checked';
        }


    }
} else {

}


if (!empty($_POST)) {


    //set the entered field names


    if (!empty($_POST['/claim-details/specific/downgraded/from-medical'])) {

        $data['sections']['claims']['records'][$thisRecord]['specific']['pt']['medical-categories']['frommedical'] = cleanTextData($_POST['/claim-details/specific/downgraded/from-medical']);


    } else {

         $data['sections']['claims']['records'][$thisRecord]['specific']['pt']['medical-categories']['frommedical'] = '';
        if   (empty($_POST['/claim-details/claim-illness-date/date-of-condition-estimated'])) {

        $errors = 'Y';
        $errorsList[] = '<a href="#/claim-details/specific/downgraded/from-medical">Tell us what medical category you were downgraded from</a>';
        $frommedical['error'] = 'govuk-form-group--error';
        $frommedical['errorLabel'] =
        '<span id="/claim-details/specific/downgraded/from-medical-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Tell us what medical category you were downgraded from
         </span>';
        }

    }



    if (!empty($_POST['/claim-details/specific/downgraded/to-medical'])) {

        $data['sections']['claims']['records'][$thisRecord]['specific']['pt']['medical-categories']['tomedical'] = cleanTextData($_POST['/claim-details/specific/downgraded/to-medical']);


    } else {

 $data['sections']['claims']['records'][$thisRecord]['specific']['pt']['medical-categories']['tomedical'] = '';
        if   (empty($_POST['/claim-details/claim-illness-date/date-of-condition-estimated'])) {


        $errors = 'Y';
        $errorsList[] = '<a href="#/claim-details/specific/downgraded/to-medical">Tell us what medical category you were downgraded to</a>';
        $tomedical['error'] = 'govuk-form-group--error';
        $tomedical['errorLabel'] =
        '<span id="/claim-details/specific/downgraded/to-medical-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Tell us what medical category you were downgraded to
         </span>';

        }

    }


    if ( (!empty($_POST['/claim-details/claim-illness-date/date-of-condition-estimated'])) && ($_POST['/claim-details/claim-illness-date/date-of-condition-estimated'] == 'Yes') ) {

        $data['sections']['claims']['records'][$thisRecord]['specific']['pt']['medical-categories']['multiple'] = 'Yes';
        $multiplechk = ' checked';
    } else {
        $data['sections']['claims']['records'][$thisRecord]['specific']['pt']['medical-categories']['multiple'] = '';
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
        $theURL = '/applicant/claims/specific/pt/why-related';

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
                                <h1 class="govuk-heading-xl">What medical categories were you downgraded from/to?</h1>
    </legend>
                                <p class="govuk-body">For example P1, light duties.  If you cannot remember, enter ‘I do not know’.</p>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                      <div class="govuk-form-group ">

                                                    <div class="govuk-form-group {{$frommedical['error'] ?? ''}} ">
@php echo $frommedical['errorLabel']; @endphp
    <label class="govuk-label" for="/claim-details/specific/downgraded/from-medical">
        From medical category
    </label>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/claim-details/specific/downgraded/from-medical" name="/claim-details/specific/downgraded/from-medical" type="text"
                   value="{{$frommedical['data']}}" >
</div>

                                                    <div class="govuk-form-group {{$tomedical['error'] ?? ''}}  ">
@php echo $tomedical['errorLabel']; @endphp
    <label class="govuk-label" for="/claim-details/specific/downgraded/to-medical">
        To medical category
    </label>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/claim-details/specific/downgraded/to-medical" name="/claim-details/specific/downgraded/to-medical" type="text"
                   value="{{$tomedical['data']}}" >
</div>



        <br />
<div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="6166806a32c4a" name="/claim-details/claim-illness-date/date-of-condition-estimated" type="checkbox"
           value="Yes"   {{$multiplechk ?? ''}}         >
    <label class="govuk-label govuk-checkboxes__label" for="6166806a32c4a">I was downgraded and upgraded more than once within different categories.</label>
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
