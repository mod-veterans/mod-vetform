@php


if (!empty($_POST)) {

        if (!empty($_POST)) {
        header("Location: /applicant/supporting-documents/manage");
        die();
        }

}





@endphp




@include('framework.header')


    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Upload a document</h1>
                                <p class="govuk-body">You can upload PDF, PNG, JPG or DOCX files.  Apple users - please do not upload .heic image files.</p>
    <p class="govuk-body">Your file must be no larger than 5Mb</p>

    <p class="govuk-body">Please upload one file or document at a time.</p>

<p class="govuk-body"><strong>Note for those serving or having served in Special Forces:</strong>  You must seek EPAW approvals before uploading any documents.</p>


<div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="61668e5b351ab" name="/other-benefits/receiving-other-benefits/receiving-benefits[]" type="checkbox"
           value="None of the above"            >
    <label class="govuk-label govuk-checkboxes__label" for="61668e5b351ab">I have checked the documents/file are the ones I intend to upload.  The documents/files I am uploading are intended solely to support my application and are in accordance with this service’s <a href="#">terms and conditions of use</a>.</label>
</div>
                    </div>
    </fieldset>
</div>


            <form method="post" enctype="multipart/form-data" novalidate>
            @csrf
                                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="/documents/document/file">
        <span class="govuk-visually-hidden">Upload file</span>
    </label>
            <input class="govuk-file-upload " id="/documents/document/file"
           name="/documents/document/file" type="file"
           aria-describedby="/documents/document/file-hint "
    >
</div>



                <div class="govuk-form-group">
   <button class="govuk-button govuk-!-margin-right-2" data-module="govuk-button">Save and continue</button>
<br />
 Or<br /> <br />                                                                     <a class="govuk-button govuk-!-margin-bottom-2" href="/tasklist">
                                            Continue without uploading a document
                                        </a>
                                        <br />

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


