<?php

use App\Http\Controllers\CookiePolicyController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\GdsLoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\StackController;
use Illuminate\Support\Facades\Artisan;
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
Route::get('/migrate', function() { return Artisan::call('migrate'); });
Route::get('/stack/skip', [StackController::class, 'skip'])->name('skip.stack');
Route::get('/restore-application', [ProgressController::class, 'restore'])->name('restore-application');
Route::post('/restore-application', [ProgressController::class, 'confirm'])->name('restore-application');
Route::get('/restore-application/two-factor-sms', [ProgressController::class, 'authcode'])->name('restore-application-2fa');
Route::post('/restore-application/two-factor-sms', [ProgressController::class, 'authenticate'])->name('restore-application-2fa');
Route::get('/text-not-receive', function() {
    $form  = App\Services\Application::getInstance()->form;
    $view = 'text-not-received';
    if (view()->exists('forms.' . $form->getId() . '.' . $view)) {
        $view = 'forms.' . $form->getId() . '.' . $view;
    }

    return view($view);
})->name('text-not-received');
Route::post('/text-not-receive', [ProgressController::class, 'resend'])->name('text-not-received');


Route::get('/gds-test', [GdsLoginController::class, 'index'])->name('gds');
Route::get('/gds-test/callback', [GdsLoginController::class, 'callback'])->name('gds.callback');

Route::get('/', [HomeController::class, 'start'])->name('start');
Route::get('/summary', [HomeController::class, 'index'])->name('home');

Route::get('/form', [FormController::class, 'index'])->name('load.form');
Route::get('/cancel', [FormController::class, 'cancel'])->name('cancel-application');
Route::post('/cancel', [FormController::class, 'cancelConfirmation'])->name('cancel-application.confirm');
Route::post('/form', [FormController::class, 'save'])->name('save.form');
Route::get('/application-complete', [FormController::class, 'complete'])->name('application.complete');

Route::get('/cookie-policy', [CookiePolicyController::class, 'index'])->name('cookie-policy');
Route::post('/cookie-policy', [CookiePolicyController::class, 'save'])->name('cookie-policy.save');

// Customer feedback
Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback');
Route::post('/feedback', [FeedbackController::class, 'send'])->name('feedback.send');
Route::get('/feedback/complete', [FeedbackController::class, 'complete'])->name('feedback.complete');
Route::view('/privacy-policy', 'privacy-policy')->name('privacy-policy');
Route::view('/accessibility-statement', 'accessibility-statement')->name('accessibility-statement');
Route::view('/privacy-policy', 'privacy-policy')->name('privacy-policy');
Route::view('/accessibility-statement', 'accessibility-statement')->name('accessibility-statement');

Route::get('/stack/add/', [StackController::class, 'add'])->name('add.stack');
Route::get('/stack/drop/', [StackController::class, 'drop'])->name('drop.stack');

Route::get('/load-progress', [ProgressController::class, 'load'])->name('load.progress');
Route::get('/save-progress', [ProgressController::class, 'save'])->name('save.progress');

Route::get('/summarise/{group}/{task}', [FormController::class, 'summarise'])->name('summarise.form');
//Route::get('/{group}/{task}/{page}/?return=summarise#{question}', [FormController::class, 'change'])->name('update.form');
Route::get('/{group}/{task}/{page}/?return=summarise&stack={stack?}#{question}', [FormController::class, 'change'])->name('update.form');
Route::get('/{group}/{task}/{page}', [FormController::class, 'index'])->name('load.form');
Route::get('/{group}/{task}', [FormController::class, 'index'])->name('load.form');
Route::post('/{group}/{task}/{page}', [FormController::class, 'save'])->name('save.form');
//Route::get('/{group}/{task}/{page}/{stack}', [\App\Http\Controllers\FormController::class, 'index'])
//    ->name('load.form')->whereUuid('stack');
//Route::post('/{group}/{task}/{page}/{stack}', [\App\Http\Controllers\FormController::class, 'save'])
//    ->name('save.form')->whereUuid('stack');
