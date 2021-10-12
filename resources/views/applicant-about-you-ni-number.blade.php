@php


if (!empty($_POST)) {

header("Location: /applicant/about-you/pension-scheme");
die();

}

@endphp




@include('framework.header')


    <a href="#" onclick="window.history.back()" class="govuk-back-link">Back</a>

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">What is your National Insurance number?</h1>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="afcs/about-you/personal-details/national-insurance/ni-number">
        <span class="govuk-visually-hidden">NI Number</span>
    </label>
    <div id="afcs/about-you/personal-details/national-insurance/ni-number-hint" class="govuk-hint"> It’s on your National Insurance card, benefit letter, payslip or P60. For example, ‘QQ 12 34 56 C’.</div>
        <input
        class="govuk-input govuk-!-width-two-thirds "
        id="afcs/about-you/personal-details/national-insurance/ni-number" name="afcs/about-you/personal-details/national-insurance/ni-number" type="text"
                   value=""
                aria-describedby="afcs/about-you/personal-details/national-insurance/ni-number-hint"
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
