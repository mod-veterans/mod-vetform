@include('framework.functions')
@php


//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();
$declarationchk = '';
$enquirychk = '';


//set fields
$declaration = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$enquiry = array('data'=>'', 'error'=>'', 'errorLabel'=>'');



//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);


if (empty($_POST)) {
    //load the data if set
    if (!empty($data['submission'])) {
        $declaration['data'] = @$data['submission']['declaration'];
        if ($declaration['data'] == 'Yes') {
            $declarationchk = 'checked';
        }
        $enquiry['data'] = @$data['submission']['enquiry'];
        if ($enquiry['data'] == 'Yes') {
            $enquirychk = 'checked';
        }

    }
} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {


    //set the entered field names

    if (!empty($_POST['afcs/application-submission/declaration/submission/declaration-agreed'])) {

        if ($_POST['afcs/application-submission/declaration/submission/declaration-agreed'] == 'Yes') {

            $declaration['data'] = cleanTextData($_POST['afcs/application-submission/declaration/submission/declaration-agreed']);
            $declarationchk = 'checked';
            $data['submission']['declaration'] = cleanTextData($_POST['afcs/application-submission/declaration/submission/declaration-agreed']);


        } else {
            $data['submission']['declaration'] = 'No';
            $errors = 'Y';
            $errorsList[] = '<a href="#afcs/application-submission/declaration/submission/declaration-agreed">Confirm you have read and understood the declaration</a>';
            $declaration['error'] = 'govuk-form-group--error';
            $declaration['errorLabel'] =
            '<span id="afcs/application-submission/declaration/submission/declaration-agreed-error" class="govuk-error-message">
                <span class="govuk-visually-hidden">Error:</span> Confirm you have read and understood the declaration
             </span>';
         }

    } else {

                $errors = 'Y';
            $errorsList[] = '<a href="#afcs/application-submission/declaration/submission/declaration-agreed">Confirm you have read and understood the declaration</a>';
            $declaration['error'] = 'govuk-form-group--error';
            $declaration['errorLabel'] =
            '<span id="/applicant/helper-details/helper-name-error" class="govuk-error-message">
                <span class="govuk-visually-hidden">Error:</span> Confirm you have read and understood the declaration
             </span>';

    }





    if ( (!empty($_POST['afcs/application-submission/declaration/submission/enquiries-by-email'])) && ($_POST['afcs/application-submission/declaration/submission/enquiries-by-email']) == 'Yes' ) {

            $declaration['data'] = cleanTextData($_POST['afcs/application-submission/declaration/submission/enquiries-by-email']);
            $enquirychk = 'checked';
            $data['submission']['enquiry'] = 'Yes';


    } else {
    $data['submission']['enquiry'] = 'No';
    }






    if ($errors == 'Y') {

        $errorList = '';
        foreach ($errorsList as $error) {
            $errorList .=  '<li>'.$error.'</li>';
        }


        $errorMessage = '
         <div class="govuk-error-summary" aria-labelledby="error-summary-title" role="alert" tabindex="-1" data-module="govuk-error-summary">
          <h2 class="govuk-error-summary__title" id="error-summary-title">
            There is a problem
          </h2>
          <div class="govuk-error-summary__body">
            <ul class="govuk-list govuk-error-summary__list">
            '.$errorList.'
            </ul>
          </div>
        </div>
        ';







    } else {

        //store our changes

        storeData($userID,$data);

        $theURL = '/application-complete';
        if (!empty($_GET['return'])) {
            if ($rURL = cleanURL($_GET['return'])) {
                $theURL = $rURL;
            }
        }

        header("Location: ".$theURL);
die();

}
}

@endphp



@include('framework.header')


    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
@php
echo $errorMessage;
@endphp

                                <h1 class="govuk-heading-xl">Complete your application</h1>

    <p class="govuk-body">After you press the ‘Submit your application’ button below, your claim will automatically be sent to Veterans UK securely and your details will be deleted from this digital service. </p>

                                <div class="govuk-inset-text">
You will not be able to access your completed application again after it is submitted.
</div>

<p class="govuk-body">You will get an email acknowledgement to the email address you gave us in ‘personal details’ with information about how your claim will be assessed.</p>

<p class="govuk-body"><strong>Declaration</strong></p>
<p class="govuk-body">

I confirm that if I have signed a UKSF Confidentiality Contract, I have been careful not to make unauthorised disclosures. I have sought advice from the Disclosure Cell and have Express Prior Authority in Writing (EPAW) to make such statements.</p>

<p class="govuk-body">I confirm the information I have given is accurate and complete to the best of my knowledge and belief.</p>

<p class="govuk-body">I understand that the information and personal data I have provided on this form, and any information and personal data I provide subsequently may be:</p>
<ul  class="govuk-list govuk-list--bullet">
<li>Used by the MOD in connection with my claim, or any subsequent reconsideration, review or appeal, under the Armed Forces Compensation Scheme (AFCS) or the Service Pensions Order (SPO) or any other schemes administered by Veterans UK.</li>
<li>Passed to any organisation contracted to provide medical services to the MOD and any qualified medical practitioner asked by the MOD to provide specialist advice</li>
<li>Passed to the DWP.</li>
<li>Used by the MOD and its agents in connection with all matters relating to this or future claims, or any subsequent reconsideration, review or appeal, under the AFCS or the SPO or other schemes administered by Veterans UK, and other claims against the MOD, and by other Government Departments, which have a legitimate interest in this information, for example, for the prevention and detection of crime.</li>
</ul>
<ul  class="govuk-list govuk-list--bullet">


<p class="govuk-body"><strong>I understand that:</strong></p>
<li>I must immediately tell the MOD of anything that may affect my entitlement to, or the amount of, an award under the AFCS, a war pension, a supplementary allowance or any survivors’ benefits paid under the SPO, or an award paid under any other scheme administered by Veterans UK, including any changes of address.</li>
<li>If I knowingly give false information, I may be liable to prosecution.</li>
</ul>

<p class="govuk-body"><strong>In order to process your application</strong></p>
<ul  class="govuk-list govuk-list--bullet">
<li>The MOD and,
<li>any doctor advising the MOD and,
<li>any organisation contracted to provide medical services to the MOD and any doctor providing services to that organisation.</li>
</ul>
<p class="govuk-body"><strong>maybe required to contact:</strong></p>
<ul  class="govuk-list govuk-list--bullet">
<li>any doctor who has provided treatment and,</li>
<li>any hospital or similar place and,</li>
<li>anyone else who has provided investigation or treatment (such as a physiotherapist) for copies of all medical records (including those in sealed envelopes) and any other information required to consider my claim, or any subsequent reconsideration, review or appeal, under the AFCS or the SPO or any other schemes administered by Veterans UK.</li>
</ul>

<p class="govuk-body"><strong>And that the MOD may</strong></p>
<ul  class="govuk-list govuk-list--bullet">
<li>Disclose medical records, and any information about my claim, or any subsequent reconsideration, review or appeal, under the AFCS or the SPO or any other schemes administered by Veterans UK, to any organisation contracted to provide medical services to the MOD and any qualified medical practitioner or consultant asked by the MOD to provide specialist advice. I also agree that the MOD may send copies of medical information obtained for the purposes of my claim, or any subsequent reconsideration, review or appeal, under the AFCS or the SPO or any other schemes administered by Veterans UK to my General Practitioner. I understand that the information will be retained by the MOD, either as a written record, or on a secure database, and may be used in future if it is necessary to reconsider or review my claim and any award made.</li>
</ul>

<p clas="govuk-body"><strong>I agree</strong></p>
<ul  class="govuk-list govuk-list--bullet">
<li>To repay any sum paid as a result of this claim in the event that an overpayment is made for any reason.</li>
</ul>
  </div>


    @php echo $declaration['errorLabel']; @endphp

            <form method="post" enctype="multipart/form-data" novalidate>
            @csrf
                                    <div class="govuk-checkboxes__item">
            <input id="6166a97ee7ad1--default" name="afcs/application-submission/declaration/submission/declaration-agreed" type="hidden" value="No">
        <input class="govuk-checkboxes__input" id="afcs/application-submission/declaration/submission/declaration-agreed" name="afcs/application-submission/declaration/submission/declaration-agreed" type="checkbox"
           value="Yes"      {{$declarationchk ?? ''}}      >
    <label class="govuk-label govuk-checkboxes__label" for="6166a97ee7ad1">I have read and understood the above declaration (required)</label>
</div>


                <div class="govuk-form-group">
   <button class="govuk-button govuk-!-margin-right-2" data-module="govuk-button">SUBMIT YOUR CLAIM</button>
@include('framework.bottombuttons')

    </div>
            </form>
            </div>
        </div>
    </main>
</div>






@include('framework.footer')
