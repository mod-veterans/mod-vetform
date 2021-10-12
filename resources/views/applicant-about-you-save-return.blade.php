@php


if (!empty($_POST)) {

header("Location: /applicant/about-you/check-answers");
die();

}

@endphp




@include('framework.header')


    <a href="#" onclick="window.history.back()" class="govuk-back-link">Back</a>

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Save and Return Later</h1>
                                <p class="govuk-body">As you have now completed the Personal Details section, you can now save
                        your progress and return to a part-completed application within 3 months.</p>
                        <p class="govuk-body">Your progress will be saved at the end of each page when you click on
                        "Save and continue". To exit, simply navigate away from your claim or close your browser.</p>

                        <h1 class="govuk-heading-m">To return to an application already started</h1>
                        <p class="govuk-body">To access your part-completed application after exiting, simply click on
                        "Return to an application already started" on the Start Page (under "Start Now").
                        Please note you will need to enter your:</p>
                        <ul>
                            <li>Surname</li>
                            <li>Email address</li>
                            <li>National Insurance Number</li>
                        </ul>
                        <p class="govuk-body">You will also need to have your mobile phone or access to the email
                        address you have entered as we will send an access code to you and ask you to enter that on screen.</p>

                        <h1 class="govuk-heading-m">Fully completed applications</h1>
                        <p class="govuk-body">If you fully complete your application and press "submit", your claim will
                        be sent to Veterans UK and you will no longer have access to it. You will need to contact us if
                        you wish to make any changes</p>


            <form method="post" enctype="multipart/form-data" novalidate >
            @csrf
                                                    <div class="govuk-form-group ">
    <input name="afcs/about-you/personal-details/save-and-return/save-and-return" type="hidden" value="1">
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
