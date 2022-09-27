<?php
namespace App\Http\Controllers;
use App\Services\Notify;
?>



@include('framework.functions')
<?php
$userID = $_SESSION['vets-user'];
$data = getData($userID);


if (empty($_POST)) {
    if (!empty($_SERVER['HTTP_REFERER'])) {
        $data['settings']['feedback_return_url'] = $_SERVER['HTTP_REFERER'];
        storeData($userID,$data);
    }
}

$content = '';
$reference_number = 'WPS/AFCS/MOD/'.$data['settings']['customer_ref'];

$errorMessage = '';
//set fields
$whathappened = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$whatdoing = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$emailaddress = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$phonenumber = array('data'=>'', 'error'=>'', 'errorLabel'=>'');

$success = '';

$page_title = 'Give feedback on Apply for Armed Forces Compensation or a War Pension';



if (!empty($_POST)) {



    if (empty($_POST['what-doing'])) {



        $errors = 'Y';
        $errorsList[] = '<a href="#what-doing">Tell us what you were doing</a>';
        $whatdoing['error'] = 'govuk-form-group--error';
        $whatdoing['errorLabel'] =
        '<span id="ehat-doing-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span>Tell us what you were doing
         </span>';

    } else {

        $whatdoing['data'] = cleanTextData($_POST['what-doing']);

    }

    if (empty($_POST['what-happened'])) {

        $errors = 'Y';
        $errorsList[] = '<a href="#what-happened">Tell us what happened</a>';
        $whathappened['error'] = 'govuk-form-group--error';
        $whathappened['errorLabel'] =
        '<span id="what-happened-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span>Tell us what happened
         </span>';

    } else {

        $whathappened['data'] = cleanTextData($_POST['what-happened']);

    }


    if (empty($_POST['emailaddress'])) {


    } else {

        $emailaddress['data'] = cleanTextData($_POST['emailaddress']);

    }

    if (empty($_POST['phonenumber'])) {


    } else {

        $phonenumber['data'] = cleanTextData($_POST['phonenumber']);

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


$fullContent = '

#What were you doing?
'.$whatdoing['data'].'

#What happened?
'.$whathappened['data'].'

#Email address
'.$emailaddress['data'].'

#Phone number
'.$phonenumber['data'].'

Timestamp: '.date('H:i:s d-m-Y');


$appstage = getenv('APP_STAGE');
if (empty($appstage)) {
    $appstage = 'UAT';
}

        if ($appstage != 'LOCAL') {
        //send email
        Notify::getInstance()->setData(['ref_num' => $reference_number,'comments' => $fullContent])->sendEmail('dbsvets-modernisation-contactus@mod.gov.uk', '9515f36c-42ad-43dd-82ae-29fe0480139d');

        }
        $success = 'Y';
    }

}

$wherefrom = '';
if (!empty($data['settings']['feedback_return_url'])) {
    $wherefrom =  '<a href="'.$data['settings']['feedback_return_url'].'" class="govuk-button">Return to application</a>';
}


?>

@include('framework.header')
@include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
@php
echo $errorMessage;


if ($success == 'Y') {
@endphp
 <div class="govuk-panel govuk-panel--confirmation">
  <h1 class="govuk-panel__title">
    Your feedback has been sent.
  </h1>
  <div class="govuk-panel__body">
   @php echo $wherefrom; @endphp
  </div>
</div>

@php
} else {
@endphp


                <h1 class="govuk-heading-xl">Give feedback on Apply for Armed Forces Compensation or a War Pension</h1>
                <p class="govuk-body">Help improve the Apply for Armed Forces Compensation or a War Pension service by completing our <a href="https://surveys.mod.uk/index.php/892274?lang=en" target="_New">user survey</a> (opens in a new tab). We’ll also include a link to this survey in the email you’ll get after you submit your application.</p>
                <p class="govuk-body">If you found a problem using this online service or are having difficulty using it, tell us below.</p>

            <form method="post">
            @csrf

                <div class="govuk-form-group {{$whatdoing['error'] ?? ''}}">
                  <label class="govuk-label govuk-label--m" for="more-detail">
                      What were you doing?
                    </label>
                    @php echo $whatdoing['errorLabel']; @endphp
                  <div id="what-doing-hint" class="govuk-hint">

                  </div>
                  <textarea class="govuk-textarea" id="what-doing" name="what-doing" rows="5" aria-describedby="what-doing-hint">{{$whatdoing['data'] ?? ''}}</textarea>
                </div>

                <div class="govuk-form-group {{$whathappened['error'] ?? ''}}">
                  <label class="govuk-label govuk-label--m" for="more-detail">
                      What happened?
                    </label>
                  @php echo $whathappened['errorLabel']; @endphp
                  <div id="what-happened-hint" class="govuk-hint">

                  </div>
                  <textarea class="govuk-textarea" id="what-happened" name="what-happened" rows="5" aria-describedby="what-happened-hint">{{$whathappened['data'] ?? ''}}</textarea>
                </div>

                <p class="govuk-body">
                If you want us to contact you, tell us your email address or phone number and we’ll be in touch within 24 hours (Monday - Friday).
                </p>

                <div class="govuk-form-group">
                  <label class="govuk-label govuk-label--m" for="emailaddress">
                     Email address (optional)
                </label>

                  <input class="govuk-input" id="emailaddress" name="emailaddress" type="text" value="{{$emailaddress['data'] ?? ''}}">
                </div>

                <div class="govuk-form-group">
                  <label class="govuk-label govuk-label--m" for="phonenumber">
                     Phone number (optional)
                </label>

                  <input class="govuk-input" id="phonenumber" name="phonenumber" type="text" value="{{$phonenumber['data'] ?? ''}}">
                </div>


                <button class="govuk-button" data-module="govuk-button">
                  Send feedback
                </button>

            </form>

@php
}
@endphp


            </div>
        </div>
    </main>
</div>




@include('framework.footer')
