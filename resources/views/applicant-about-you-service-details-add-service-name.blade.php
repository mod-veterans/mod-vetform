@php

if (!empty($_POST)) {


    header("Location: /applicant/about-you/service-details/add-service/service-number");
    die();


}



@endphp




@include('framework.header')


    <a href="#" onclick="window.history.back()" class="govuk-back-link">Back</a>

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">What was/is your full name during this period of service?</h1>
                                <p class="govuk-body">If you used more than one name, please include all names you used.</p>
                       <p class="govuk-body">If you do not wish to disclose a name you used, please write &#8216;contact me for details&#8217; and we will get in touch with you to discuss this further if we need to.</p>

            <form method="post" enctype="multipart/form-data" novalidate >
            @csrf
                                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="afcs/about-you/service-details/service-name/name-in-service">
        <span class="govuk-visually-hidden">Enter the full name in service</span>
    </label>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="afcs/about-you/service-details/service-name/name-in-service" name="afcs/about-you/service-details/service-name/name-in-service" type="text"
         autocomplete="name"
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
