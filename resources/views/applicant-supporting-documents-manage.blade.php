@include('framework.functions')
@php

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
<form action="/applicant/supporting-documents/comments">
<div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="61668e5b351ab" name="/applicant/supporting-documents-upload/confirm-check" type="checkbox"
           value="None of the above"  required>
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
