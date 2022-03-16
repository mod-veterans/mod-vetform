@include('framework.functions')
@php


//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$helper_name = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);


if (empty($_POST)) {
    //load the data if set
    if (!empty($data['sections']['applicant-who']['helper'])) {
        $helper_name['data']            = @$data['sections']['applicant-who']['helper']['name'];
    }
} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {


    //set the entered field names

    $helper_name['data'] = cleanTextData($_POST['/applicant/helper-details/helper-name']);





    if (empty($_POST['/applicant/helper-details/helper-name'])) {
        $errors = 'Y';
        $errorsList[] = '<a href="#/applicant/helper-details/helper-name">Please tell us your name</a>';
        $helper_name['error'] = 'govuk-form-group--error';
        $helper_name['errorLabel'] =
        '<span id="/applicant/helper-details/helper-name-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Please tell us your name
         </span>';

    } else {
        $data['sections']['applicant-who']['helper']['name'] = cleanTextData($_POST['/applicant/helper-details/helper-name']);
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

        $theURL = '/applicant/helper/relationship';
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
<legend class="govuk-fieldset__legend govuk-fieldset__legend--l">
                                <h1 class="govuk-heading-xl">What is your name?</h1>
</legend>
                                <p class="govuk-body">Name of the person providing help</p>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
    <div class="govuk-form-group {{$helper_name['error']}}">
    <label class="govuk-label" for="/applicant/helper-details/helper-name">
        <span class="govuk-visually-hidden">Name of assistant making this claim</span>
    </label>
    @php echo $helper_name['errorLabel']; @endphp
            <input
        class="govuk-input govuk-!-width-two-thirds " id="/applicant/helper-details/helper-name" name="/applicant/helper-details/helper-name" type="text" autocomplete="name"
                  value="{{$helper_name['data']}}" />
</div>



                <div class="govuk-form-group">   <button class="govuk-button govuk-!-margin-right-2" data-module="govuk-button">Save and continue</button>
@include('framework.bottombuttons')

    </div>
            </form>
            </div>
        </div>
    </main>
</div>


@include('framework.footer')
