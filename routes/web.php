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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/gds-test', [\App\Http\Controllers\GdsLoginController::class, 'index'])->name('gds');
Route::get('/gds-test/callback', [\App\Http\Controllers\GdsLoginController::class, 'callback'])->name('gds.callback');



Route::get('/', [\App\Http\Controllers\HomeController::class, 'start'])->name('start');
Route::get('/summary', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/form', [\App\Http\Controllers\FormController::class, 'index'])->name('load.form');
Route::get('/cancel', [\App\Http\Controllers\FormController::class, 'cancel'])->name('cancel-application');
Route::post('/form', [\App\Http\Controllers\FormController::class, 'save'])->name('save.form');

Route::get('/cookie-policy', [\App\Http\Controllers\CookiePolicyController::class, 'index'])->name('cookie-policy');
Route::post('/cookie-policy', [\App\Http\Controllers\CookiePolicyController::class, 'save'])->name('cookie-policy.save');

// Customer feedback
Route::get('/feedback', [\App\Http\Controllers\FeedbackController::class, 'index'])->name('feedback');
Route::post('/feedback', [\App\Http\Controllers\FeedbackController::class, 'send'])->name('feedback.send');
Route::get('/feedback/complete', [\App\Http\Controllers\FeedbackController::class, 'complete'])->name('feedback.complete');
Route::view('/privacy-policy', 'privacy-policy')->name('privacy-policy');
Route::view('/accessibility-statement', 'accessibility-statement')->name('accessibility-statement');
Route::view('/privacy-policy', 'privacy-policy')->name('privacy-policy');
Route::view('/accessibility-statement', 'accessibility-statement')->name('accessibility-statement');

Route::get('/stack/add/', [\App\Http\Controllers\StackController::class, 'add'])->name('add.stack');
Route::get('/stack/drop/', [\App\Http\Controllers\StackController::class, 'drop'])->name('drop.stack');

Route::get('/load-progress', [\App\Http\Controllers\ProgressController::class, 'load'])->name('load.progress');
Route::get('/save-progress', [\App\Http\Controllers\ProgressController::class, 'save'])->name('save.progress');

Route::get('/summarise/{group}/{task}', [\App\Http\Controllers\FormController::class, 'summarise'])->name('summarise.form');
Route::get('/{group}/{task}/{page}/?return=summarise#{question}', [\App\Http\Controllers\FormController::class, 'change'])->name('update.form');
Route::get('/{group}/{task}/{page}', [\App\Http\Controllers\FormController::class, 'index'])->name('load.form');
Route::get('/{group}/{task}', [\App\Http\Controllers\FormController::class, 'index'])->name('load.form');
Route::post('/{group}/{task}/{page}', [\App\Http\Controllers\FormController::class, 'save'])->name('save.form');
//Route::get('/{group}/{task}/{page}/{stack}', [\App\Http\Controllers\FormController::class, 'index'])
//    ->name('load.form')->whereUuid('stack');
//Route::post('/{group}/{task}/{page}/{stack}', [\App\Http\Controllers\FormController::class, 'save'])
//    ->name('save.form')->whereUuid('stack');;
