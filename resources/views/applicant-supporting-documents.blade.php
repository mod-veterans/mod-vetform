@include('framework.functions')
@php

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





@endphp


@include('framework.header')



    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Uploading supporting documents</h1>
                                <p class="govuk-body">
                                                                        Once submitted, your claim will be carefully assessed and we will gather any information we need to make a decision.  However, if you have supporting documents or relevant evidence <strong>already in your possession</strong>, you can upload copies here.  Documents will be held on our secure server before being passed to our office teams.   Below is a list of examples of documents that will help us make a decision.  Please only send us documents related to the circumstances of your claim or the medical condition(s) you are claiming for.</p>
                                                                                                        <ul class="govuk-list govuk-list--bullet">
                                                            <li><strong>Letters and reports from people who have treated you for the condition(s) you are claiming for.</strong> For example GPs, hospital consultants or other health professionals.  We only need documents that describe treatment or diagnosis and not, for example, appointment dates.  We do not need copies of in-service medical records.</li>
<li><strong>Service documents</strong> but only if they directly support your claim, for example accident report forms, hurt certificates, incident reports.</li>
<li><strong>Medical test results</strong> including reports from scans, audiology and x-rays (but not the x-rays themselves).  We do not require images of your condition/illness unless you have a specific reason to send these to us.</li>
<li><strong>Letters about other compensation received for the conditions</strong> you are claiming for on this application, including criminal injuries compensation and civil negligence compensation.</li>
<li><strong>Documents showing legal authority to act on behalf of others</strong>, if you are making this application on behalf of someone else.</li>

                                                    </ul>
                        <p class="govuk-body">Please note: You can either upload an existing file or take an image of a paper document and upload the image.  Please only upload one document (less than 5mb) at a time.  </p>

                        <a class="govuk-button govuk-!-margin-bottom-2" href="/applicant/supporting-documents/upload">
                                            Upload a document
                                        </a>

                        <h2>I don’t have any evidence.</h2>
                        <p class="govuk-body">Please don’t delay your claim by gathering evidence you don’t already have. We will make our own enquiries to get the information we need. </p>

                                                                <p class="govuk-body">&nbsp;</p>

                                                                            <form method="post" enctype="multipart/form-data" novalidate>
    @csrf
        <div class="govuk-form-group">
            <button class="govuk-button govuk-!-margin-right-2" data-module="govuk-button" name="no-upload" value="no-upload">Continue without uploading a document</button>
        </div>
    </form>


                                                                                                        <h2>I prefer to send copies in the post</h2>
                                                                                                                <p class="govuk-body">
                                                                        If you have too many documents to upload or prefer to send them by post, please send copies (not originals) to:
                                                                </p>
                                                                                                        <p class="govuk-address govuk-!-font-size-19 govuk-!-margin-bottom-4">
                                                            Veterans UK<br>
                                                            FREEPOST NAT18006<br />
                                                            Norcross<br />
                                                            Thornton Cleveleys<br />
                                                            FY5 3ZZ<br />
                                                            United Kingdom

                                                    </p>
                                                                                                                <p class="govuk-body">
                                                                        You do not need a stamp. Please include a covering letter quoting your name, address and National Insurance Number on it.
                                                                </p>
            </div>
        </div>
    </main>
</div>




@include('framework.footer')
