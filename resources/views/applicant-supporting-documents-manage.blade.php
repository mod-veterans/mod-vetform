@include('framework.functions')
@php


//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$confirm = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


    $userID = $_SESSION['vets-user'];
    $data = getData($userID);

    $fileList = '';


if (!empty($_GET['deleteFile'])) {

    unset ($data['sections']['supporting-documents']['files'][$_GET['deleteFile']]);
    storeData($userID,$data);
}


if    ( (empty(count($data['sections']['supporting-documents']['files']))) || (count($data['sections']['supporting-documents']['files']) < 1) ){
    header("Location: /applicant/supporting-documents/upload");
    die();
}




if (empty($_POST)) {
    //load the data if set
    if (!empty($data['sections']['supporting-documents']['confirm-check'])) {
        $confirm['data']           = @$data['sections']['supporting-documents']['confirm-check'];
    }
} else {
//var_dump($_POST);
//die;
}






if (!empty($_POST)) {



    if (empty($_POST['/applicant/supporting-documents-upload/confirm-check'])) {
        $errors = 'Y';
        $errorsList[] = '<a href="#61668e5b351ab">Please confirm that you have checked the files are intended solely to support your claim.</a>';
        $confirm['error'] = 'govuk-form-group--error';
        $confirm['errorLabel'] =
        '<span id="61668e5b351ab-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Please confirm that you have checked the files are intended solely to support your claim.
         </span>';

    } else {

        $data['sections']['supporting-documents']['confirm-check'] = $_POST['/applicant/supporting-documents-upload/confirm-check'];

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

        $theURL = '/applicant/supporting-documents/comments';
        if (!empty($_GET['return'])) {
            if ($rURL = cleanURL($_GET['return'])) {
                $theURL = $rURL;
            }
        }

        header("Location: ".$theURL);
        die();

    }

}




if (!empty($data['sections']['supporting-documents']['files'])) {



        foreach ($data['sections']['supporting-documents']['files'] as $k => $file) {


            $fileList .='

            <div class="govuk-summary-list__row">
                        <dt class="govuk-summary-list__value">
                        '.$file['name'].'
                        </dt>
                        <dd class="govuk-summary-list__actions">
                            <a class="govuk-link govuk-warning govuk-!-margin-right-5"
                               href="/applicant/supporting-documents/manage?deleteFile='.$k.'">Delete</a>
                        </dd>
                    </div>

            ';


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
                                <h1 class="govuk-heading-xl">Uploading supporting documents</h1>
                                <dl class="govuk-summary-list">
                                    @php echo $fileList; @endphp
                            </dl>

                <div class="govuk-form-group govuk-!-margin-top-4">
            <a class="govuk-button" href="/applicant/supporting-documents/upload">
                Upload another document
            </a>
            <br>
            Or
            <br />
            <br />
<form method="post" enctype="multipart/form-data" novalidate>
@csrf
<div class="govuk-checkboxes__item">
@php echo $confirm['errorLabel']; @endphp
        <input class="govuk-checkboxes__input" id="61668e5b351ab" name="/applicant/supporting-documents-upload/confirm-check" type="checkbox"
           value="yes"  >
    <label class="govuk-label govuk-checkboxes__label" for="61668e5b351ab">I have checked the documents/file are the ones I intend to upload.  The documents/files I am uploading are intended solely to support my application and are in accordance with this service’s <a href="/upload-terms-and-conditions" target="_New">terms and conditions of use</a>.</label>
</div>
                    </div>
    </fieldset>
            <button class="govuk-button" href="">Save and continue</button>
</div>



        </div>
</form>
            </div>
        </div>
    </main>
</div>


@include('framework.footer')
