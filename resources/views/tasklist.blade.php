@include('framework.functions')
@php

$userID = $_SESSION['vets-user'];


    $completed = 0;

    if ($data = getData($userID)) {

        foreach ($data['sections'] as $section) {

            if ($section['completed'] == TRUE) {
                $completed++;
            }

        }
    }







@endphp


@include('framework.header')
@include('framework.backbutton')


    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Apply for an armed forces compensation or war pension payment</h1>
                                <h2 class="govuk-heading-s govuk-!-margin-bottom-2">Application incomplete</h2>
        <p class="govuk-body govuk-!-margin-bottom-7">You have completed {{$completed}} of 13 sections.</p>

        <p class="govuk-body govuk-!-margin-bottom-7">Click on the links below to start a section.  You will return to this page after each one is complete. We recommend working through each section in the order below. You can re-enter a completed section and make changes, providing you have not submitted your application. </p>
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
 @php } else { @endphp

                                 <strong class="govuk-tag govuk-tag--grey app-task-list__tag" id="things-to-know-status">
                                Not started
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
                                <span class="app-task-list__task-name">
                                                                            <a href="/applicant" class="govuk-link"
                                           aria-describedby="eligibility-status">
                                        Who is making this application?
                                    </a>
                                                                    </span>
  @php
  if (!empty($data['sections']['applicant-who']['completed'])) {
  @endphp
                                <strong class="govuk-tag app-task-list__tag" id="applicant-status">COMPLETED</strong>
 @php } else { @endphp
                                 <strong class="govuk-tag govuk-tag--grey app-task-list__tag" id="applicant-status">Not started</strong>
  @php } @endphp

                            </li>
                             <li class="app-task-list__item">
                                <span class="app-task-list__task-name">
                                                                            <a href="/applicant/nominate-a-representative" class="govuk-link"
                                           aria-describedby="eligibility-status">
                                        Do you want to nominate a representative?
                                    </a></span>
   @php
  if (!empty($data['sections']['nominate']['completed'])) {
  @endphp
                                <strong class="govuk-tag app-task-list__tag" id="representative-status">COMPLETED</strong>
   @php } else { @endphp
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
                                <span class="app-task-list__task-name">
                                                                            <a href="/applicant/about-you/name" class="govuk-link"
                                           aria-describedby="eligibility-status">
                                        Personal details
                                    </a>
                                                                    </span>
   @php
  if (!empty($data['sections']['personal-details']['completed'])) {
  @endphp
                                <strong class="govuk-tag app-task-list__tag" id="personal-details-status">Completed</strong>
   @php } else { @endphp
                                <strong class="govuk-tag govuk-tag--grey app-task-list__tag" id="personal-details-status">Not started</strong>
    @php } @endphp
                            </li>
                                                    <li class="app-task-list__item">
                                <span class="app-task-list__task-name">
                                                                            <a href="/applicant/about-you/medical-officer" class="govuk-link"
                                           aria-describedby="eligibility-status">
                                        Medical Officer </a> </span>

   @php
  if (!empty($data['sections']['medical-officer']['completed'])) {
  @endphp
                                <strong class="govuk-tag app-task-list__tag" id="medical-officer-status">COMPLETED</strong>
   @php } else { @endphp

                                 <strong class="govuk-tag govuk-tag--grey app-task-list__tag" id="medical-officer-status">Not started</strong>
     @php } @endphp
                            </li>
                                                    <li class="app-task-list__item">
                                <span class="app-task-list__task-name">
                                                                            <a href="/applicant/about-you/service-details" class="govuk-link"
                                           aria-describedby="eligibility-status">
                                        Service details
                                    </a>
                                                                    </span>
   @php
  if (!empty($data['sections']['service-details']['completed'])) {
  @endphp

                                <strong class="govuk-tag app-task-list__tag" id="service-details-status">Completed</strong>
   @php } else { @endphp
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
                                <span class="app-task-list__task-name">
                                                                            <a href="/applicant/claims" class="govuk-link"
                                           aria-describedby="eligibility-status">
                                        Claim details
                                    </a>
                                                                    </span>

   @php
  if (!empty($data['sections']['claims']['completed'])) {
  @endphp
                                <strong class="govuk-tag app-task-list__tag" id="claim-details-status">COMPLETED</strong>
   @php } else { @endphp
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
                                <span class="app-task-list__task-name">
                                                                            <a href="/applicant/other-details/other-medical-treatment" class="govuk-link"
                                           aria-describedby="eligibility-status">
                                        Other medical treatment
                                    </a>
                                                                    </span>

   @php
  if (!empty($data['sections']['other-medical']['completed'])) {
  @endphp
                                <strong class="govuk-tag app-task-list__tag" id="other-medical-treatment-status">COMPLETED</strong>
   @php } else { @endphp
                                <strong class="govuk-tag govuk-tag--grey app-task-list__tag" id="other-medical-treatment-status">Not started</strong>
@php } @endphp
                            </li>
                                                    <li class="app-task-list__item">
                                <span class="app-task-list__task-name">
                                                                            <a href="/applicant/other-details/other-compensation" class="govuk-link"
                                           aria-describedby="eligibility-status">
                                        Other compensation
                                    </a>
                                                                    </span>
    @php
  if (!empty($data['sections']['other-compensation']['completed'])) {
  @endphp

                                <strong class="govuk-tag app-task-list__tag" id="other-compensation-status">COMPLETED</strong>
    @php } else { @endphp
                                <strong class="govuk-tag govuk-tag--grey app-task-list__tag" id="other-compensation-status">Not started</strong>

@php } @endphp
                            </li>
                                                    <li class="app-task-list__item">
                                <span class="app-task-list__task-name">
                                                                            <a href="/applicant/other-details/benefits" class="govuk-link"
                                           aria-describedby="eligibility-status">
                                        Other benefits, allowances or entitlement
                                    </a>
                                                                    </span>
    @php
  if (!empty($data['sections']['other-benefits']['completed'])) {
  @endphp
                                <strong class="govuk-tag app-task-list__tag" id="other-benefits-status">Completed</strong>
    @php } else { @endphp
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
                                <span class="app-task-list__task-name">
                                                                            <a href="/applicant/payment-details" class="govuk-link"
                                           aria-describedby="eligibility-status">
                                        Payment details
                                    </a>
                                                                    </span>
 @php
  if (!empty($data['sections']['payment-details']['completed'])) {
  @endphp

                                <strong class="govuk-tag app-task-list__tag" id="payment-details-status">Completed</strong>
    @php } else { @endphp

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
                                <span class="app-task-list__task-name">
                                                                            <a href="/applicant/supporting-documents/" class="govuk-link"
                                           aria-describedby="eligibility-status">
                                        Supporting documents
                                    </a>

                                                                    </span>
 @php
  if (!empty($data['sections']['supporting-documents']['completed'])) {
  @endphp


                                <strong class="govuk-tag app-task-list__tag" id="documents-status">COMPLETED</strong>
    @php } else { @endphp
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

if ($completed < 12) {


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
    </main>
</div>
@include('framework.footer')
