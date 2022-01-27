@include('framework.functions')
@php


    $userID = $_SESSION['vets-user'];
    $data = getData($userID);





    if ( (!empty($_GET['delRecord'])) && (is_numeric($_GET['delRecord'])) ) {

    //lets delete the record
    unset($data['sections']['service-details']['records'][$_GET['delRecord']]);
    storeData($userID,$data);




    }



    //are there already service records?

    if (!empty($data['sections']['service-details']['records'])) {


        $serviceList = '';
        foreach ($data['sections']['service-details']['records'] as $k=>$curService) {


            $serviceList .='
            <div>
             <dt class="govuk-summary-list__value">
                            '.@$curService['servicebranch'].'
            </dt>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link govuk-warning govuk-!-margin-right-5" href="/applicant/about-you/service-details?delRecord='.$k.'">Delete<span class="govuk-visually-hidden"> name</span>
                </a>
                <a class="govuk-link" href="/applicant/about-you/service-details/add-service/name?servicerecord='.$k.'">
                    Change<span class="govuk-visually-hidden"> name</span>
                </a>
            </dd>
            </div>



            ';



        }

        $lastRecID = ($k + 1);


    } else {

        //no service records yet, lets set the first one up

        $data['settings']['service-details-record-num'] = 1;
        $lastRecID = 1;
        //store our changes

        storeData($userID,$data);

    }





@endphp




@include('framework.header')



    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">

@if(!empty($serviceList))
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Service details</h1>
                                <dl class="govuk-summary-list">
                                    <div class="govuk-summary-list__row">
                        @php echo $serviceList; @endphp
                    </div>
                            </dl>

                <div class="govuk-form-group govuk-!-margin-top-4">
            <a class="govuk-button" href="/applicant/about-you/service-details/add-service/name?servicerecord={{$lastRecID}}">
                Add a period of service
            </a>
            <br>
            <a class="govuk-link" href="/tasklist">Return to Task List</a>
        </div>
            </div>
        </div>
@else



        <div class="govuk-grid-row">

            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Service details</h1>
                                <p class="govuk-body">We need to know about each period of service you have had in HM Armed Forces.</p>
<p class="govuk-body">If you have had more than one period of service, or changed service branch for example from Royal Navy to Army, please tell us about each period separately.</p>
<p class="govuk-body">You can add more than one period of service in this section.</p>
</p>


                <div class="govuk-form-group govuk-!-margin-top-4">
            <a class="govuk-button" href="/applicant/about-you/service-details/add-service/name">
                Add a period of service
            </a>
            <br>
            <a class="govuk-link" href="/tasklist">Return to Task List</a>
        </div>
            </div>
        </div>
@endif


    </main>
</div>




@include('framework.footer')
