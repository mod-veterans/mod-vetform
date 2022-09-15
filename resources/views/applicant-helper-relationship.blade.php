@include('framework.functions')
@php


//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$relationship = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);


if (empty($_POST)) {
    //load the data if set
    if (!empty($data['sections']['applicant-who']['helper'])) {
        $relationship['data']            = @$data['sections']['applicant-who']['helper']['relationship'];
        $relationshipchk[$relationship['data']] = ' checked';
    }
} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {


    //set the entered field names


    if (!empty($_POST['/applicant/helper-relationship/helper-relationship'])) {


        switch ($_POST['/applicant/helper-relationship/helper-relationship']) {

            case "Friend":
                $data['sections']['applicant-who']['helper']['relationship'] = 'Friend';
                $relationshipchk['Friend'] = ' checked';
                 $theURL = '/applicant/helper/declaration';

            break;

            case "Spouse, civil partner, partner":
                $data['sections']['applicant-who']['helper']['relationship'] = 'Spouse, civil partner, partner';
                $relationshipchk['Relative'] = ' checked';
                 $theURL = '/applicant/helper/declaration';
            break;




            case "Other relative":
                $data['sections']['applicant-who']['helper']['relationship'] = 'Other relative';
                $relationshipchk['Other relative'] = ' checked';
                 $theURL = '/applicant/helper/declaration';
            break;

            case "Veterans Welfare Service Manager":
                $data['sections']['applicant-who']['helper']['relationship'] = 'Veterans Welfare Service Manager';
                $relationshipchk['Veterans Welfare Service Manager'] = ' checked';
                 $theURL = '/applicant/helper/relationship/when';
            break;

            case "Charity employee":
                $data['sections']['applicant-who']['helper']['relationship'] = 'Charity employee';
                $relationshipchk['Charity employee'] = ' checked';
                $theURL = '/applicant/helper/relationship/when';
            break;

            case "Local Authority employee":
                $data['sections']['applicant-who']['helper']['relationship'] = 'Local Authority employee';
                $relationshipchk['Local Authority employee'] = ' checked';
                $theURL = '/applicant/helper/relationship/when';
            break;

            case "Solicitor":
                $data['sections']['applicant-who']['helper']['relationship'] = 'Solicitor';
                $relationshipchk['Solicitor'] = ' checked';
                $theURL = '/applicant/helper/relationship/when';
            break;


            case "Other":
                $data['sections']['applicant-who']['helper']['relationship'] = 'Other';
                $relationshipchk['Other'] = ' checked';
                $theURL = '/applicant/helper/relationship/when';
            break;


        }



    } else {

        $errors = 'Y';
        $errorsList[] = '<a href="#/applicant/helper-details/helper-name">Tell us your relationship to the person making the claim</a>';
        $relationship['error'] = 'govuk-form-group--error';
        $relationship['errorLabel'] =
        '<span id="/applicant/helper-relationship/helper-relationship-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Tell us your relationship to the person making the claim
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

$page_title = 'What is your relationship to the person making the claim?';

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
                                <h1 class="govuk-heading-xl">What is your relationship to the person making the claim?</h1>
</legend>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
   <div class="govuk-form-group {{$relationship['error']}} ">
    <a id="/applicant/helper-relationship/helper-relationship"></a>
    <fieldset class="govuk-fieldset">
@php echo $relationship['errorLabel']; @endphp
   <div class="govuk-radios" >

   <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/applicant/helper-relationship/helper-relationship-Spouse-civil-partner-partner" name="/applicant/helper-relationship/helper-relationship" type="radio"
           value="Spouse, civil partner, partner" @php echo @$relationshipchk['Spouse, civil partner, partner']; @endphp  >
    <label class="govuk-label govuk-radios__label" for="/applicant/helper-relationship/helper-relationship-Spouse-civil-partner-partner">Spouse, civil partner, partner</label>
</div>

   <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/applicant/helper-relationship/helper-relationship-other-relative" name="/applicant/helper-relationship/helper-relationship" type="radio"
           value="Other relative"          @php echo @$relationshipchk['Other relative']; @endphp  >
    <label class="govuk-label govuk-radios__label" for="/applicant/helper-relationship/helper-relationship-other-relative">Other relative</label>
</div>

   <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/applicant/helper-relationship/helper-relationship-friend" name="/applicant/helper-relationship/helper-relationship" type="radio"
           value="Friend"          @php echo @$relationshipchk['Friend']; @endphp  >
    <label class="govuk-label govuk-radios__label" for="/applicant/helper-relationship/helper-relationship-friend">Friend</label>
</div>

<div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/applicant/helper-relationship/helper-relationship-veterans-welfare-service-manager" name="/applicant/helper-relationship/helper-relationship" type="radio"
           value="Veterans Welfare Service Manager"     @php echo @$relationshipchk['Veterans Welfare Service Manager']; @endphp       >
    <label class="govuk-label govuk-radios__label" for="/applicant/helper-relationship/helper-relationship-veterans-welfare-service-manager">Veterans Welfare Service Manager</label>
</div>

    <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/applicant/helper-relationship/helper-relationship-charity-employee" name="/applicant/helper-relationship/helper-relationship" type="radio"
           value="Charity employee"    @php echo @$relationshipchk['Charity employee']; @endphp        >
    <label class="govuk-label govuk-radios__label" for="/applicant/helper-relationship/helper-relationship-charity-employee">Charity employee</label>
</div>

   <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/applicant/helper-relationship/helper-relationship-local-authority-employee" name="/applicant/helper-relationship/helper-relationship" type="radio"
           value="Local Authority employee"    @php echo @$relationshipchk['Local Authority employee']; @endphp         >
    <label class="govuk-label govuk-radios__label" for="/applicant/helper-relationship/helper-relationship-local-authority-employee">Local Authority employee</label>
</div>

   <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/applicant/helper-relationship/helper-relationship-local-authority-employee" name="/applicant/helper-relationship/helper-relationship" type="radio"
           value="Solicitor"    @php echo @$relationshipchk['Solicitor']; @endphp         >
    <label class="govuk-label govuk-radios__label" for="/applicant/helper-relationship/helper-relationship-local-authority-employee">Solicitor</label>
</div>


    <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/applicant/helper-relationship/helper-relationship-other" name="/applicant/helper-relationship/helper-relationship" type="radio"
           value="Other"       @php echo @$relationshipchk['Other']; @endphp     >
    <label class="govuk-label govuk-radios__label" for="/applicant/helper-relationship/helper-relationship-other">Other</label>
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
