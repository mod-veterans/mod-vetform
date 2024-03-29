@include('framework.functions')
@php


    $userID = $_SESSION['vets-user'];
    $data = getData($userID);


if (!empty($_POST)) {

    $data['sections']['applicant-who']['completed'] = TRUE;

    storeData($userID,$data);

    header("Location: /tasklist");
    die();
}

$page_title = 'Check your answers';

@endphp


@include('framework.header')


    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <legend class="govuk-fieldset__legend govuk-fieldset__legend--l">
                                <h1 class="govuk-heading-xl">Check your answers</h1>
                                </legend>
                                <h2 class="govuk-heading-m">Who is making this application?</h2>
        <dl class="govuk-summary-list govuk-!-margin-bottom-9">
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Who is making this application?</dt>
            <dd class="govuk-summary-list__value">
                                    {{@$data['sections']['applicant-who']['who is making this application']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/?return=/applicant/legal-authority/check-answers&amp;stack=#/applicant/applicant-selection/nominated-applicant">Change<span
                        class="govuk-visually-hidden"> Who is making this application?</span></a>
            </dd>
        </div>

        @if(!empty($data['sections']['applicant-who']['legal-authority']['epaw']['served']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Have you ever served in or supported the Special Forces?
</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['applicant-who']['legal-authority']['epaw']['served']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/legal-authority/epaw/?return=/applicant/legal-authority/check-answers">Change<span
                        class="govuk-visually-hidden"> PExpress Prior Authority in Writing (EPAW) reference</span></a>
            </dd>
        </div>
        @endif
         @if(!empty($data['sections']['applicant-who']['legal-authority']['epaw']['epaw-reference-1']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">EPAW reference number</dt>
            <dd class="govuk-summary-list__value">
                                    {{$data['sections']['applicant-who']['legal-authority']['epaw']['epaw-reference-1']}} - {{$data['sections']['applicant-who']['legal-authority']['epaw']['epaw-reference-2']}} / {{$data['sections']['applicant-who']['legal-authority']['epaw']['epaw-reference-3']}} / {{$data['sections']['applicant-who']['legal-authority']['epaw']['epaw-reference-4']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/legal-authority/epaw?return=/applicant/legal-authority/check-answers">Change<span
                        class="govuk-visually-hidden">EPAW reference number</span></a>
            </dd>
        </div>
        @endif

    @if(!empty($data['sections']['applicant-who']['legal authority']['fullname']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Your full name</dt>
            <dd class="govuk-summary-list__value">
                                    {{@$data['sections']['applicant-who']['legal authority']['fullname']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/legal-authority/?return=/applicant/legal-authority/check-answers&amp;stack=#/applicant/nominee-address/nominee-name">Change<span
                        class="govuk-visually-hidden"> Your full name</span></a>
            </dd>
        </div>

    @endif
    @if(!empty($data['sections']['applicant-who']['legal authority']['address1']))

            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Building and street</dt>
            <dd class="govuk-summary-list__value">
                                    {{@$data['sections']['applicant-who']['legal authority']['address1']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/legal-authority/?return=/applicant/legal-authority/check-answers&amp;stack=#/applicant/nominee-address/address-line-1">Change<span
                        class="govuk-visually-hidden"> Building and street</span></a>
            </dd>
        </div>
    @endif
    @if(!empty($data['sections']['applicant-who']['legal authority']['address2']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Building and street line 2 of 2</dt>
            <dd class="govuk-summary-list__value">
                                    {{@$data['sections']['applicant-who']['legal authority']['address2']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/legal-authority/?return=/applicant/legal-authority/check-answers&amp;stack=#/applicant/nominee-address/address-line-2">Change<span
                        class="govuk-visually-hidden"> Building and street line 2 of 2</span></a>
            </dd>
        </div>
    @endif
    @if(!empty($data['sections']['applicant-who']['legal authority']['town']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Town or city</dt>
            <dd class="govuk-summary-list__value">
                                    {{@$data['sections']['applicant-who']['legal authority']['town']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/legal-authority/?return=/applicant/legal-authority/check-answers&amp;stack=#/applicant/nominee-address/town">Change<span
                        class="govuk-visually-hidden"> Town or city</span></a>
            </dd>
        </div>

    @endif
    @if(!empty($data['sections']['applicant-who']['legal authority']['county']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">County</dt>
            <dd class="govuk-summary-list__value">
                                    {{@$data['sections']['applicant-who']['legal authority']['county']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/legal-authority/?return=/applicant/legal-authority/check-answers&amp;stack=#/applicant/nominee-address/county">Change<span
                        class="govuk-visually-hidden"> County</span></a>
            </dd>
        </div>
    @endif
    @if(!empty($data['sections']['applicant-who']['legal authority']['country']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Country</dt>
            <dd class="govuk-summary-list__value">
                                    {{@$data['sections']['applicant-who']['legal authority']['country']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/legal-authority/?return=/applicant/legal-authority/check-answers&amp;stack=#/applicant/nominee-address/country">Change<span
                        class="govuk-visually-hidden"> Country</span></a>
            </dd>
        </div>
    @endif
    @if(!empty($data['sections']['applicant-who']['legal authority']['postcode']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Postcode</dt>
            <dd class="govuk-summary-list__value">
                                    {{@$data['sections']['applicant-who']['legal authority']['postcode']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/legal-authority/?return=/applicant/legal-authority/check-answers&amp;stack=#/applicant/nominee-address/postcode">Change<span
                        class="govuk-visually-hidden"> Postcode</span></a>
            </dd>
        </div>
    @endif
    @if(!empty($data['sections']['applicant-who']['legal authority']['nominee-number']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Telephone number</dt>
            <dd class="govuk-summary-list__value">
                                    {{@$data['sections']['applicant-who']['legal authority']['nominee-number']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/legal-authority/?return=/applicant/legal-authority/check-answers&amp;stack=#/applicant/nominee-address/nominee-number">Change<span
                        class="govuk-visually-hidden"> Telephone number</span></a>
            </dd>
        </div>
    @endif

    @if(!empty($data['sections']['applicant-who']['legal-authority']['havelpa']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Do you have an LPA Access Code?</dt>
            <dd class="govuk-summary-list__value">
                                    {{@$data['sections']['applicant-who']['legal-authority']['havelpa']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/legal-authority/have-lpa?return=/applicant/legal-authority/check-answers&amp;stack=#afcs/about-you/personal-details/have-lpa-code">Change<span
                        class="govuk-visually-hidden"> Do you have an LPA Access Code?</span></a>
            </dd>
        </div>
    @endif

    @if(!empty($data['sections']['applicant-who']['legal-authority']['lpacode']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">LPA Access Code</dt>
            <dd class="govuk-summary-list__value">
                                    {{@$data['sections']['applicant-who']['legal-authority']['lpacode']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/legal-authority/lpa?return=/applicant/legal-authority/check-answers&amp;stack=#afcs/about-you/personal-details/hlpacode">Change<span
                        class="govuk-visually-hidden">LPA Access Code</span></a>
            </dd>
        </div>
    @endif








    @if(!empty($data['sections']['applicant-who']['legal authority']['details']))
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">What legal authority do you have to make a claim on behalf of the person named?</dt>
            <dd class="govuk-summary-list__value">
                                    {{@$data['sections']['applicant-who']['legal authority']['details']}}
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="/applicant/legal-authority/authority-detail/?return=/applicant/legal-authority/check-answers&amp;stack=#/applicant/nominee-details/nominee-details">Change<span
                        class="govuk-visually-hidden"> What legal authority do you have to make a claim on behalf of the person named?</span></a>
            </dd>
        </div>
    @endif
    </dl>

    <form method="post" enctype="multipart/form-data" novalidate>
    @csrf
        <div class="govuk-form-group">
            <button class="govuk-button govuk-!-margin-right-2" data-module="govuk-button">Continue</button>
        </div>
    </form>


            </div>
        </div>
    </main>
</div>


@include('framework.footer')
