@php


if (!empty($_POST)) {

        if (!empty($_POST)) {
        header("Location: /applicant/supporting-documents/manage");
        die();
        }

}





@endphp




@include('framework.header')


    <a href="#" onclick="window.history.back()" class="govuk-back-link">Back</a>

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Supporting documents</h1>
                                <p class="govuk-body">You can upload PDF, PNG, JPG or DOCX file to support your application</p>
    <p class="govuk-body">Your file must be no larger than 5Mb</p>


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
