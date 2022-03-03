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





@endphp


@include('framework.header')



    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Uploading supporting documents</h1>
                                <p class="govuk-body">If you have documents or evidence <strong>already in your possession</strong> that you would like us to see, you can upload copies here.</p>
                                <div class="govuk-inset-text">
  Do not delay your claim by getting evidence you do not already have. We will make our own enquiries to get the information we need.
</div>

<h2 class="govuk-heading-l">What documents can be useful</h2>

<details class="govuk-details" data-module="govuk-details">
  <summary class="govuk-details__summary">
    <span class="govuk-details__summary-text">
      Letters and reports from people who have treated you
    </span>
  </summary>
  <div class="govuk-details__text">
   For example GPs, hospital consultants or other health professionals.<br /><br />
We only need documents that describe treatment or diagnosis

  </div>
</details>

<details class="govuk-details" data-module="govuk-details">
  <summary class="govuk-details__summary">
    <span class="govuk-details__summary-text">
      Service documents
    </span>
  </summary>
  <div class="govuk-details__text">
Only if they directly support your claim, for example accident report forms, hurt certificates, incident reports.

  </div>
</details>

<details class="govuk-details" data-module="govuk-details">
  <summary class="govuk-details__summary">
    <span class="govuk-details__summary-text">
      Letters about other compensation received
    </span>
  </summary>
  <div class="govuk-details__text">
including criminal injuries compensation and civil negligence compensation.
  </div>
</details>

<details class="govuk-details" data-module="govuk-details">
  <summary class="govuk-details__summary">
    <span class="govuk-details__summary-text">
      Documents showing legal authority to act on behalf of others
    </span>
  </summary>
  <div class="govuk-details__text">
Court of protection, Power of attorney, appointeeship

  </div>
</details>

<details class="govuk-details" data-module="govuk-details">
  <summary class="govuk-details__summary">
    <span class="govuk-details__summary-text">
      Medical test results
    </span>
  </summary>
  <div class="govuk-details__text">
including reports from scans, audiology and x-rays (but not the x-rays themselves).
<br /><br />
We do not need images of your condition/illness.

  </div>
</details>


<h2 class="govuk-heading-l">We do not need to see</h2>

<ul class="govuk-list govuk-list--bullet">
    <li>Appointment letters.</li>
    <li>Copies of in-service medical records.</li>
</ul>
<br /><br />



                        <a class="govuk-button govuk-!-margin-bottom-2" href="/applicant/supporting-documents/upload">
                                            Upload a document
                                        </a>
<br /><br />

                                                                            <form method="post" enctype="multipart/form-data" novalidate>
    @csrf
        <div class="govuk-form-group">
            <button class="govuk-button govuk-!-margin-right-2" data-module="govuk-button" name="no-upload" value="no-upload">Continue without uploading a document</button>
        </div>
    </form>


<h2>I prefer to send copies in the post</h2>
<p class="govuk-body"> If you have lots of documents or would prefer to send document by post, please send copies (not originals) to:</p>
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
