@include('framework.functions')
@php


//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$pensionscheme = array('data'=>'', 'error'=>'', 'errorLabel'=>'');


//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);


if (empty($_POST)) {
    //load the data if set
    if (!empty($data['sections']['about-you']['email'])) {
        $pensionscheme['data']            = @$data['sections']['about-you']['pensionscheme'];

    }

} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {

    if (empty( $_POST['afcs/about-you/personal-details/pension-scheme/pension-scheme'])) {

            $errors = 'Y';
            $errorsList[] = '<a href="#afcs/about-you/personal-details/pension-scheme/pension-scheme">Tell us which armed forces pension scheme(s) you are a member of.</a>';
            $pensionscheme['error'] = 'govuk-form-group--error';
            $pensionscheme['errorLabel'] =
            '<span id="afcs/about-you/personal-details/national-insurance/ni-number" class="govuk-error-message">
                <span class="govuk-visually-hidden">Error:</span>Tell us which armed forces pension scheme(s) you are a member of.
             </span>';


    } else {


    //set the entered field names
        $pensionschemearray          = $_POST['afcs/about-you/personal-details/pension-scheme/pension-scheme'];

        $pensionscheme['data']  = implode(', ',$pensionschemearray);

               $data['sections']['about-you']['pensionscheme'] = $pensionscheme['data'];

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

        $theURL = '/applicant/about-you/previous-claim';
        if (!empty($_GET['return'])) {
            if ($rURL = cleanURL($_GET['return'])) {
                $theURL = $rURL;
            }
        }

        header("Location: ".$theURL);
        die();

    }

}

//sort out which ones to display


$showArr = explode(', ',$pensionscheme['data']);

foreach ($showArr as $cur) {
    $pensionschemechk[$cur] = ' checked';
}



$page_title = 'Which armed forces pension scheme(s) are you a member of?';

@endphp



@include('framework.header')


    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
@php
echo $errorMessage;
@endphp
                                <h1 class="govuk-heading-xl">Which armed forces pension scheme(s) are you a member of?</h1>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group {{$pensionscheme['error']}}">
    <fieldset class="govuk-fieldset" aria-describedby="contact-hint">
@php echo $pensionscheme['errorLabel']; @endphp
                <div id="contact-hint" class="govuk-hint">Tick all that apply.</div>

                <div class="govuk-checkboxes" data-module="govuk-checkboxes">
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="615fda2278b0d" name="afcs/about-you/personal-details/pension-scheme/pension-scheme[]" type="checkbox"
           value="1975"     @php echo @$pensionschemechk['1975']; @endphp       >
    <label class="govuk-label govuk-checkboxes__label" for="615fda2278b0d">1975</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="615fda2278fc5" name="afcs/about-you/personal-details/pension-scheme/pension-scheme[]" type="checkbox"
           value="2005"      @php echo @$pensionschemechk['2005']; @endphp       >
    <label class="govuk-label govuk-checkboxes__label" for="615fda2278fc5">2005</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="615fda22790fa" name="afcs/about-you/personal-details/pension-scheme/pension-scheme[]" type="checkbox"
           value="2015"    @php echo @$pensionschemechk['2015']; @endphp         >
    <label class="govuk-label govuk-checkboxes__label" for="615fda22790fa">2015</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="615fda22791f4" name="afcs/about-you/personal-details/pension-scheme/pension-scheme[]" type="checkbox"
           value="None"       @php echo @$pensionschemechk['None']; @endphp      >
    <label class="govuk-label govuk-checkboxes__label" for="615fda22791f4">None</label>
</div>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="615fda227931d" name="afcs/about-you/personal-details/pension-scheme/pension-scheme[]" type="checkbox"
           value="Other"       @php echo @$pensionschemechk['Other']; @endphp      >
    <label class="govuk-label govuk-checkboxes__label" for="615fda227931d">Other</label>
</div>
<p class="govuk-body">or</p>
                            <div class="govuk-checkboxes__item">
        <input class="govuk-checkboxes__input" id="615fda2279456" name="afcs/about-you/personal-details/pension-scheme/pension-scheme[]" type="checkbox"
           value="Dont Know"      @php echo @$pensionschemechk['Dont Know']; @endphp       >
    <label class="govuk-label govuk-checkboxes__label" for="615fda2279456">I don&#039;t Know</label>
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
