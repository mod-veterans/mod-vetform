@php


if (!empty($_POST)) {



            header("Location: /applicant/legal-authority/check-answers");
            die();


}

@endphp




@include('framework.header')


    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Applying for someone else</h1>

<div class="govuk-warning-text">
  <span class="govuk-warning-text__icon" aria-hidden="true">!</span>
  <strong class="govuk-warning-text__text">
    <span class="govuk-warning-text__assistive">Warning</span>
We can only consider a claim made for someone else if you send us a copy of the authority to act for them.
  </strong>
</div>




<h2>Completing the rest of this application</h2>

<p class="govuk-body">Use the details of the person with the injury, illness or disability when answering questions to follow. For example, in answer to ‘What is your name?’ you should enter the details of the person you are acting for.</p>

<div class="govuk-inset-text">
You should enter the email and telephone number that you want Veterans UK to use to contact you at.
</div>





<h2>Confirming your authority to claim</h2>
<p class="govuk-body">If you have not told us about an LPA Access Code, upload confirmation of the authority you have, for example the letter giving you Power of Attorney, within the ‘Supporting Documents’ section later. You can send us a copy in the post if you prefer.</p>







            <form method="post" enctype="multipart/form-data" novalidate>
            @csrf

                <div class="govuk-form-group">
   <button class="govuk-button govuk-!-margin-right-2" data-module="govuk-button">Save and continue</button>
@include('framework.bottombuttons')

    </div>
            </form>
            </div>
        </div>
    </main>
</div>



@include('framework.footer')
