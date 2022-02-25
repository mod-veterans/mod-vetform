<?php
namespace App\Http\Controllers;
use App\Services\Application;
use App\Services\Forms\BaseForm;
use Illuminate\Support\Facades\Storage;
?>

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



        //AWS HOOK

        $rand = genHash();

        Storage::disk('s3')->put($rand.$filename, file_get_contents($filepath));

        $fileURL = Storage::disk('s3')->url($rand.$filename);


        //END AWS

        //put file into array

        //get a random hash
        $hash = genHash(7);

        $data['sections']['supporting-documents']['files'][$hash]['name'] = $filename;
        $data['sections']['supporting-documents']['files'][$hash]['type'] = $filetype;
        $data['sections']['supporting-documents']['files'][$hash]['path'] = $filepath;
        $data['sections']['supporting-documents']['files'][$hash]['size'] = $filesize;
        $data['sections']['supporting-documents']['files'][$hash]['downloadURL'] = $fileURL;


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
                                <p class="govuk-body" id="/documents/document/file-hint">You can upload an existing file or image from your device.</p>

<p class="govuk-body">You can only upload PDF, PNG, JPG or DOCX files.</p>

<div class="govuk-warning-text">
  <span class="govuk-warning-text__icon" aria-hidden="true">!</span>
  <strong class="govuk-warning-text__text">
    <span class="govuk-warning-text__assistive">Warning</span>


<ul class="govuk-list govuk-list--bullet">
<li>Your file must be no larger than 5Mb.</li>
<li>Apple users -do not upload .heic image   files.</li>
<li>Only upload one file or document at a time.</li>
</ul>


  </strong>
</div>


<details class="govuk-details" data-module="govuk-details">
  <summary class="govuk-details__summary">
    <span class="govuk-details__summary-text">
     You must read this text information if the person applying has ever served in or supported the Special Forces
    </span>
  </summary>
  <div class="govuk-details__text">
If the person named in this application is serving or has served in with United Kingdom Special Forces (UKSF), directly or in a support role, advice must be obtained from the MOD A Block Disclosure Cell before using this service. If the person named in this application has served at any time from 1996, they will be subject to the UKSF Confidentiality Contract and must apply for Express Prior Authority in Writing (EPAW) through the Disclosure Cell before submitting a claim where they may be asked to disclose details of their service with UKSF or any units directly supporting them. The Disclosure Cell can be contacted by emailing  <a href="mailto:MAB-Disclosures@mod.gov.uk">MAB-Disclosures@mod.gov.uk</a>.
  </div>
</details>


            <form method="post" enctype="multipart/form-data">
            @csrf


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


