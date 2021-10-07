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
