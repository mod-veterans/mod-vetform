<?php
namespace App\Http\Controllers;
use App\Services\Notify;
?>
@include('framework.functions')
@php


//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();
$dob = array('data'=>'', 'error'=>'', 'errorLabel'=>'');

//set fields
//$email = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
//$lastname = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
//$ninumber = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


if (!empty($_POST)) {


$ninumber = md5(simplify($_POST['ninumber']));
$lastname = md5(simplify($_POST['lastname']));



        $dobday['data']            = @$_POST['afcs/about-you/personal-details/date-of-birth/date-of-birth-day'];
        $dobmonth['data']            = @$_POST['afcs/about-you/personal-details/date-of-birth/date-of-birth-month'];
        $dobyear['data']            = @$_POST['afcs/about-you/personal-details/date-of-birth/date-of-birth-year'];


        if ( (!is_numeric($dobday['data'])) || (!is_numeric($dobmonth['data'])) || (!is_numeric($dobyear['data'])) ) {
            $errors = 'Y';
            $errorsList[] = '<a href="#/applicant/nominee-details/nominee-details">Please enter your date of birth in numeric format</a>';
            $dob['error'] = 'govuk-form-group--error';
            $dob['errorLabel'] =
            '<span id="/applicant/nominee-details/nominee-details" class="govuk-error-message">
                <span class="govuk-visually-hidden">Error:</span> Please enter your date of birth in numeric format
             </span>';


        }




        if ($errors != 'Y') {


        $dobData = mktime(0,0,0, $dobmonth['data'],$dobday['data'],$dobyear['data']);
        $email = md5(simplify($dobData));




    $db = pg_connect("host=".$_ENV['DB_HOST']." port=".$_ENV['DB_PORT']." dbname=".$_ENV['DB_DATABASE']." user=".$_ENV['DB_USERNAME']." password=".$_ENV['DB_PASSWORD']."");
    $result = pg_query($db, "SELECT * FROM modvetdevusertable WHERE emailhash = '$email' AND surnamehash = '$lastname' AND nihash = '$ninumber' order by datetimeadded DESC LIMIT 1");
    if ($row = pg_fetch_assoc($result)) {


        //get the data so we can get the email and phone number
        $data = $row['data'];
        $data = DOdecrypt($data);
        $data = json_decode($data,TRUE);


        $mobile = @$data['sections']['about-you']['telephonenumber']['mobile'];
        $email = @$data['sections']['about-you']['email'];



        //we don't want this any more
        unset($data);




    //create a 5 digit number
    $tempNum = rand(24000,65000);

    //create a random hash
    $tempHash = genHash();


    //if this is locald dev, override with a default number
    if ($_SERVER['SERVER_NAME'] == 'modvets.local') {
        $tempNum = '12345';
    }

    //date to expire
    $dateExpire = date('Y-m-d H:i:s', strtotime('+15 minutes'));

    $theID = $row['id'];

    pg_query($db, "UPDATE modvetdevusertable SET userref = '$tempHash', accesscode = '$tempNum', accessuseby = '$dateExpire' WHERE id = '$theID'");




    if ($_SERVER['SERVER_NAME'] == 'modvets.local') {

     //do nothing

    } else {
        //send notify code out

        if (!empty($mobile)) {
        Notify::getInstance()->setData(['auth_code' => $tempNum])->sendSms($mobile, env('NOTIFY_2FA_SMS'));
        }

        if (!empty($email)) {
        Notify::getInstance()->setData(['auth_code' => $tempNum])->sendEmail($email, env('NOTIFY_2FA_EMAIL'));
        }

    }










    header("Location: /retrieve-application-confirm?code=$tempHash");
    die();


    } else {
        $errors = 'Y';
            $errorsList[] = '<a href="#">We cannot find an existing record matching those details.<br /><br />
Check you have entered your details correctly and try again.<br /><br />
You can only return to an application within three months of the date you started it.  <br /><br />
For help call 0808 1914 218 (Mon-Fri)
</a>';

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
            '.$errorList.'
            </ul>
          </div>
        </div>
        ';
    }

}

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
                                <h1 class="govuk-heading-xl">Return to a saved application</h1>
  </legend>
                                <p class="govuk-body">Enter the details below so we can find your application.</p>
                                <form method="post" enctype="multipart/form-data">
                                @csrf
<div class="govuk-form-group">
    <label class="govuk-label" for="afcs/about-you/personal-details/your-name/last-name">
        Surname or family name (required)
    </label>
    <input  class="govuk-input govuk-!-width-two-thirds " id="last-name" name="lastname" type="text" value="" required>
</div>


    <fieldset class="govuk-fieldset">


    @php echo $dob['errorLabel']; @endphp


    <label class="govuk-label" for="">
        Date of birth (required)
    </label>
        <div id="afcs/about-you/personal-details/date-of-birth/date-of-birth-hint" class="govuk-hint">For example 27 3 2007</div>

        <div class="govuk-date-input" id="afcs/about-you/personal-details/date-of-birth/date-of-birth">
                                                <div class="govuk-date-input__item">


<div class="govuk-date-input__item">

    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="afcs/about-you/personal-details/date-of-birth/date-of-birth-day">
                                Day
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-2 "
            id="afcs/about-you/personal-details/date-of-birth/date-of-birth-day"
            name="afcs/about-you/personal-details/date-of-birth/date-of-birth-day" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="2"
            value="">
    </div>
</div>
                                                    <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="afcs/about-you/personal-details/date-of-birth/date-of-birth-month">
                                Month
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-2 "
            id="afcs/about-you/personal-details/date-of-birth/date-of-birth-month"
            name="afcs/about-you/personal-details/date-of-birth/date-of-birth-month" type="text" value="">
    </div>
</div>
                                                    <div class="govuk-date-input__item">
    <div class="govuk-form-group">
                    <label class="govuk-label govuk-date-input__label" for="afcs/about-you/personal-details/date-of-birth/date-of-birth-year">
                                Year
            </label>
                <input
            class="govuk-input govuk-date-input__input govuk-input--width-4 "
            id="afcs/about-you/personal-details/date-of-birth/date-of-birth-year"
            name="afcs/about-you/personal-details/date-of-birth/date-of-birth-year" type="text" pattern="[0-9]*" inputmode="numeric"
            maxlength="4"
            value="">
    </div>
</div>


</div>
</div>
</fieldset>



<div class="govuk-form-group">
    <label class="govuk-label" for="afcs/about-you/personal-details/your-name/lastname">
        National Insurance Number (required)
    </label>
    <input  class="govuk-input govuk-!-width-two-thirds " id="last-name" name="ninumber" type="text" value="" required>
</div>



                <div class="govuk-form-group">
   <button class="govuk-button govuk-!-margin-right-2" data-module="govuk-button">Continue</button>
@include('framework.bottombuttons')

    </div>
            </form>
            </div>
        </div>
    </main>
</div>




@include('framework.footer')
