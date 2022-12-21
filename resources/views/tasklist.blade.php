@include('framework.functions')
@php

houseKeeping();

$userID = $_SESSION['vets-user'];


    $completed = 0;
    $canSkip = 'N';


$appstage = getenv('APP_STAGE');

if ( ($appstage == 'PROD') || ($appstage == 'UAT') ) {

$needComplete = 11;

} else {
$needComplete = '1';
$canSkip = 'Y';
}



if ($data = getData($userID)) {


    //what time did we start this application?
    if (empty($data['settings']['time_started'])) {
        $data['settings']['time_started'] = date('Y-m-d H:i:s');
        $data['settings']['url-used'] = $_SERVER['SERVER_NAME'];
        storeData($userID,$data);
    }

    if (!empty($data['sections'])) {

        foreach ($data['sections'] as $section) {

            if ( (!empty($section['completed'])) &&  ($section['completed'] == TRUE) ) {
                $completed++;
            }

        }
    }

}

$page_title = 'Tasklist';
@endphp


@include('framework.header')
@include('framework.backbutton')


    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Apply for Armed Forces Compensation or a War Pension </h1>
                                <h2 class="govuk-heading-s govuk-!-margin-bottom-2">Application incomplete</h2>

  <div class="govuk-inset-text">
  If you’ve already started an application and it’s not displaying below, you may be able to <a href="/retrieve-application">return to a saved application</a>
</div>

        <p class="govuk-body govuk-!-margin-bottom-7">You have completed {{$completed}} of 13 sections.</p>



        <p class="govuk-body">
            Select the links below to start a section.
        </p>
        <p class="govuk-body">
            You can go back and make changes to sections marked ‘completed’.
        </p>

        <p class="govuk-body">If you decide not to continue, you can <a href="/cancel">cancel your application</a>.  This will delete all data entered.</p>

@php
if (!empty($data['settings']['sacbl'])) {

@endphp
<p class="govuk-body">
If you need a break, you can <a href="/save-and-come-back-later">save and come back later</a>.
</p>
@php
}
@endphp



        <ol class="app-task-list">
                            <li>
                    <h2 class="app-task-list__section">
                        <span class="app-task-list__section-number">1. </span>
                        Check before you start
                    </h2>
                    <ul class="app-task-list__items">
                                                    <li class="app-task-list__item">
                                <span class="app-task-list__task-name">
                                                                            <a href="/things-to-know" class="govuk-link"
                                           aria-describedby="eligibility-status">
                                        Things to know before you start
                                    </a>
                                </span>
  @php
  if (!empty($data['sections']['things-to-know']['completed'])) {
  @endphp
                                <strong class="govuk-tag app-task-list__tag" id="things-to-know-status">
                                COMPLETED
                                </strong>
 @php } elseif (!empty($data['sections']['things-to-know']))  { @endphp

                                 <strong class="govuk-tag govuk-tag--blue app-task-list__tag" id="things-to-know-status">
                                IN PROGRESS
                                </strong>

 @php } else { @endphp


                                 <strong class="govuk-tag govuk-tag--grey app-task-list__tag" id="things-to-know-status">
                                NOT STARTED
                                </strong>
 @php } @endphp



                            </li>
                                            </ul>
                </li>
                            <li>
                    <h2 class="app-task-list__section">
                        <span class="app-task-list__section-number">2. </span>
                        Who is making this application?
                    </h2>
                    <ul class="app-task-list__items">




                                                    <li class="app-task-list__item">

  @php

  if (($canSkip != 'Y')&&(empty($data['sections']['things-to-know']['completed']))) {
  @endphp
                                <span class="app-task-list__task-name">
                                    Who is making this application?
                                </span>
                                <strong class="govuk-tag govuk-tag--grey app-task-list__tag" id="applicant-status">CANNOT START YET</strong>

 @php } elseif (!empty($data['sections']['applicant-who']['completed'])) {
  @endphp
                                <span class="app-task-list__task-name">
                                 <a href="/applicant" class="govuk-link" aria-describedby="eligibility-status">
                                    Who is making this application?
                                    </a>
                                </span>
                                <strong class="govuk-tag app-task-list__tag" id="applicant-status">COMPLETED</strong>
 @php } elseif (!empty($data['sections']['applicant-who'])) { @endphp
                                 <span class="app-task-list__task-name">
                                 <a href="/applicant" class="govuk-link" aria-describedby="eligibility-status">
                                    Who is making this application?
                                    </a>
                                </span>
                                 <strong class="govuk-tag govuk-tag--blue app-task-list__tag" id="applicant-status">IN PROGRESS</strong>
  @php } else { @endphp
                                <span class="app-task-list__task-name">
                                 <a href="/applicant" class="govuk-link" aria-describedby="eligibility-status">
                                    Who is making this application?
                                    </a>
                                </span>
                                 <strong class="govuk-tag govuk-tag--grey app-task-list__tag" id="applicant-status">NOT STARTED</strong>
  @php } @endphp
                            </li>
                             <li class="app-task-list__item">

@php
  if (($canSkip != 'Y')&&(empty($data['sections']['applicant-who']['completed']))) {
  @endphp
                                 <span class="app-task-list__task-name">
                                     Nominating a representative
                                </span>
                                <strong class="govuk-tag govuk-tag--grey app-task-list__tag" id="representative-status">CANNOT START YET</strong>
   @php } elseif (!empty($data['sections']['nominate-representative']['completed'])) {
  @endphp
                                <span class="app-task-list__task-name">
                                    <a href="/applicant/nominate-a-representative" class="govuk-link" aria-describedby="eligibility-status">
                                     Nominating a representative
                                    </a>
                                </span>
                                <strong class="govuk-tag app-task-list__tag" id="representative-status">COMPLETED</strong>
   @php } elseif (!empty($data['sections']['nominate-representative'])) {
   @endphp
                                <span class="app-task-list__task-name">
                                    <a href="/applicant/nominate-a-representative" class="govuk-link" aria-describedby="eligibility-status">
                                     Nominating a representative
                                    </a>
                                </span>
                                <strong class="govuk-tag govuk-tag--blue app-task-list__tag" id="representative-status">IN PROGRESS</strong>
  @php } else { @endphp
                                <span class="app-task-list__task-name">
                                    <a href="/applicant/nominate-a-representative" class="govuk-link" aria-describedby="eligibility-status">
                                     Nominating a representative
                                    </a>
                                </span>
                                <strong class="govuk-tag govuk-tag--grey app-task-list__tag" id="representative-status">Not started</strong>
@php } @endphp

                            </li>
                                            </ul>
                </li>
                            <li>
                    <h2 class="app-task-list__section">
                        <span class="app-task-list__section-number">3. </span>
                        About you
                    </h2>
                    <ul class="app-task-list__items">
                                                    <li class="app-task-list__item">






@php
if (($canSkip != 'Y')&&(empty($data['sections']['nominate-representative']['completed']))) { @endphp
                                <span class="app-task-list__task-name">

                                    Personal details

                                </span>
<strong class="govuk-tag govuk-tag--grey app-task-list__tag" id="personal-details-status">CANNOT START YET</strong>

   @php
  } elseif (!empty($data['sections']['about-you']['completed'])) {
  @endphp
                                 <span class="app-task-list__task-name">
                                <a href="/applicant/about-you/name" class="govuk-link" aria-describedby="eligibility-status">
                                    Personal details
                                </a>
                                </span>
                                <strong class="govuk-tag app-task-list__tag" id="personal-details-status">Completed</strong>
   @php } elseif (!empty($data['sections']['about-you'])) { @endphp
                                <span class="app-task-list__task-name">
                                <a href="/applicant/about-you/name" class="govuk-link" aria-describedby="eligibility-status">
                                    Personal details
                                </a>
                                </span>
                                <strong class="govuk-tag govuk-tag--blue app-task-list__tag" id="personal-details-status">in progress</strong>
    @php } else { @endphp
                                <span class="app-task-list__task-name">
                                <a href="/applicant/about-you/name" class="govuk-link" aria-describedby="eligibility-status">
                                    Personal details
                                </a>
                                </span>
  <strong class="govuk-tag govuk-tag--grey app-task-list__tag" id="personal-details-status">Not started</strong>

  @php } @endphp
                            </li>








                                                    <li class="app-task-list__item">

   @php
   if (($canSkip != 'Y')&&(empty($data['sections']['about-you']['completed']))) {
  @endphp

                                <span class="app-task-list__task-name">

                                     Doctor's details

                                </span>
                                <strong class="govuk-tag govuk-tag--grey app-task-list__tag" id="medical-officer-status">cannot start yet</strong>



   @php
  } elseif (!empty($data['sections']['about-you']['medical-officer']['completed'])) {
  @endphp
                                <span class="app-task-list__task-name">
                                <a href="/applicant/about-you/medical-officer" class="govuk-link" aria-describedby="eligibility-status">
                                     Doctor's details
                                </a>
                                </span>
                                <strong class="govuk-tag app-task-list__tag" id="medical-officer-status">COMPLETED</strong>

   @php } elseif (!empty($data['sections']['about-you']['medical-officer'])) {
  @endphp
                                <span class="app-task-list__task-name">
                                <a href="/applicant/about-you/medical-officer" class="govuk-link" aria-describedby="eligibility-status">
                                     Doctor's details
                                </a>
                                </span>
                                <strong class="govuk-tag govuk-tag--blue app-task-list__tag" id="medical-officer-status">in progress</strong>
   @php } else { @endphp
                                <span class="app-task-list__task-name">
                                <a href="/applicant/about-you/medical-officer" class="govuk-link" aria-describedby="eligibility-status">
                                     Doctor's details
                                </a>
                                </span>
                                 <strong class="govuk-tag govuk-tag--grey app-task-list__tag" id="medical-officer-status">Not started</strong>
     @php } @endphp
                            </li>







                                                    <li class="app-task-list__item">

    @php
   if (($canSkip != 'Y')&&(empty($data['sections']['about-you']['completed']))) {
  @endphp

                                <span class="app-task-list__task-name">

                                Service details

                                </span>
                                <strong class="govuk-tag govuk-tag--grey app-task-list__tag" id="service-details-status">cannot start yet</strong>

   @php
  } elseif (!empty($data['sections']['service-details']['completed'])) {
  @endphp
                                <span class="app-task-list__task-name">
                                <a href="/applicant/about-you/service-details" class="govuk-link" aria-describedby="eligibility-status">
                                Service details
                                </a>
                                </span>
                                <strong class="govuk-tag app-task-list__tag" id="service-details-status">Completed</strong>

   @php } elseif (!empty($data['sections']['service-details'])) {
  @endphp
                                <span class="app-task-list__task-name">
                                <a href="/applicant/about-you/service-details" class="govuk-link" aria-describedby="eligibility-status">
                                Service details
                                </a>
                                </span>
                                <strong class="govuk-tag govuk-tag--blue app-task-list__tag" id="service-details-status">in progress</strong>
   @php } else { @endphp
                                <span class="app-task-list__task-name">
                                <a href="/applicant/about-you/service-details" class="govuk-link" aria-describedby="eligibility-status">
                                Service details
                                </a>
                                </span>
                                <strong class="govuk-tag govuk-tag--grey app-task-list__tag" id="service-details-status">Not started</strong>
@php } @endphp

                            </li>
                                            </ul>
                </li>



                            <li>
                    <h2 class="app-task-list__section">
                        <span class="app-task-list__section-number">4. </span>
                        Your claim
                    </h2>
                    <ul class="app-task-list__items">
                                                    <li class="app-task-list__item">


@php
   if (($canSkip != 'Y')&&(empty($data['sections']['about-you']['completed']))) {
@endphp



                                <span class="app-task-list__task-name">
                                Claim details
                                </span>
                                <strong class="govuk-tag govuk-tag--grey app-task-list__tag" id="claim-details-status">cannot start yet</strong>

   @php
  } elseif (!empty($data['sections']['claims']['completed'])) {
  @endphp
                                <span class="app-task-list__task-name">
                                <a href="/applicant/claims" class="govuk-link" aria-describedby="eligibility-status">
                                Claim details
                                </a>
                                </span>
                                <strong class="govuk-tag app-task-list__tag" id="claim-details-status">COMPLETED</strong>

   @php } elseif (!empty($data['sections']['claims'])) {
  @endphp
                                <span class="app-task-list__task-name">
                                <a href="/applicant/claims" class="govuk-link" aria-describedby="eligibility-status">
                                Claim details
                                </a>
                                </span>
                                <strong class="govuk-tag govuk-tag--blue app-task-list__tag" id="claim-details-status">in progress</strong>
   @php } else { @endphp
                                <span class="app-task-list__task-name">
                                <a href="/applicant/claims" class="govuk-link" aria-describedby="eligibility-status">
                                Claim details
                                </a>
                                </span>
                                <strong class="govuk-tag govuk-tag--grey app-task-list__tag" id="claim-details-status">Not started</strong>

@php } @endphp
                            </li>
                                            </ul>
                </li>
                            <li>
                    <h2 class="app-task-list__section">
                        <span class="app-task-list__section-number">5. </span>
                        Other details
                    </h2>
                    <ul class="app-task-list__items">

                                                    <li class="app-task-list__item">

   @php
   if (($canSkip != 'Y')&&(empty($data['sections']['about-you']['completed']))) {
  @endphp


                                <span class="app-task-list__task-name">

                                Other medical treatment

                                </span>
<strong class="govuk-tag govuk-tag--grey app-task-list__tag" id="other-medical-treatment-status">cannot start yet</strong>




   @php
  } elseif (!empty($data['sections']['other-medical']['completed'])) {
  @endphp
                                <span class="app-task-list__task-name">
                                <a href="/applicant/other-details/other-medical-treatment" class="govuk-link" aria-describedby="eligibility-status">
                                Other medical treatment
                                 </a>
                                </span>
                                <strong class="govuk-tag app-task-list__tag" id="other-medical-treatment-status">COMPLETED</strong>
   @php } elseif (!empty($data['sections']['other-medical'])) {
  @endphp
                                <span class="app-task-list__task-name">
                                <a href="/applicant/other-details/other-medical-treatment" class="govuk-link" aria-describedby="eligibility-status">
                                Other medical treatment
                                 </a>
                                </span>
                                <strong class="govuk-tag govuk-tag--blue app-task-list__tag" id="other-medical-treatment-status">IN PROGRESS</strong>
   @php } else { @endphp
                                <span class="app-task-list__task-name">
                                <a href="/applicant/other-details/other-medical-treatment" class="govuk-link" aria-describedby="eligibility-status">
                                Other medical treatment
                                 </a>
                                </span>
                                <strong class="govuk-tag govuk-tag--grey app-task-list__tag" id="other-medical-treatment-status">Not started</strong>
@php } @endphp
                            </li>
                                                    <li class="app-task-list__item">


   @php
   if (($canSkip != 'Y')&&(empty($data['sections']['about-you']['completed']))) {
  @endphp




                                <span class="app-task-list__task-name">
                                 Other compensation
                                 </span>
                                <strong class="govuk-tag govuk-tag--grey app-task-list__tag" id="other-compensation-status">CANNOT START YET</strong>

    @php
  } elseif (!empty($data['sections']['other-compensation']['completed'])) {
  @endphp

                                <span class="app-task-list__task-name">
                                <a href="/applicant/other-details/other-compensation" class="govuk-link" aria-describedby="eligibility-status">
                                 Other compensation
                                 </a>
                                 </span>
                                <strong class="govuk-tag app-task-list__tag" id="other-compensation-status">COMPLETED</strong>
    @php } elseif (!empty($data['sections']['other-compensation'])) {
  @endphp

                                <span class="app-task-list__task-name">
                                <a href="/applicant/other-details/other-compensation" class="govuk-link" aria-describedby="eligibility-status">
                                 Other compensation
                                 </a>
                                 </span>
                                <strong class="govuk-tag govuk-tag--blue app-task-list__tag" id="other-compensation-status">in progress</strong>
    @php } else { @endphp
                                <span class="app-task-list__task-name">
                                <a href="/applicant/other-details/other-compensation" class="govuk-link" aria-describedby="eligibility-status">
                                 Other compensation
                                 </a>
                                 </span>
                                <strong class="govuk-tag govuk-tag--grey app-task-list__tag" id="other-compensation-status">Not started</strong>

@php } @endphp
                            </li>
                                                    <li class="app-task-list__item">

   @php
   if (($canSkip != 'Y')&&(empty($data['sections']['about-you']['completed']))) {
  @endphp

                                <span class="app-task-list__task-name">

                                Other benefits, allowances or entitlement

                                 </span>
                                <strong class="govuk-tag govuk-tag--grey app-task-list__tag" id="other-benefits-status">cannot start yet</strong>


    @php
  } elseif (!empty($data['sections']['other-benefits']['completed'])) {
  @endphp
                                <span class="app-task-list__task-name">
                               <a href="/applicant/other-details/benefits" class="govuk-link" aria-describedby="eligibility-status">
                                Other benefits, allowances or entitlement
                                 </a>
                                 </span>
                                <strong class="govuk-tag app-task-list__tag" id="other-benefits-status">Completed</strong>
    @php } elseif (!empty($data['sections']['other-benefits'])) {
  @endphp
                                <span class="app-task-list__task-name">
                               <a href="/applicant/other-details/benefits" class="govuk-link" aria-describedby="eligibility-status">
                                Other benefits, allowances or entitlement
                                 </a>
                                 </span>
                                <strong class="govuk-tag govuk-tag--blue app-task-list__tag" id="other-benefits-status">in progress</strong>
    @php } else { @endphp
                                <span class="app-task-list__task-name">
                               <a href="/applicant/other-details/benefits" class="govuk-link" aria-describedby="eligibility-status">
                                Other benefits, allowances or entitlement
                                 </a>
                                 </span>
                                <strong class="govuk-tag govuk-tag--grey app-task-list__tag" id="other-benefits-status">Not started</strong>
 @php } @endphp

                            </li>
                                            </ul>
                </li>
                            <li>
                    <h2 class="app-task-list__section">
                        <span class="app-task-list__section-number">6. </span>
                        Your payment details
                    </h2>
                    <ul class="app-task-list__items">
                                                    <li class="app-task-list__item">

   @php
   if (($canSkip != 'Y')&&(empty($data['sections']['about-you']['completed']))) {
  @endphp

                                <span class="app-task-list__task-name">

                                 Payment details

                                 </span>

                                <strong class="govuk-tag govuk-tag--grey app-task-list__tag" id="payment-details-status">cannot start yet</strong>

 @php
  } elseif (!empty($data['sections']['payment-details']['completed'])) {
  @endphp
                                <span class="app-task-list__task-name">
                                <a href="/applicant/payment-details" class="govuk-link" aria-describedby="eligibility-status">
                                 Payment details
                                </a>
                                 </span>

                                <strong class="govuk-tag app-task-list__tag" id="payment-details-status">Completed</strong>
    @php } elseif (!empty($data['sections']['payment-details'])) {
  @endphp
                                <span class="app-task-list__task-name">
                                <a href="/applicant/payment-details" class="govuk-link" aria-describedby="eligibility-status">
                                 Payment details
                                </a>
                                 </span>

                                <strong class="govuk-tag govuk-tag--blue app-task-list__tag" id="payment-details-status">in progress</strong>
    @php } else { @endphp

                                <span class="app-task-list__task-name">
                                <a href="/applicant/payment-details" class="govuk-link" aria-describedby="eligibility-status">
                                 Payment details
                                </a>
                                 </span>
                                <strong class="govuk-tag govuk-tag--grey app-task-list__tag" id="payment-details-status">Not started</strong>
 @php } @endphp
                            </li>
                                            </ul>
                </li>
                            <li>
                    <h2 class="app-task-list__section">
                        <span class="app-task-list__section-number">7. </span>
                        Supporting documents
                    </h2>
                    <ul class="app-task-list__items">
                                                    <li class="app-task-list__item">

   @php
   if (($canSkip != 'Y')&&(empty($data['sections']['about-you']['completed']))) {
  @endphp
                                <span class="app-task-list__task-name">

                                 Supporting documents

                                 </span>
                                <strong class="govuk-tag govuk-tag--grey app-task-list__tag" id="documents-status">cannot start yet</strong>

 @php
  } elseif (!empty($data['sections']['supporting-documents']['completed'])) {
  @endphp

                                <span class="app-task-list__task-name">
                                 <a href="/applicant/supporting-documents/" class="govuk-link" aria-describedby="eligibility-status">
                                 Supporting documents
                                 </a>
                                 </span>
                                <strong class="govuk-tag app-task-list__tag" id="documents-status">COMPLETED</strong>
    @php } elseif (!empty($data['sections']['supporting-documents']['completed'])) {
  @endphp

                                <span class="app-task-list__task-name">
                                 <a href="/applicant/supporting-documents/" class="govuk-link" aria-describedby="eligibility-status">
                                 Supporting documents
                                 </a>
                                 </span>
                                <strong class="govuk-tag govuk-tag--blue app-task-list__tag" id="documents-status">in progress</strong>
    @php }  else { @endphp
                                <span class="app-task-list__task-name">
                                 <a href="/applicant/supporting-documents/" class="govuk-link" aria-describedby="eligibility-status">
                                 Supporting documents
                                 </a>
                                 </span>
                                <strong class="govuk-tag govuk-tag--grey app-task-list__tag" id="documents-status">Not started</strong>
 @php } @endphp
                            </li>
                                            </ul>
                </li>
                            <li>
                    <h2 class="app-task-list__section">
                        <span class="app-task-list__section-number">8. </span>
                        Declaration and application submission
                    </h2>
                    <ul class="app-task-list__items">

@php

if ($completed < $needComplete) {


@endphp

<li class="app-task-list__item">
    <span class="app-task-list__task-name">
        Complete your application
    </span>

    <strong class="govuk-tag govuk-tag--grey app-task-list__tag" id="declaration-status">Cannot start yet</strong>

</li>

@php
} else {
@endphp

<li class="app-task-list__item">
    <span class="app-task-list__task-name">
        <a href="/applicant/declaration" class="govuk-link" aria-describedby="eligibility-status"> Complete your application</a>
    </span>

    <strong class="govuk-tag govuk-tag--grey app-task-list__tag" id="declaration-status">Not started</strong>

</li>

@php
}
@endphp



                                            </ul>
                </li>
                    </ol>
            </div>
        </div>
@php
if (!empty($data['settings']['sacbl'])) {

@endphp

<a href="/save-and-come-back-later" class="govuk-link" data-module="govuk-button">Save and come back later</a>
@php
}
@endphp
    </main>
</div>
@include('framework.footer')
