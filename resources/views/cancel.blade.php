@include('framework.functions')
@include('framework.header')
@include('framework.backbutton')


@php
//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields


$cancelapplication = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);



if (empty($_POST)) {
    //there is no data to load for this page
}


if (!empty($_POST)) {



    if (empty($_POST['cancel-application'])) {

        $errors = 'Y';
        $errorsList[] = '<a href="#/cancel-yes">Please confirm if you would like to cancel your application or return to the task list</a>';
        $cancelapplication['error'] = 'govuk-form-group--error';
        $cancelapplication['errorLabel'] =
        '<span id="/cancel-yes-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Please confirm if you would like to cancel your application or return to the task list
         </span>';



    } else {


        if ($_POST['cancel-application'] == 'yes') {
            //we are cancelling
            deleteData($userID);
            $theURL = "/";
        }

        if ($_POST['cancel-application'] == 'no') {
            //we are NOT cancelling
            $theURL = "/tasklist";
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


    } else {

        //store our changes

        if (!empty($_GET['return'])) {
            if ($rURL = cleanURL($_GET['return'])) {
                $theURL = $rURL;
            }
        }

        header("Location: ".$theURL);
        die();

    }

}

$page_title = 'Confirm you want to cancel your application';

@endphp



    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
@php
echo $errorMessage;
@endphp
                <h1 class="govuk-heading-xl">Confirm you want to cancel your application</h1>
                <div class="govuk-warning-text">
                  <span class="govuk-warning-text__icon" aria-hidden="true">!</span>
                  <strong class="govuk-warning-text__text">
                    <span class="govuk-warning-text__assistive">Warning</span>
                    If you cancel your application, all the information you’ve entered will be permanently deleted.  You can make another application in the future, but you’ll need to start again.
                  </strong>
                </div>
                <form method="post" enctype="multipart/form-data" novalidate>
                @csrf
                    <div class="govuk-form-group {{$cancelapplication['error']}}">
                      <fieldset class="govuk-fieldset">
@php echo $cancelapplication['errorLabel']; @endphp
                        <legend class="govuk-fieldset__legend govuk-fieldset__legend--m">
                          <h2 class="govuk-fieldset__heading">
                            Do you want to cancel your application?
                          </h2>
                        </legend>
                        <div class="govuk-radios" data-module="govuk-radios">
                          <div class="govuk-radios__item">
                            <input class="govuk-radios__input" id="cancel-yes" name="cancel-application" type="radio" value="yes">
                            <label class="govuk-label govuk-radios__label" for="cancel-yes">
                              Yes - cancel my application and delete my information
                            </label>
                          </div>
                          <div class="govuk-radios__item">
                            <input class="govuk-radios__input" id="cancel-no" name="cancel-application" type="radio" value="no">
                            <label class="govuk-label govuk-radios__label" for="cancel-no">
                              No - take me back to the task list menu page
                            </label>
                          </div>
                        </div>
                      </fieldset>
                    </div>
                    <button class="govuk-button" data-module="govuk-button">
                      Continue
                    </button>
                </form>
            </div>
        </div>
    </main>
</div>




@include('framework.footer')
