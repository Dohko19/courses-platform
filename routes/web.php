<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\InvoiceController;

Route::get('set_language/{lang}', [Controller::class, 'setLanguage'])->name('set_language');

Route::get('login/{driver}', [LoginController::class, 'redirectToProvider'])->name('social_auth');
Route::get('login/{driver}/callback', [LoginController::class, 'handleProviderCallback']);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);


Auth::routes();

Route::prefix('courses')->group(function () {
    Route::get('/{course}/inscribe', [CourseController::class, 'inscribe'])->name('courses.inscribe')->middleware('auth');
    Route::get('{course}', [CourseController::class, 'show'])->name('courses.detail');
});

Route::prefix('subscription')->middleware(['auth'])->group(function () {
    Route::get('/plans', [SubscriptionController::class, 'plans'])->name('subscription.plans');
    Route::get('/admin', [SubscriptionController::class, 'admin'])->name('subscription.admin');
    Route::post('/process_subscription', [SubscriptionController::class, 'processSubscription'])->name('subscription.process_subscription');
    Route::post('/resume', [SubscriptionController::class, 'resume'])->name('subscription.resume');
    Route::post('/cancel', [SubscriptionController::class, 'cancel'])->name('subscription.cancel');

    //Facturacion
    Route::group(['prefix' => "invoices"], function() {
		Route::get('/admin', [InvoiceController::class, 'admin'])->name('invoices.admin');
		Route::get('/{invoice}/download', [InvoiceController::class, 'download'])->name('invoices.download');
	});

});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
