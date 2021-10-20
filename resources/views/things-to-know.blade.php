@php

if (!empty($_POST)) {

header("Location: /tasklist");
die();

}

@endphp

@include('framework.header')

    <a href="#" onclick="window.history.back()" class="govuk-back-link">Back</a>

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Things you need to know before you start</h1>
                               <h2>About this online claim service</h2>
                               <ul>
<li>There are 13 sections to complete or read before submitting your application.  Some sections are shorter than others and it will take around 45 minutes to one hour to complete all of them.</li>

<li>We recommend you complete each section in order.</li>

<li>Once you have completed a section, it will show as ‘complete’.  You can still re-enter a completed section and make changes if you want to, providing you have not submitted your application.</li>

<li>If you are claiming for a condition related to exposure to asbestos, please read the <a href="https://www.gov.uk/guidance/help-for-veterans-diagnosed-with-diffuse-mesothelioma#how-to-claim" target="_New">guidance on GOV.UK</a> first.</li>

<li>You can exit and return to a partially completed application within 3 months from when you started it by using the ‘save and return later’ function.  You must have completed all sections up to ‘personal details’ before you leave.  If you have not completed all sections up to ‘personal details’, your information will not be saved and you will have to start again.</li>

<li>If you have documents or evidence you wish to attach to your application, you can upload copies of these in the ‘supporting documents’ section.</li>

<li>Please do not delay completing your application to gather information.  Some payments are only made from the date your claim is submitted.  Also, there are <a href="https://www.gov.uk/guidance/armed-forces-compensation-scheme-afcs#important-information" target="_New">7-year time limits</a> for some armed forces compensation scheme claims. </li>
</ul>
<h2>Answering the questions</h2>
<ul>
<li>Please answer all questions to the best of your recollection.  If you can’t remember, you can leave blank any sections not marked “required”. </li>

<li>If you can’t remember exact dates, please estimate just a year.</li>
<li>Some sections, including ‘service details’ and ‘claim details’, allow you to add more than one set of answers to your application.  For example, you can use this to tells us about more than one period of service in the armed forces or add another claim for a different illness or injury. </li>

<li>Please do not include details of military operations in your answers.</li>
<li>You do not need to gather any information you do not already have.  Veterans UK will make all the enquiries needed to assess your claim.</li>
</ul>
<h2>After you apply</h2>
<ul>
<li>Your claim will automatically be sent to Veterans UK securely and your details will be deleted from this claim service. You will not be able to access your completed application again after it is submitted.</li>

<li>You will receive an acknowledgement to the email address you have entered in ‘personal details’ with information about how your claim will be assessed. </li>

<li>We are sorry but we cannot send a copy of your application to you by email.  This is because we have to protect your personal data and personal email addresses are often insecure. Please contact Veterans UK if you would like a copy of your application to be sent via the post, quoting your national insurance number.</li>
</ul>











            <form method="post" enctype="multipart/form-data" novalidate>
            @csrf
                                                    <div class="govuk-form-group ">
    <input name="/things-to-know/overview/check-before" type="hidden" value="1">
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
