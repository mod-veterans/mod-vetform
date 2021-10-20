@php


if (!empty($_POST)) {



            if ($_POST['/representative/representative-selection/nominated-representative'] == 'Yes') {

                header("Location: /applicant/nominate-a-representative-details");
                die();


            } else {


                header("Location: /applicant/nominate-a-representative-no-check-answers");
                die();

            }


}

@endphp




@include('framework.header')



    <a href="#" onclick="window.history.back()" class="govuk-back-link">Back</a>

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Do you want to nominate a representative?</h1>
                                <p class="govuk-body">If someone is helping you make your claim, for example a charity welfare officer
 or a solicitor, you can nominate them as a representative. They can then ask us how your claim is progressing. They will also receive copies of
 our enquiries and decision letters.</p>
                       <p class="govuk-body">We can only give them this information if we have your written agreement.</p>

                       <p class="govuk-body"><strong>Please note</strong> the decision notification contains
                       personal information. This may include details of your bank or building society account and any
                       medical conditions that we have considered as part of your claim. It may also show how we have
                       calculated your award.</p>
                       <p class="govuk-body">You can nominate one representative here. You can add further
                       representatives or change their details by writing to us at any time.</p>

            <form method="post" enctype="multipart/form-data" novalidate>
            @csrf
                                                    <div class="govuk-form-group ">
    <a id="/representative/representative-selection/nominated-representative"></a>
    <fieldset class="govuk-fieldset">
                                    <legend
                    class="govuk-fieldset__legend govuk-fieldset__legend--m govuk-visually-hidden">
                    <h1 class
                    ="govuk-fieldset__heading">Would you like to nominate a representative? (required)</h1>
                </legend>
                                            <div
            class="govuk-radios govuk-radios--inline"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/representative/representative-selection/nominated-representative-yes" name="/representative/representative-selection/nominated-representative" type="radio"
           value="Yes"            >
    <label class="govuk-label govuk-radios__label" for="/representative/representative-selection/nominated-representative-yes">Yes</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/representative/representative-selection/nominated-representative-no" name="/representative/representative-selection/nominated-representative" type="radio"
           value="No"            >
    <label class="govuk-label govuk-radios__label" for="/representative/representative-selection/nominated-representative-no">No</label>
</div>

                    </div>
    </fieldset>
</div>



                <div class="govuk-form-group">
   <button class="govuk-button govuk-!-margin-right-2" data-module="govuk-button">Save and continue</button>
            <br><a href="https://modvets-dev2.london.cloudapps.digital/cancel" class="govuk-link"
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
