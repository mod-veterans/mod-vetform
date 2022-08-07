@include('framework.functions')
@php


//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$role = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);


if (empty($_POST)) {
    //load the data if set
    if (!empty($data['sections']['nominate-representative']['nominated representative'])) {
        $role['data']            = @$data['sections']['nominate-representative']['nominated representative']['role'];
        $rolechk[$role['data']] = ' checked';
    }
} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {


    //set the entered field names


    if (!empty($_POST['/representative/representative-role/representative-role'])) {


        switch ($_POST['/representative/representative-role/representative-role']) {

            case "Veterans UK welfare manager":
                $data['sections']['nominate-representative']['nominated representative']['role'] = 'Veterans UK welfare manager';
                $rolechk['Veterans UK welfare manager'] = ' checked';

            break;

            case "Charity welfare manager":
                $data['sections']['nominate-representative']['nominated representative']['role'] = 'Charity welfare manager';
                $rolechk['Charity welfare manager'] = ' checked';
            break;

            case "Solicitor":
                $data['sections']['nominate-representative']['nominated representative']['role'] = 'Solicitor';
                $rolechk['Solicitor'] = ' checked';
            break;

            case "Friend or relative":
                $data['sections']['nominate-representative']['nominated representative']['role'] = 'Friend or relative';
                $rolechk['Friend or relative'] = ' checked';
            break;

            case "Local Authority employee":
                $data['sections']['nominate-representative']['nominated representative']['role'] = 'Local Authority employee';
                $rolechk['Local Authority employee'] = ' checked';
            break;

            case "Other":
                $data['sections']['nominate-representative']['nominated representative']['role'] = 'Other';
                $rolechk['Other'] = ' checked';
            break;


        }



    } else {

        $errors = 'Y';
        $errorsList[] = '<a href="#/representative/representative-role/representative-role">Tell us your representative\'s role</a>';
        $role['error'] = 'govuk-form-group--error';
        $role['errorLabel'] =
        '<span id="/representative/representative-role/representative-role-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Tell us your representative\'s role
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

        $theURL = '/applicant/nominate-a-representative-yes-check-answers';
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
                                <h1 class="govuk-heading-xl">What is your representative&#039;s role?</h1>
    </legend>
<form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group {{$role['error']}} ">
    <a id="/representative/representative-role/representative-role"></a>
    <fieldset class="govuk-fieldset">
@php echo $role['errorLabel']; @endphp
                                            <div
            class="govuk-radios"  >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/representative/representative-role/representative-role-veterans-u-k-welfare-manager" name="/representative/representative-role/representative-role" type="radio"
           value="Veterans UK welfare manager"  @php echo @$rolechk['Veterans UK welfare manager']; @endphp           >
    <label class="govuk-label govuk-radios__label" for="/representative/representative-role/representative-role-veterans-u-k-welfare-manager">Veterans UK welfare manager</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/representative/representative-role/representative-role-charity-welfare-manager" name="/representative/representative-role/representative-role" type="radio"
           value="Charity welfare manager"      @php echo @$rolechk['Charity welfare manager']; @endphp       >
    <label class="govuk-label govuk-radios__label" for="/representative/representative-role/representative-role-charity-welfare-manager">Charity welfare manager</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/representative/representative-role/representative-role-solicitor" name="/representative/representative-role/representative-role" type="radio"
           value="Solicitor"        @php echo @$rolechk['Solicitor']; @endphp     >
    <label class="govuk-label govuk-radios__label" for="/representative/representative-role/representative-role-solicitor">Solicitor</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/representative/representative-role/representative-role-friend-or-relative" name="/representative/representative-role/representative-role" type="radio"
           value="Friend or relative"     @php echo @$rolechk['Friend or relative']; @endphp        >
    <label class="govuk-label govuk-radios__label" for="/representative/representative-role/representative-role-friend-or-relative">Friend or relative</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/representative/representative-role/representative-role-other" name="/representative/representative-role/representative-role" type="radio"
           value="Other"     @php echo @$rolechk['Other']; @endphp        >
    <label class="govuk-label govuk-radios__label" for="/representative/representative-role/representative-role-other">Other</label>
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
