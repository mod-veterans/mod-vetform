<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



/*

Note: All blades currently accept POST and GET. This should be reviewed as each is wired up to accept appropriate inputs only.

*/



Route::get('/', function () {
    return view('home');
});


Route::match(['get', 'post'],'/restore-application', function () {
    return view('restore');
});

Route::match(['get', 'post'],'/things-to-know', function () {
    return view('things-to-know');
});




Route::get('/tasklist', function () {
    return view('tasklist');
});

Route::match(['get', 'post'],'/applicant', function () {
    return view('applicant');
});

Route::match(['get', 'post'],'/applicant/check-answers', function () {
    return view('applicant-check-answers');
});

Route::match(['get', 'post'],'/applicant/name', function () {
    return view('applicant-name');
});

Route::match(['get', 'post'],'/applicant/legal-authority', function () {
    return view('applicant-legal-authority');
});

Route::match(['get', 'post'],'/applicant/legal-authority/authority-detail', function () {
    return view('applicant-legal-authority-detail');
});

Route::match(['get', 'post'],'/applicant/legal-authority/information', function () {
    return view('applicant-legal-authority-detail-information');
});


Route::match(['get', 'post'],'/applicant/legal-authority/check-answers', function () {
    return view('applicant-legal-authority-check-answers');
});

Route::match(['get', 'post'],'/applicant/helper/name', function () {
    return view('applicant-helper-name');
});

Route::match(['get', 'post'],'/applicant/helper/relationship', function () {
    return view('applicant-helper-relationship');
});

Route::match(['get', 'post'],'/applicant/helper/declaration', function () {
    return view('applicant-helper-declaration');
});

Route::match(['get', 'post'],'/applicant/helper/check-answers', function () {
    return view('applicant-helper-check-answers');
});

Route::match(['get', 'post'],'/applicant/nominate-a-representative', function () {
    return view('applicant-nominate-representative');
});

Route::match(['get', 'post'],'/applicant/nominate-a-representative-no-check-answers', function () {
    return view('applicant-nominate-representative-no-check-answers');
});

Route::match(['get', 'post'],'/applicant/nominate-a-representative-details', function () {
    return view('applicant-nominate-representative-details');
});

Route::match(['get', 'post'],'/applicant/nominate-a-representative-role', function () {
    return view('applicant-nominate-representative-role');
});

Route::match(['get', 'post'],'/applicant/nominate-a-representative-yes-check-answers', function () {
    return view('applicant-nominate-representative-yes-check-answers');
});

Route::match(['get', 'post'],'/applicant/about-you/name', function () {
    return view('applicant-about-you-name');
});

Route::match(['get', 'post'],'/applicant/about-you/contact-address', function () {
    return view('applicant-about-you-contact-address');
});

Route::match(['get', 'post'],'/applicant/about-you/dob', function () {
    return view('applicant-about-you-dob');
});

Route::match(['get', 'post'],'/applicant/about-you/telephone-number', function () {
    return view('applicant-about-you-telephone-number');
});

Route::match(['get', 'post'],'/applicant/about-you/email-address', function () {
    return view('applicant-about-you-email');
});

Route::match(['get', 'post'],'/applicant/about-you/ni-number', function () {
    return view('applicant-about-you-ni-number');
});

Route::match(['get', 'post'],'/applicant/about-you/pension-scheme', function () {
    return view('applicant-about-you-pension-scheme');
});

Route::match(['get', 'post'],'/applicant/about-you/previous-claim', function () {
    return view('applicant-about-you-previous-claim');
});

Route::match(['get', 'post'],'/applicant/about-you/previous-claim/claim-number', function () {
    return view('applicant-about-you-save-return');
});

Route::match(['get', 'post'],'/applicant/about-you/epaw-reference', function () {
    return view('applicant-about-you-epaw-reference');
});

Route::match(['get', 'post'],'/applicant/about-you/save-return', function () {
    return view('applicant-about-you-save-return');
});

Route::match(['get', 'post'],'/applicant/about-you/check-answers', function () {
    return view('applicant-about-you-check-answers');
});

Route::match(['get', 'post'],'/applicant/about-you/medical-officer', function () {
    return view('applicant-about-you-medical-officer');
});

Route::match(['get', 'post'],'/applicant/about-you/medical-officer/check-answers', function () {
    return view('applicant-about-you-medical-officer-check-answers');
});

Route::match(['get', 'post'],'/applicant/about-you/service-details', function () {
    return view('applicant-about-you-service-details');
});

Route::match(['get', 'post'],'/applicant/about-you/service-details/add-service/name', function () {
    return view('applicant-about-you-service-details-add-service-name');
});

Route::match(['get', 'post'],'/applicant/about-you/service-details/add-service/service-number', function () {
    return view('applicant-about-you-service-details-add-service-number');
});

Route::match(['get', 'post'],'/applicant/about-you/service-details/add-service/branch-service', function () {
    return view('applicant-about-you-service-details-add-service-branch-service');
});

Route::match(['get', 'post'],'/applicant/about-you/service-details/add-service/service-type', function () {
    return view('applicant-about-you-service-details-add-service-service-type');
});

Route::match(['get', 'post'],'/applicant/about-you/service-details/add-service/rank', function () {
    return view('applicant-about-you-service-details-add-service-service-rank');
});

Route::match(['get', 'post'],'/applicant/about-you/service-details/add-service/specialism', function () {
    return view('applicant-about-you-service-details-add-service-service-specialism');
});

Route::match(['get', 'post'],'/applicant/about-you/service-details/add-service/enlistment-date', function () {
    return view('applicant-about-you-service-details-add-service-service-enlistment-date');
});

Route::match(['get', 'post'],'/applicant/about-you/service-details/add-service/discharge-reason', function () {
    return view('applicant-about-you-service-details-add-service-service-discharge-reason');
});

Route::match(['get', 'post'],'/applicant/about-you/service-details/add-service/last-unit-address', function () {
    return view('applicant-about-you-service-details-add-service-service-last-unit-address');
});

Route::match(['get', 'post'],'/applicant/about-you/service-details/add-service/check-answers', function () {
    return view('applicant-about-you-service-details-add-service-check-answers');
});

Route::match(['get', 'post'],'/applicant/other-details/other-medical-treatment', function () {
    return view('applicant-other-details-other-medical-treatment');
});

Route::match(['get', 'post'],'/applicant/other-details/other-medical-treatment/no-check-answers', function () {
    return view('applicant-other-details-other-medical-treatment-no-check-answers');
});

Route::match(['get', 'post'],'/applicant/other-details/other-medical-treatment/hospital-address', function () {
    return view('applicant-other-details-other-medical-treatment-hospital');
});

Route::match(['get', 'post'],'/applicant/other-details/other-medical-treatment/treatment-start', function () {
    return view('applicant-other-details-other-medical-treatment-start');
});

Route::match(['get', 'post'],'/applicant/other-details/other-medical-treatment/treatment-end', function () {
    return view('applicant-other-details-other-medical-treatment-end');
});

Route::match(['get', 'post'],'/applicant/other-details/other-medical-treatment/kind', function () {
    return view('applicant-other-details-other-medical-treatment-kind');
});

Route::match(['get', 'post'],'/applicant/other-details/other-medical-treatment/condition', function () {
    return view('applicant-other-details-other-medical-treatment-condition');
});

Route::match(['get', 'post'],'/applicant/other-details/other-medical-treatment/check-answers', function () {
    return view('applicant-other-details-other-medical-treatment-check-answers');
});

Route::match(['get', 'post'],'/applicant/other-details/other-compensation', function () {
    return view('applicant-other-details-other-compensation');
});

Route::match(['get', 'post'],'/applicant/claims', function () {
    return view('applicant-claims');
});

Route::match(['get', 'post'],'/applicant/claims/type', function () {
    return view('applicant-claims-type');
});

Route::match(['get', 'post'],'/applicant/claims/specific', function () {
    return view('applicant-claims-specific');
});

Route::match(['get', 'post'],'/applicant/claims/specific/pt/medical', function () {
    return view('applicant-claims-specific-pt-medical');
});

Route::match(['get', 'post'],'/applicant/claims/specific/non-pt/medical', function () {
    return view('applicant-claims-specific-non-pt-medical');
});

Route::match(['get', 'post'],'/applicant/claims/specific/pt/medical/practitioner', function () {
    return view('applicant-claims-specific-pt-medical-practitioner');
});

Route::match(['get', 'post'],'/applicant/claims/specific/non-pt/medical/practitioner', function () {
    return view('applicant-claims-specific-non-pt-medical-practitioner');
});

Route::match(['get', 'post'],'/applicant/claims/specific/pt/date', function () {
    return view('applicant-claims-specific-pt-date');
});

Route::match(['get', 'post'],'/applicant/claims/specific/non-pt/date', function () {
    return view('applicant-claims-specific-non-pt-date');
});

Route::match(['get', 'post'],'/applicant/claims/specific/pt/activity', function () {
    return view('applicant-claims-specific-pt-activity');
});


Route::match(['get', 'post'],'/applicant/claims/specific/pt/armed-forces-organised', function () {
    return view('applicant-claims-specific-pt-armed-forces-organised');
});

Route::match(['get', 'post'],'/applicant/claims/specific/pt/unit-representation', function () {
    return view('applicant-claims-specific-pt-unit-representation');
});

Route::match(['get', 'post'],'/applicant/claims/specific/pt/condition-relation', function () {
    return view('applicant-claims-specific-pt-condition-relation');
});

Route::match(['get', 'post'],'/applicant/claims/specific/witnesses', function () {
    return view('applicant-claims-specific-witnesses');
});

Route::match(['get', 'post'],'/applicant/claims/specific/first-aid', function () {
    return view('applicant-claims-specific-first-aid');
});

Route::match(['get', 'post'],'/applicant/claims/specific/hospital', function () {
    return view('applicant-claims-specific-hospital');
});

Route::match(['get', 'post'],'/applicant/claims/specific/hospital/address', function () {
    return view('applicant-claims-specific-hospital-address');
});

Route::match(['get', 'post'],'/applicant/claims/specific/downgraded', function () {
    return view('applicant-claims-specific-downgraded');
});

Route::match(['get', 'post'],'/applicant/claims/specific/downgraded/detail', function () {
    return view('applicant-claims-specific-downgraded-detail');
});

Route::match(['get', 'post'],'/applicant/claims/specific/downgraded/when', function () {
    return view('applicant-claims-specific-downgraded-when');
});

Route::match(['get', 'post'],'/applicant/claims/specific/why-related', function () {
    return view('applicant-claims-specific-condition-related');
});

Route::match(['get', 'post'],'/applicant/claims/specific/non-pt/on-duty', function () {
    return view('applicant-claims-specific-non-pt-on-duty');
});

Route::match(['get', 'post'],'/applicant/claims/specific/non-pt/incident-report', function () {
    return view('applicant-claims-specific-non-pt-incident-report');
});

Route::match(['get', 'post'],'/applicant/claims/specific/non-pt/report', function () {
    return view('applicant-claims-specific-non-pt-report');
});

Route::match(['get', 'post'],'/applicant/claims/specific/non-pt/accident-form', function () {
    return view('applicant-claims-specific-non-pt-accident-form');
});

Route::match(['get', 'post'],'/applicant/claims/specific/non-pt/where-were-you', function () {
    return view('applicant-claims-specific-non-pt-where-were-you');
});

Route::match(['get', 'post'],'/applicant/claims/specific/non-pt/what-doing', function () {
    return view('applicant-claims-specific-non-pt-what-doing');
});

Route::match(['get', 'post'],'/applicant/claims/specific/non-pt/rta', function () {
    return view('applicant-claims-specific-non-pt-rta');
});

Route::match(['get', 'post'],'/applicant/claims/specific/non-pt/rta/journey-reason', function () {
    return view('applicant-claims-specific-non-pt-rta-journey-reason');
});

Route::match(['get', 'post'],'/applicant/claims/specific/non-pt/rta/journey-start', function () {
    return view('applicant-claims-specific-non-pt-rta-journey-start');
});

Route::match(['get', 'post'],'/applicant/claims/specific/non-pt/rta/journey-end', function () {
    return view('applicant-claims-specific-non-pt-rta-journey-end');
});

Route::match(['get', 'post'],'/applicant/claims/specific/non-pt/rta/direct-route', function () {
    return view('applicant-claims-specific-non-pt-rta-direct-route');
});

Route::match(['get', 'post'],'/applicant/claims/specific/non-pt/police-report', function () {
    return view('applicant-claims-specific-non-pt-police-report');
});

Route::match(['get', 'post'],'/applicant/claims/specific/non-pt/police-report/reference-number', function () {
    return view('applicant-claims-specific-non-pt-police-report-reference-number');
});

Route::match(['get', 'post'],'/applicant/claims/specific/non-pt/authorised-leave', function () {
    return view('applicant-claims-specific-non-pt-authorised-leave');
});

Route::match(['get', 'post'],'/applicant/claims/non-specific', function () {
    return view('applicant-claims-non-specific');
});

Route::match(['get', 'post'],'/applicant/claims/non-specific/medical-practitioner', function () {
    return view('applicant-claims-non-specific-medical-practitioner');
});

Route::match(['get', 'post'],'/applicant/claims/non-specific/date', function () {
    return view('applicant-claims-non-specific-date');
});

Route::match(['get', 'post'],'/applicant/claims/non-specific/illness-related', function () {
    return view('applicant-claims-non-specific-illness-related');
});

Route::match(['get', 'post'],'/applicant/claims/non-specific/exposure-related', function () {
    return view('applicant-claims-non-specific-exposure-related');
});

Route::match(['get', 'post'],'/applicant/claims/non-specific/chemical-exposure', function () {
    return view('applicant-claims-non-specific-exposure-chemical');
});

Route::match(['get', 'post'],'/applicant/claims/non-specific/medical-attention-date', function () {
    return view('applicant-claims-non-specific-medical-attention-date');
});

Route::match(['get', 'post'],'/applicant/claims/check-answers', function () {
    return view('applicant-claims-check-answers');
});

Route::match(['get', 'post'],'/applicant/other-details/other-compensation/conditions', function () {
    return view('applicant-other-details-other-compensation-conditions');
});

Route::match(['get', 'post'],'/applicant/other-details/other-compensation/outcome', function () {
    return view('applicant-other-details-other-compensation-outcome');
});

Route::match(['get', 'post'],'/applicant/other-details/other-compensation/payment', function () {
    return view('applicant-other-details-other-compensation-payment');
});

Route::match(['get', 'post'],'/applicant/other-details/other-compensation/amount-received', function () {
    return view('applicant-other-details-other-compensation-amount');
});

Route::match(['get', 'post'],'/applicant/other-details/other-compensation/type', function () {
    return view('applicant-other-details-other-compensation-type');
});

Route::match(['get', 'post'],'/applicant/other-details/other-compensation/when', function () {
    return view('applicant-other-details-other-compensation-when');
});

Route::match(['get', 'post'],'/applicant/other-details/other-compensation/solicitor', function () {
    return view('applicant-other-details-other-compensation-solicitor');
});

Route::match(['get', 'post'],'/applicant/other-details/other-compensation/solicitor/details', function () {
    return view('applicant-other-details-other-compensation-solicitor-details');
});

Route::match(['get', 'post'],'/applicant/other-details/other-compensation/check-answers', function () {
    return view('applicant-other-details-other-compensation-check-answers');
});

Route::match(['get', 'post'],'/applicant/other-details/benefits', function () {
    return view('applicant-other-details-benefits');
});

Route::match(['get', 'post'],'/applicant/other-details/benefits/other-payments', function () {
    return view('applicant-other-details-benefits-other-payments');
});

Route::match(['get', 'post'],'/applicant/other-details/benefits/other-payments/details', function () {
    return view('applicant-other-details-benefits-other-payments-details');
});

Route::match(['get', 'post'],'/applicant/other-details/benefits/check-answers', function () {
    return view('applicant-other-details-benefits-check-answers');
});

Route::match(['get', 'post'],'/applicant/payment-details', function () {
    return view('applicant-payment-details');
});

Route::match(['get', 'post'],'/applicant/payment-details/bank-location', function () {
    return view('applicant-payment-details-bank-location');
});

Route::match(['get', 'post'],'/applicant/payment-details/bank-location/uk', function () {
    return view('applicant-payment-details-bank-location-uk');
});

Route::match(['get', 'post'],'/applicant/payment-details/bank-location/overseas', function () {
    return view('applicant-payment-details-bank-location-overseas');
});

Route::match(['get', 'post'],'/applicant/payment-details/check-answers', function () {
    return view('applicant-payment-details-check-answers');
});

Route::match(['get', 'post'],'/applicant/supporting-documents', function () {
    return view('applicant-supporting-documents');
});

Route::match(['get', 'post'],'/applicant/supporting-documents/upload', function () {
    return view('applicant-supporting-documents-upload');
});

Route::match(['get', 'post'],'/applicant/supporting-documents/manage', function () {
    return view('applicant-supporting-documents-manage');
});

Route::match(['get', 'post'],'/applicant/supporting-documents/comments', function () {
    return view('applicant-supporting-documents-comments');
});

Route::match(['get', 'post'],'/applicant/declaration', function () {
    return view('applicant-supporting-declaration');
});




