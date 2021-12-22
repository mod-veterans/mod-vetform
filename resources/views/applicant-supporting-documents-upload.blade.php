@include('framework.functions')
@php

    $userID = $_SESSION['vets-user'];
    $data = getData($userID);


$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


    $fileupload = array('data'=>'', 'error'=>'', 'errorLabel'=>'');



if (!empty($_GET)) {

    if ( (!empty($_GET['no-upload'])) && ($_GET['no-upload'] == 'Y') ) {

    $data['sections']['supporting-documents']['completed'] = TRUE;
    storeData($userID,$data);
    header("Location: /tasklist");
    die();

    }
}


if (!empty($_FILES)) {


        $filearray = $_FILES['/documents/document/file'];
        $filename = $filearray['name'];
        $filetype = $filearray['type'];
        $filesize = ($filearray['size'] / 1000000);
        $filepath = $filearray['tmp_name'];


        //validation

        if ($filesize > 5) {
            $errors = 'Y';
            $errorsList[] = '<a href="#/documents/document/file">Your file size is more than 5mb</a>';
            $fileupload['error'] = 'govuk-form-group--error';
            $fileupload['errorLabel'] =
            '<span id="/documents/document/file-error" class="govuk-error-message">
                <span class="govuk-visually-hidden">Error:</span> Your file size is more than 5mb
             </span>';
        }



        $allowed = array('gif', 'png', 'jpg','doc','docx','pdf','xls','xlsx','bmp','jpeg');
        $filename = strtolower($filename);
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!in_array($ext, $allowed)) {
            $errors = 'Y';
            $errorsList[] = '<a href="#/documents/document/file">You can only upload the following file types: gif, png, jpg, doc, docx, pdf, xls, xlsx, bmp, jpeg</a>';
            $fileupload['error'] = 'govuk-form-group--error';
            $fileupload['errorLabel'] =
            '<span id="/documents/document/file-error" class="govuk-error-message">
                <span class="govuk-visually-hidden">Error:</span> You can only upload the following file types: gif, png, jpg, doc, docx, pdf, xls, xlsx, bmp, jpeg
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



        //THIS IS WHERE AWS HOOK WILL GO


        //END AWS

        //put file into array

        //get a random hash
        $hash = genHash(7);

        $data['sections']['supporting-documents']['files'][$hash]['name'] = $filename;
        $data['sections']['supporting-documents']['files'][$hash]['type'] = $filetype;
        $data['sections']['supporting-documents']['files'][$hash]['path'] = $filepath;
        $data['sections']['supporting-documents']['files'][$hash]['size'] = $filesize;






        //store our changes

        storeData($userID,$data);

        $theURL = '/applicant/supporting-documents/manage';
        if (!empty($_GET['return'])) {
            if ($rURL = cleanURL($_GET['return'])) {
                $theURL = $rURL;
            }
    }

    header("Location: ".$theURL);
    die();

}





    ///applicant/supporting-documents-upload/confirm-check

}

@endphp




@include('framework.header')


    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
 @php echo $errorMessage; @endphp

                                 <h1 class="govuk-heading-xl">Upload a document</h1>
                                <p class="govuk-body" id="/documents/document/file-hint">You can upload PDF, PNG, JPG or DOCX files.  Apple users - please do not upload .heic image files.</p>
    <p class="govuk-body">Your file must be no larger than 5Mb</p>

    <p class="govuk-body">Please upload one file or document at a time.</p>

<p class="govuk-body"><strong>Note for those serving or having served in Special Forces:</strong>  You must seek EPAW approvals before uploading any documents.</p>

            <form method="post" enctype="multipart/form-data">
            @csrf
<div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="61668e5b351ab" name="/applicant/supporting-documents-upload/confirm-check" type="checkbox"
           value="None of the above"  required>
    <label class="govuk-label govuk-checkboxes__label" for="61668e5b351ab">I have checked the documents/file are the ones I intend to upload.  The documents/files I am uploading are intended solely to support my application and are in accordance with this service’s <a href="#">terms and conditions of use</a>.</label>
</div>
                    </div>
    </fieldset>
</div>


                                                    <div class="govuk-form-group {{$fileupload['error']}} ">
    <label class="govuk-label" for="/documents/document/file">
        <span class="govuk-visually-hidden">Upload file</span>
    </label>
    @php echo $fileupload['errorLabel']; @endphp
            <input class="govuk-file-upload" id="/documents/document/file"
           name="/documents/document/file" type="file"
           aria-describedby="/documents/document/file-hint" required>
</div>



                <div class="govuk-form-group">
   <button class="govuk-button govuk-!-margin-right-2" data-module="govuk-button">Save and continue</button>
<br />

@php
if (
(!empty($data['sections']['supporting-documents']['files']))
&& (count($data['sections']['supporting-documents']['files']) > 0)
)

 {
@endphp

 Or<br /> <br />


        <div class="govuk-form-group">
            <a href="/applicant/supporting-documents/manage" class="govuk-button govuk-!-margin-right-2" value="no-upload">Back to uploaded documents</a>
        </div>


@php
} else {
@endphp



 Or<br /> <br />


        <div class="govuk-form-group">
            <a href="/applicant/supporting-documents/upload?no-upload=Y" class="govuk-button govuk-!-margin-right-2" value="no-upload">Continue without uploading a document</a>
        </div>

@php
}
@endphp






                                        <br />

            <br><a href="/cancel" class="govuk-link"
           data-module="govuk-button">
            Cancel application
        </a>

    </div>
    </div>
            </form>
        </div>
    </main>
</div>






@include('framework.footer')


