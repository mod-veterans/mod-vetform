@include('framework.functions')
@php


//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$nominate = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);


if (empty($_POST)) {
    //load the data if set
    if (!empty($data['sections']['nominate-representative']['nominate-representative'])) {
        $nominate['data']            = @$data['sections']['nominate-representative']['nominate-representative'];
        $nominatechk[$nominate['data']] = ' checked';
    }
} else {


}



//as this is a journey-deciding page, we want to detect a change in choice (if returning from a CYA page) so we can
//kill off the return URL

if ( (!empty($_POST['/representative/representative-selection/nominate-representative'])) && (!empty($data['sections']['nominate-representative']['nominate-representative'])) &&
($data['sections']['nominate-representative']['nominate-representative'] == $_POST['/representative/representative-selection/nominated-representative']) ) {

    //same choice, return applies

} else {

   unset($_GET['return']);

}



if (!empty($_POST)) {


    //set the entered field names


    if (!empty($_POST['/representative/representative-selection/nominated-representative'])) {


        switch ($_POST['/representative/representative-selection/nominated-representative']) {

            case "Yes":
                $data['sections']['nominate-representative']['nominate-representative'] = 'Yes';
                $nominatechk['Yes'] = ' checked';
                $theURL = '/applicant/nominate-a-representative-details';

            break;

            case "No":
                $data['sections']['nominate-representative']['nominate-representative'] = 'No';
                $nominatechk['No'] = ' checked';
                $theURL = '/applicant/nominate-a-representative-no-check-answers';
            break;


            default:
                die('unexpected input');
            break;


        }



    } else {

        $errors = 'Y';
        $errorsList[] = '<a href="#/representative/representative-selection/nominated-representative-yes">Tell us if you want to nominate a representative</a>';
        $nominate['error'] = 'govuk-form-group--error';
        $nominate['errorLabel'] =
        '<span id="/representative/representative-selection/nominated-representative-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Tell us if you want to nominate a representative
         </span>';

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

        if (!empty($_GET['return'])) {
            if ($rURL = cleanURL($_GET['return'])) {
                $theURL = $rURL;
            }
        }

        header("Location: ".$theURL);
        die();

}

}

$page_title = 'Nominating a representative';
@endphp





@include('framework.header')



    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
@php
echo $errorMessage;
@endphp

                                <h1 class="govuk-heading-xl">Nominating a representative</h1>

                                    <p  class="govuk-body">If you want us to send copies of future letters and enquiries to someone else, they must be made a representative.  We will not send copies of letters to anyone helping with making this claim unless you do this.</br>
<p  class="govuk-body">
If you make someone a representative, they:
</p>

<ul class="govuk-list govuk-list--bullet govuk-list--spaced">
<li>will get future copies of all letters we send</li>
<li>will get a copy of our final decision</li>
<li>can be the same person helping you make this online claim or can be another person</li>
</ul>


<p class="govuk-body">Letters we send can contain personal information. This can include banking details, medical information and the amount of money we may pay if a claim is successful.</p>

<p class="govuk-body">You can remove someone from being a representative or make changes by writing to us.  Our address is on the email we’ll send to you after you submit this application.</p>


            <form method="post" enctype="multipart/form-data" novalidate>
            @csrf
                                                    <div class="govuk-form-group  {{$errorWhoShow}} ">
    <a id="/representative/representative-selection/nominated-representative"></a>

<legend class="govuk-fieldset__legend govuk-fieldset__legend--m">
                                Do you want to nominate a representative?
 </legend>

    <fieldset class="govuk-fieldset">
    @php echo $nominate['errorLabel']; @endphp
        <div class="govuk-radios govuk-radios--inline" >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/representative/representative-selection/nominated-representative-yes" name="/representative/representative-selection/nominated-representative" type="radio" value="Yes" @php echo @$nominatechk['Yes']; @endphp data-ga-question="Do you want to nominate a representative TEST?" data-ga-answer="Yes" >
    <label class="govuk-label govuk-radios__label" for="/representative/representative-selection/nominated-representative-yes">Yes</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/representative/representative-selection/nominated-representative-no" name="/representative/representative-selection/nominated-representative" type="radio" value="No"  @php echo @$nominatechk['No']; @endphp data-ga-question="Do you want to nominate a representative TEST?" data-ga-answer="No" >
    <label class="govuk-label govuk-radios__label" for="/representative/representative-selection/nominated-representative-no">No</label>
</div>

                    </div>
    </fieldset>
</div>



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
