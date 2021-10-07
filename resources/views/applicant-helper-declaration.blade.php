@php


if (!empty($_POST)) {

header("Location: /applicant/helper/check-answers");
die();

}

@endphp




@include('framework.header')


    <a href="#" onclick="window.history.back()" class="govuk-back-link">Back</a>

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Helping someone make a claim.</h1>
                                <p class="govuk-body">Thank you for telling us you are helping someone make a claim using this service.</p>
                              <p class="govuk-body">Please be aware that unless you have legal authority to do so, you cannot submit a claim on behalf of another person.</p>
                              <p class="govuk-body">You must therefore ensure that before the claim is submitted, the person named on this application:</p>
                              <ul class="govuk-list govuk-list--bullet">
                                <li>Is satisfied all questions have been answered correctly, to the best of their knowledge and understanding.</li>
                                <li>Is clear that they are the named person making the application.</li>
                                <li>Is clear they are agreeing to the legal declaration in the last section.</li>
                              </ul>
                              <p class="govuk-body">If the person named on this application also wishes to make you a nominated representative, so that we can send you a copy of letters we send them about their claim, this can be done in the next section.</p>


            <form method="post" enctype="multipart/form-data" novalidate >
            @csrf
                                                    <div class="govuk-checkboxes__item">
            <input id="6152bb567a80e--default" name="/applicant/helper-declaration/helper-declaration-agreed" type="hidden" value="No">
        <input class="govuk-checkboxes__input" id="6152bb567a80e" name="/applicant/helper-declaration/helper-declaration-agreed" type="checkbox"
           value="Yes"            >
    <label class="govuk-label govuk-checkboxes__label" for="6152bb567a80e">I confirm I have read and understood the above requirements.</label>
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
