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




