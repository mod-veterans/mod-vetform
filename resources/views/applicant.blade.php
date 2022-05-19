@include('framework.functions')
@php

$errorWhoLabel = '';
$errorWhoMessage = '';
$errorWhoShow = '';


//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);

$application_who = array();

if (!empty($data['sections']['applicant-who']['who is making this application'])) {


    //as this is a journey-deciding page, we want to detect a change in choice (if returning from a CYA page) so we can
    //kill off the return URL

   if ( (!empty($_POST['/applicant/applicant-selection/nominated-applicant'])) &&
    ($data['sections']['applicant-who']['who is making this application'] == $_POST['/applicant/applicant-selection/nominated-applicant']) ) {

        //same choice, return applies

    } else {

       unset($_GET['return']);

    }

    $application_who[$data['sections']['applicant-who']['who is making this application']] = 'checked';
}



if (!empty($_POST)) {


    if (!empty($_POST['/applicant/applicant-selection/nominated-applicant'])) {
        $data['sections']['applicant-who']['who is making this application'] = '';

        switch ($_POST['/applicant/applicant-selection/nominated-applicant']) {

            case "I am applying for myself.":
                $data['sections']['applicant-who']['who is making this application'] = 'The person named on this claim is making the application.';
                $location = '/applicant/epaw';
            break;


            case "I am applying for someone else.":
                $data['sections']['applicant-who']['who is making this application'] = 'I am making an application for someone else and I have legal authority to act on their behalf.';
                $location = '/applicant/legal-authority/epaw';
            break;


            case "I am helping someone apply.":
                $data['sections']['applicant-who']['who is making this application'] = 'I am helping someone else make this application.';
                $location = '/applicant/helper/epaw';
            break;

        }

        //store our changes

        storeData($userID,$data);

        $theURL = $location;
        if (!empty($_GET['return'])) {
            if ($rURL = cleanURL($_GET['return'])) {
                $theURL = $rURL;
            }
        }

        header("Location: ".$theURL);
        die();


    } else {

        $errorWhoLabel  = '
<span id="/applicant/applicant-selection/nominated-applicant-error" class="govuk-error-message">
    <span class="govuk-visually-hidden">Error:</span> Select who is making this application
</span>';

        $errorWhoMessage = '
 <div class="govuk-error-summary" aria-labelledby="error-summary-title" role="alert" tabindex="-1" data-module="govuk-error-summary">
  <h2 class="govuk-error-summary__title" id="error-summary-title">
    There is a problem
  </h2>
  <div class="govuk-error-summary__body">
    <ul class="govuk-list govuk-error-summary__list">
      <li>
        <a href="#/applicant/applicant-selection/nominated-applicant-error">Please choose who is making this application</a>
      </li>
    </ul>
  </div>
</div>

        ';

    $errorWhoShow = 'govuk-form-group--error';

    }

}

@endphp




@include('framework.header')

        @include('framework.backbutton')





    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
@php
echo $errorWhoMessage;
@endphp

                                <h1 class="govuk-heading-xl">Who is applying?</h1>


            <form method="post" enctype="multipart/form-data" novalidate>
            @csrf

    <div class="govuk-form-group {{$errorWhoShow}} ">
    <a id="/applicant/"></a>
    <fieldset class="govuk-fieldset">

@php
echo $errorWhoLabel;
@endphp

              <div
            class="govuk-radios govuk-radios--inline"
            >
                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/applicant/applicant-selection/nominated-applicant-the-person-named-on-this-claim-is-making-the-application." name="/applicant/applicant-selection/nominated-applicant" type="radio"
           value="I am applying for myself."   @php echo @$application_who['I am applying for myself.']; @endphp        >
    <label class="govuk-label govuk-radios__label" for="/applicant/applicant-selection/nominated-applicant-the-person-named-on-this-claim-is-making-the-application.">I am applying for myself.</label>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/applicant/applicant-selection/nominated-applicant-i-am-making-an-application-on-behalf-of-the-person-named-claim-on-this-and-i-have-legal-authority-to-act-on-their-behalf." name="/applicant/applicant-selection/nominated-applicant" type="radio"
           value="I am applying for someone else."     @php echo @$application_who['I am applying for someone else.']; @endphp        >
    <label class="govuk-label govuk-radios__label" for="/applicant/applicant-selection/nominated-applicant-i-am-making-an-application-on-behalf-of-the-person-named-claim-on-this-and-i-have-legal-authority-to-act-on-their-behalf.">I'm applying for someone else.</label>
<div id="sign-in-item-hint" class="govuk-hint govuk-radios__hint">
        I have power of attorney or other legal authority.
      </div>
</div>

                            <div class="govuk-radios__item">
    <input class="govuk-radios__input" id="/applicant/applicant-selection/nominated-applicant-i-am-helping-someone-else-make-this-application." name="/applicant/applicant-selection/nominated-applicant" type="radio"
           value="I am helping someone apply."     @php echo @$application_who['I am helping someone apply.']; @endphp       >
    <label class="govuk-label govuk-radios__label" for="/applicant/applicant-selection/nominated-applicant-i-am-helping-someone-else-make-this-application.">I'm helping someone apply</label>
<div id="sign-in-item-hint" class="govuk-hint govuk-radios__hint">
        The applicant is giving me their answers and I'm helping them apply.
      </div>
</div>



                    </div>
    </fieldset>
</div>



                <div class="govuk-form-group">
    <button class="govuk-button govuk-!-margin-right-2" data-module="govuk-button">Save and continue</button>
            <br><a href="/cancel" class="govuk-link"
           data-module="govuk-button">
            Cancel application
        </a>

    </div>
            </form>
            </div>
        </div>
    </main>
</div>

@include('framework.footer')
