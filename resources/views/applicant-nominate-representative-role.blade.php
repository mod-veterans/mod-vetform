@php


if (!empty($_POST)) {



                header("Location: /applicant/nominate-a-representative-yes-check-answers");
                die();


}

@endphp




@include('framework.header')


    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">What is your representative&#039;s role?</h1>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group ">
    <a id="/representative/representative-role/representative-role"></a>
    <fieldset class="govuk-fieldset">
                                    <legend
                    class="govuk-fieldset__legend govuk-fieldset__legend--m govuk-visually-hidden">
                    <h1 class
                    ="govuk-fieldset__heading">What is your representative&#039;s role? (required)</h1>
                </legend>
                                            <div
            class="govuk-radios"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/representative/representative-role/representative-role-veterans-u-k-welfare-manager" name="/representative/representative-role/representative-role" type="radio"
           value="Veterans UK welfare manager"            >
    <label class="govuk-label govuk-radios__label" for="/representative/representative-role/representative-role-veterans-u-k-welfare-manager">Veterans UK welfare manager</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/representative/representative-role/representative-role-charity-welfare-manager" name="/representative/representative-role/representative-role" type="radio"
           value="Charity welfare manager"            >
    <label class="govuk-label govuk-radios__label" for="/representative/representative-role/representative-role-charity-welfare-manager">Charity welfare manager</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/representative/representative-role/representative-role-solicitor" name="/representative/representative-role/representative-role" type="radio"
           value="Solicitor"            >
    <label class="govuk-label govuk-radios__label" for="/representative/representative-role/representative-role-solicitor">Solicitor</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/representative/representative-role/representative-role-friend-or-relative" name="/representative/representative-role/representative-role" type="radio"
           value="Friend or relative"            >
    <label class="govuk-label govuk-radios__label" for="/representative/representative-role/representative-role-friend-or-relative">Friend or relative</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/representative/representative-role/representative-role-other" name="/representative/representative-role/representative-role" type="radio"
           value="Other"            >
    <label class="govuk-label govuk-radios__label" for="/representative/representative-role/representative-role-other">Other</label>
</div>

                    </div>
    </fieldset>
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
