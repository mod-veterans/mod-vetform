@include('framework.functions')
@php

if (!empty($_POST)) {
    $userID = $_SESSION['vets-user'];
    $data = getData($userID);

    $data['sections']['other-benefits']['completed'] = TRUE;

    storeData($userID,$data);

    header("Location: /tasklist");
    die();
}

@endphp


@include('framework.header')


    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">Check your answers</h1>
                                <h2 class="govuk-heading-m">Other benefits, allowances or entitlement</h2>
        <dl class="govuk-summary-list govuk-!-margin-bottom-9">
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Are you receiving any of the following?</dt>
            <dd class="govuk-summary-list__value">
                                                            Tax credits paid to you or your family<br>
                                                </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="https://modvets-dev2.london.cloudapps.digital/other-details/other-benefits/receiving-other-benefits/?return=summarise&amp;stack=#/other-benefits/receiving-other-benefits/receiving-benefits">Change<span
                        class="govuk-visually-hidden"> Are you receiving any of the following?</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Have you ever been paid any of the following?</dt>
            <dd class="govuk-summary-list__value">
                                    Yes
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="https://modvets-dev2.london.cloudapps.digital/other-details/other-benefits/receiving-payments/?return=summarise&amp;stack=#/other-benefits/receiving-payments/payments">Change<span
                        class="govuk-visually-hidden"> Have you ever been paid any of the following?</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Diffuse Mesothelioma 2014 Scheme</dt>
            <dd class="govuk-summary-list__value">
                                    ijoij
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="https://modvets-dev2.london.cloudapps.digital/other-details/other-benefits/other-payment-dates/?return=summarise&amp;stack=#/other-benefits/other-payment-dates/diffuse-mesothelioma-2014-scheme">Change<span
                        class="govuk-visually-hidden"> Diffuse Mesothelioma 2014 Scheme</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">Diffuse Mesothelioma 2008 Scheme</dt>
            <dd class="govuk-summary-list__value">
                                    ijoj
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="https://modvets-dev2.london.cloudapps.digital/other-details/other-benefits/other-payment-dates/?return=summarise&amp;stack=#/other-benefits/other-payment-dates/diffuse-mesothelioma-2008-scheme">Change<span
                        class="govuk-visually-hidden"> Diffuse Mesothelioma 2008 Scheme</span></a>
            </dd>
        </div>
            <div class="govuk-summary-list__row">
            <dt class="govuk-summary-list__key">The Workers Compensation 1979 Pneumoconiosis Act</dt>
            <dd class="govuk-summary-list__value">
                                    oijoij
                            </dd>
            <dd class="govuk-summary-list__actions">
                <a class="govuk-link" href="https://modvets-dev2.london.cloudapps.digital/other-details/other-benefits/other-payment-dates/?return=summarise&amp;stack=#/other-benefits/other-payment-dates/the-workers-compensation-1979-pneumoconiosis-act">Change<span
                        class="govuk-visually-hidden"> The Workers Compensation 1979 Pneumoconiosis Act</span></a>
            </dd>
        </div>
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
