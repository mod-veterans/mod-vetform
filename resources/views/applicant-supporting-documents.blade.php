@include('framework.functions')
@php

    $userID = $_SESSION['vets-user'];
    $data = getData($userID);

if
(
(!empty($data['sections']['supporting-documents']['files'])) &&
(count($data['sections']['supporting-documents']['files']) >= 1)
)
 {

    header("Location: /applicant/supporting-documents/manage");
    die();
}







if (!empty($_POST)) {


    if ( (!empty($_POST['no-upload'])) && ($_POST['no-upload'] == 'no-upload') ) {
    $userID = $_SESSION['vets-user'];
    $data = getData($userID);
    $data['sections']['supporting-documents']['completed'] = TRUE;
    storeData($userID,$data);
    header("Location: /tasklist");
    die();

    }

 }



$page_title = 'Uploading supporting documents';

@endphp


@include('framework.header')



    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Uploading supporting documents</h1>
                                <p class="govuk-body">If you have documents or evidence already in your possession you would like us to see, you can upload images of them here.</p>
                                <div class="govuk-inset-text">
  Do not delay your claim by getting evidence you do not already have.
</div>

<h2 class="govuk-heading-l">What documents can be useful:</h2>


<ul class="govuk-list govuk-list--bullet">
    <li>letters and reports from people who have treated you, but only if they describe treatment or diagnosis</li>
    <li>service documents, but only if they directly support your claim, for example accident report forms, hurt certificates, incident reports</li>
    <li>letters about other compensation received, including criminal injuries compensation and civil negligence compensation</li>
    <li>documents showing legal authority to act on behalf of others</li>
    <li>medical test results, including reports from scans, audiology and x-rays, but not the x-rays themselves</li>
</ul>




<h2 class="govuk-heading-l">We do not need to see:</h2>

<ul class="govuk-list govuk-list--bullet">
    <li>appointment letters</li>
    <li>copies of in-service medical records</li>
    <li>images of your condition/illness</li>
    <li>other people’s personal data.  Contact us after you make your claim if you think we need to see information belonging to other people</li>
</ul>


<br /><br />



                        <a class="govuk-button govuk-button--secondary govuk-!-margin-bottom-2" href="/applicant/supporting-documents/upload">
                                            Upload a document
                                        </a>
<br /><br />

                                                                            <form method="post" enctype="multipart/form-data" novalidate>
    @csrf
        <div class="govuk-form-group">
            <button class="govuk-button govuk-!-margin-right-2" data-module="govuk-button" name="no-upload" value="no-upload">Continue without uploading a document</button>
@include('framework.bottombuttons')
        </div>
    </form>


<h2>Sending copies in the post</h2>
<p class="govuk-body"> If you have lots of documents or would prefer to send documents by post, send copies (not originals) to:</p>
                                                                                                        <p class="govuk-address govuk-!-font-size-19 govuk-!-margin-bottom-4">
                                                            Veterans UK<br>
                                                            FREEPOST NAT18006<br />
                                                            Norcross<br />
                                                            Thornton Cleveleys<br />
                                                            FY5 3ZZ<br />
                                                            United Kingdom

                                                    </p>

 <div class="govuk-inset-text">
Please include a covering letter and write the name and National Insurance Number of the person applying on every document.
 You do not need a stamp.
</div>








            </div>
        </div>
    </main>
</div>




@include('framework.footer')
