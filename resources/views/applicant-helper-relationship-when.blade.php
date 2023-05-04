@include('framework.functions')
@php


//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$whenday = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$whenmonth = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$whenyear = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$dontknow = array('data'=>'', 'error'=>'', 'errorLabel'=>'');






//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);


if (empty($_POST)) {
    //load the data if set
    if (!empty($data['sections']['applicant-who']['helper']['relationship-when'])) {

        if (!empty($data['sections']['applicant-who']['helper']['relationship-when']['whendate'])) {
            $whendate = @$data['sections']['applicant-who']['helper']['relationship-when']['whendate'];
            $whenday['data'] = date('d',strtotime($whendate));
            $whenmonth['data'] = date('m',strtotime($whendate));
            $whenyear['data'] = date('Y',strtotime($whendate));
        }


        if (!empty($data['sections']['applicant-who']['helper']['relationship-when']['dontknow'])) {
            $dontknow['data'] = @$data['sections']['applicant-who']['helper']['relationship-when']['dontknow'];

            if ($dontknow['data'] == 'I dont know') {

                $dontknowchk = ' checked';
            }

        }


    }
} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {


    //set the entered field names








    if ((empty($_POST['dontknow'])) && ( (empty($_POST['date-contacted-year'])) || (empty($_POST['date-contacted-month'])) || (empty($_POST['date-contacted-day'])) ) ) {
        $errors = 'Y';
        $errorsList[] = '<a href="#date-contacted-day">Enter a valid date</a>';
        $whenyear['error'] = 'govuk-form-group--error';
        $whenyear['errorLabel'] =
        '<span id="/applicant/helper-details/helper-name-error" class="govuk-error-message">
            <span class="govuk-visually-hidden">Error:</span> Enter a valid date
         </span>';

    } elseif (empty($_POST['dontknow'])) {

        if (!checkdate($_POST['date-contacted-month'],$_POST['date-contacted-day'],$_POST['date-contacted-year'])) {

            $errors = 'Y';
            $errorsList[] = '<a href="#date-contacted-day">Enter a valid date</a>';
            $whenyear['error'] = 'govuk-form-group--error';
            $whenyear['errorLabel'] =
            '<span id="/applicant/helper-details/helper-name-error" class="govuk-error-message">
                <span class="govuk-visually-hidden">Error:</span> Enter a valid date
             </span>';


        } else {

            $data['sections']['applicant-who']['helper']['relationship-when']['whendate'] = $_POST['date-contacted-year'].'-'.$_POST['date-contacted-month'].'-'.$_POST['date-contacted-day'];
            $data['sections']['applicant-who']['helper']['relationship-when']['dontknow'] = '';

        }

    } else {

        $data['sections']['applicant-who']['helper']['relationship-when']['whendate'] = '';
        $data['sections']['applicant-who']['helper']['relationship-when']['dontknow'] = $_POST['dontknow'];
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

        $theURL = '/applicant/helper/declaration';
        if (!empty($_GET['return'])) {
            if ($rURL = cleanURL($_GET['return'])) {
                $theURL = $rURL;
            }
        }

        header("Location: ".$theURL);
        die();

        }
}


$page_title = 'When did the person you are helping first contact you?';

@endphp




@include('framework.header')


    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
@php
echo $errorMessage;
@endphp

                <form method="post" enctype="multipart/form-data" novalidate>
                @csrf
                   <div class="govuk-form-group {{ $whenyear['error'] }}">
                      <fieldset class="govuk-fieldset" role="group" aria-describedby="date-contacted-hint">
                <legend class="govuk-fieldset__legend govuk-fieldset__legend--l">
                    <h1 class="govuk-heading-xl">When did the person you are helping first contact you?</h1>
                </legend>
                <p class="govuk-body">Date the person you are helping first contacted you about claiming</p>
 @php echo $whenyear['errorLabel']; @endphp
                        <div id="date-contacted-hint" class="govuk-hint">
                          For example, 27 3 2007
                        </div>
                        <div class="govuk-date-input" id="date-contacted">
                          <div class="govuk-date-input__item">
                            <div class="govuk-form-group">

                              <label class="govuk-label govuk-date-input__label" for="date-contacted-day">
                                Day
                              </label>
                              <input class="govuk-input govuk-date-input__input govuk-input--width-2" id="date-contacted-day" name="date-contacted-day" type="text" inputmode="numeric" value="{{$whenday['data'] ?? ''}}">
                            </div>
                          </div>
                          <div class="govuk-date-input__item">
                            <div class="govuk-form-group">
                              <label class="govuk-label govuk-date-input__label" for="date-contacted-month">
                                Month
                              </label>
                              <input class="govuk-input govuk-date-input__input govuk-input--width-2" id="date-contacted-month" name="date-contacted-month" type="text" inputmode="numeric" value="{{$whenmonth['data'] ?? ''}}">
                            </div>
                          </div>
                          <div class="govuk-date-input__item">
                            <div class="govuk-form-group">
                              <label class="govuk-label govuk-date-input__label" for="date-contacted-year">
                                Year
                              </label>
                              <input class="govuk-input govuk-date-input__input govuk-input--width-4" id="date-contacted-year" name="date-contacted-year" type="text" inputmode="numeric" value="{{$whenyear['data'] ?? ''}}">
                            </div>
                          </div>
                        <div class="govuk-checkboxes govuk-!-margin-top-4" data-module="govuk-checkboxes">
                            <div class="govuk-checkboxes__item">
                                <input class="govuk-checkboxes__input" id="dontknow" name="dontknow" type="checkbox" value="I dont know" {{$dontknowchk ?? ''}}>
                                <label class="govuk-label govuk-checkboxes__label" for="dontknow">
                                  I do not know
                                </label>
                            </div>
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
