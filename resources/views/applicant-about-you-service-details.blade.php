@php



@endphp




@include('framework.header')



    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Service details</h1>
                                <p class="govuk-body">We need to know about each period of service you have had in HM Armed Forces.  A period of service is defined as a term of service between enlistment and discharge within one service type. </p>
                               <p class="govuk-body">If you have had more than one period of service, or changed service branch for example from Royal Navy to Army, please tell us about each period separately.</p>
                               <p class="govuk-body">You can add more than one period of service in this section. </p>


                <div class="govuk-form-group govuk-!-margin-top-4">
            <a class="govuk-button" href="/applicant/about-you/service-details/add-service/name">
                Add a period of service
            </a>
            <br>
            <a class="govuk-link" href="/tasklist">Return to Task List</a>
        </div>
            </div>
        </div>
    </main>
</div>




@include('framework.footer')
