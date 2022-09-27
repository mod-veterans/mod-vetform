@include('framework.functions')
@php


//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();
$theCode = '';


//set fields
//$email = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
//$lastname = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
//$ninumber = array('data'=>'', 'error'=>'', 'errorLabel'=>'');



//we should only hit this page if we have a code on the URL
if (empty($_GET['code'])) {
header('Location: /retrieve-application');
die();
}


if (!empty($_POST)) {


$theCode = $_POST['theCode'];
$bigCode = $_GET['code'];


if ( (!ctype_alnum($bigCode)) || (!ctype_alnum($theCode)) ) {
    $errors = 'Y';

} else {


    $rightnow = date('Y-m-d H:i:s');

    $db = pg_connect("host=".$_ENV['DB_HOST']." port=".$_ENV['DB_PORT']." dbname=".$_ENV['DB_DATABASE']." user=".$_ENV['DB_USERNAME']." password=".$_ENV['DB_PASSWORD']."");
    $result = pg_query($db, "SELECT * FROM modvetdevusertable WHERE userref = '$bigCode' AND accesscode = '$theCode'");
    if ($row = pg_fetch_assoc($result)) {
        if (strtotime($row['accessuseby']) >= strtotime($rightnow)) {


            $theID = $row['id'];

            //blank out the code so it cannot be used again
            $blankCode = genHash();
            pg_query($db, "UPDATE modvetdevusertable SET userref = '$blankCode', accesscode = '-----', accessuseby = '1999-12-31 00:00:00' WHERE id = '$theID'");


            $userid = $row['userid'];
            $_SESSION['vets-user'] = $userid;
            header("Location: /tasklist");
            die();
        } else {
            $errors = 'Y';
        }

    } else {
        $errors = 'Y';
    }

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
           The access code you’ve entered is not correct. <a href="/retrieve-application">Try again</a>  or <a href="https://www.gov.uk/guidance/veterans-uk-contact-us" target="_New">contact us</a>.
            </ul>
          </div>
        </div>
        ';
    }

}

$page_title = 'Enter your access code';

@endphp



@include('framework.header')

<!--hello there-->
    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">

@php
echo $errorMessage;
@endphp
  <legend class="govuk-fieldset__legend govuk-fieldset__legend--l">
                                <h1 class="govuk-heading-xl">Enter your access code</h1>
  </legend>
                                <p class="govuk-body">We’ve sent a five digit access code to the mobile phone number and email address we have registered for you.  This may take a few minutes to arrive. </p>
                                <p class="govuk-body">Check your email junk, spam or ‘all mail’ folder if it’s not received. </p>
                                <form method="post" enctype="multipart/form-data">
                                @csrf
<div class="govuk-form-group">
    <label class="govuk-label" for="afcs/about-you/personal-details/your-name/last-name">
        Enter the access code:
    </label>
    <input  class="govuk-input govuk-!-width-two-thirds " id="theCode" name="theCode" type="text" value="" required>
</div>





                <div class="govuk-form-group">
   <button class="govuk-button govuk-!-margin-right-2" data-module="govuk-button">Submit Code</button>
@include('framework.bottombuttons')

    </div>
            </form>
            </div>
        </div>
    </main>
</div>




@include('framework.footer')
