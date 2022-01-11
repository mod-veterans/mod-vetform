@include('framework.functions')
@php

//error handling setup
$errorMessage = '';
$errors = 'N';
$errorsList = array();
$count = '';
//set fields
$claim = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$claimList = '';


    $userID = $_SESSION['vets-user'];
    $data = getData($userID);


/////////////////////////
//STACK / RECORD HANDLING
/////////////////////////


    if ( (!empty($_GET['delRecord'])) && (is_numeric($_GET['delRecord'])) ) {
        //lets delete the record
        unset($data['sections']['claims']['records'][$_GET['delRecord']]);
        storeData($userID,$data);
    }

    //are there already claim records?

    if (!empty($data['sections']['claims']['records'])) {

        $nother = 'nother';

        $count = 0;
        $claimList = '';
        foreach ($data['sections']['claims']['records'] as $k=>$curClaim) {
        $count++;

            $claimList .='
            <div>
             <dt class="govuk-summary-list__value">
                            Claim '.$count.'
            </dt>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link govuk-warning govuk-!-margin-right-5" href="/applicant/claims?delRecord='.$k.'">Delete<span class="govuk-visually-hidden"> name</span>
                </a>
                <a class="govuk-link" href="/applicant/claims/type?claimrecord='.$k.'">
                    Change<span class="govuk-visually-hidden"> name</span>
                </a>
            </dd>
            </div>



            ';



        }

        $lastRecID = ($k + 1);


    } else {

        //no claim records yet, lets set the first one up

        $data['settings']['claim-record-num'] = 1;
        $lastRecID = 1;
        //store our changes

        storeData($userID,$data);

    }


/////////////////////////////
//END STACK / RECORD HANDLING
/////////////////////////////


@endphp



@include('framework.header')

@include('framework.backbutton')


    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Claim details</h1>
                                <p class="govuk-body">
                                                                        This form allows you to make multiple claims based on individual injuries, illnesses or conditions that have occured at different points in time as a result of your service.
                                                                </p>
                                                                                                                                    <p class="govuk-body">
                                                                        For a specific accident or incident you can add all of the injuries and conditions sustained in a single claim.
                                                                </p>

                         <dl class="govuk-summary-list">
@php
echo $claimList;
@endphp

                            </dl>


                <div class="govuk-form-group govuk-!-margin-top-4">
            <a class="govuk-button" href="/applicant/claims/type?claimrecord={{$lastRecID}}">
                Add a{{$nother ?? ''}} claim
            </a>
            <br>
             or
             <br /><br />
            <a class="govuk-button" href="/tasklist">Save and Continue</a>
        </div>
            </div>
        </div>
    </main>
</div>








@include('framework.footer')
