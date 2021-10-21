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
                                <h1 class="govuk-heading-xl">Do you want to tell us anything about your documents?</h1>
                                <p class="govuk-body">If you wish to tell us anything about the files or documents you have uploaded, please use the space below.  If you have chosen to send us any images of your condition/illness for any reason, please tell us here. (optional)  </p>

            <form method="post" enctype="multipart/form-data" novalidate>
            @csrf


                                    <div class="govuk-form-group ">
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/other-compensation/claim-solicitor-details/claim-solicitor__postcode" name="/other-compensation/claim-solicitor-details/claim-solicitor__postcode" type="text"
         autocomplete="postal-code"
                  value=""
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


