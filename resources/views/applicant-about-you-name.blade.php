@include('framework.functions')
@php


//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$firstname = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$lastname = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$title = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);


if (empty($_POST)) {
    //load the data if set
    if (!empty($data['sections']['about-you']['name'])) {
        $firstname['data']           = @$data['sections']['about-you']['name']['firstname'];
        $lastname['data']            = @$data['sections']['about-you']['name']['lastname'];
        $title['data']            = @$data['sections']['about-you']['name']['title'];


    }
} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {


    //set the entered field names

    $lastname['data'] = cleanTextData($_POST['/afcs/about-you/personal-details/your-name/last-name']);
    $firstname['data'] = cleanTextData($_POST['/afcs/about-you/personal-details/your-name/other-names']);
    $title['data'] = cleanTextData($_POST['/afcs/about-you/personal-details/your-name/title']);



    if (empty($_POST['/afcs/about-you/personal-details/your-name/last-name'])) {
        $errors = 'Y';
        $errorsList[] = '<a href="#/afcs/about-you/personal-details/your-name/last-name">Enter your last name</a>';
        $lastname['error'] = 'govuk-form-group--error';
        $lastname['errorLabel'] =
        '<span id="/afcs/about-you/personal-details/your-name/last-name-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Enter your last name
         </span>';

    } else {
        $data['sections']['about-you']['name']['lastname'] = cleanTextData($_POST['/afcs/about-you/personal-details/your-name/last-name']);
    }


    if (empty($_POST['/afcs/about-you/personal-details/your-name/other-names'])) {
        $errors = 'Y';
        $errorsList[] = '<a href="#/representative/representative-address/address-line-1">Enter your first name</a>';
        $firstname['error'] = 'govuk-form-group--error';
        $firstname['errorLabel'] =
        '<span id="/afcs/about-you/personal-details/your-name/other-names-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Enter your first name
         </span>';


    } else {
        $data['sections']['about-you']['name']['firstname'] = cleanTextData($_POST['/afcs/about-you/personal-details/your-name/other-names']);
    }


    if (empty($_POST['/afcs/about-you/personal-details/your-name/title'])) {

    } else {
        $data['sections']['about-you']['name']['title'] = cleanTextData($_POST['/afcs/about-you/personal-details/your-name/title']);
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

        $theURL = '/applicant/about-you/contact-address';
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

<!--hello there-->
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
                                <p class="govuk-body">The name of the person with the injury, illness or disability</p>
                                <p class="govuk-body">Include your title, for example Mr, Mrs, Dr, if you want us to use this when we write to you</p>
                                <form method="post" enctype="multipart/form-data">
                                @csrf
                                                    <div class="govuk-form-group {{$lastname['error']}} ">
    <label class="govuk-label" for="afcs/about-you/personal-details/your-name/last-name">
        Last name or family name (required)
    </label>
@php echo $lastname['errorLabel']; @endphp
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="afcs/about-you/personal-details/your-name/last-name" name="/afcs/about-you/personal-details/your-name/last-name" type="text"
         autocomplete="family_name"
                  value="{{$lastname['data']}}"
            >
</div>
<div class="govuk-form-group {{$firstname['error']}} ">
    <label class="govuk-label" for="afcs/about-you/personal-details/your-name/other-names">
        First names or given names (required)
    </label>
@php echo $firstname['errorLabel']; @endphp
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="afcs/about-you/personal-details/your-name/other-names" name="/afcs/about-you/personal-details/your-name/other-names" type="text"
                   value="{{$firstname['data']}}"
            >
</div>

<div class="govuk-form-group {{$title['error']}} ">
    <label class="govuk-label" for="afcs/about-you/personal-details/your-name/title">
        Title (optional)
    </label>
    @php echo $title['errorLabel']; @endphp
    <input class="govuk-input govuk-!-width-two-thirds" id="afcs/about-you/personal-details/your-name/title" name="/afcs/about-you/personal-details/your-name/title" type="text" value="{{$title['data']}}" maxlength="20" >
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
