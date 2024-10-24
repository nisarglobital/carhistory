<?php

use App\Http\Controllers\{HomeController,
    SettingController,
    StripeController,
    SubscriptionController,
    TransactionController};
use App\Http\Controllers\Front\{DashboardController, UserController};
use App\Http\Controllers\VinCheckController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class,'index'])->name('home-page');
Route::get('/login', function () { return view('front/login'); })->name('login');

Route::get('/register/{plan?}', function () {
    return view('front.register');
})->name('register');

Route::get('/company', function () { return view('front/company'); })->name('company');
Route::get('/help', function () { return view('front/help'); })->name('help');
Route::get('/sample-report', function () { return view('front/sample-report'); })->name('sample-report');

Route::post('/vin-check', [VinCheckController::class, 'vinCheck'])->name('vin-check');
Route::post('/stripe/webhook', [StripeController::class, 'handleWebhook']);

Auth::routes();


Route::group(['middleware' => ['auth', 'CheckRole']], function () {

    Route::get('/dashboard',        [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/subscriptions',    [SubscriptionController::class, 'index'])->name('subscriptions');
    Route::get('/transactions',     [TransactionController::class, 'index'])->name('transactions');
    Route::get('/payments',         [SettingController::class, 'editUserSettings'])->name('payments');
    Route::get('/profile',          [UserController::class, 'edit'])->name('profile');
    Route::put('/profile',          [UserController::class, 'update'])->name('profile.update');

    Route::get('/reports',          [VinCheckController::class, 'listReports'])->name('reports');
    Route::get('/vin-report/{vin}', [VinCheckController::class, 'viewReport'])->name('vin.view');

    //Route::get('/settings',     [PaymentController::class, 'index'])->name('settings');
    Route::get('/settings',     [SettingController::class, 'editUserSettings'])->name('settings.edit');
    Route::post('/settings',    [SettingController::class, 'updateUserSettings'])->name('settings.update');

    Route::get('/home', [HomeController::class, 'index'])->name('home');


    //handling stripe payments
    Route::post('/stripe/create-customer', [StripeController::class, 'createCustomer']);
    Route::get('/generate/invoice/{plan_id}', [StripeController::class, 'generateInvoice'])->name('generateInvoice');

    Route::get('/payment/{plan?}', function (){
        return view('front.payment');
    })->name('payment');

});







/*Route::prefix('dashboard')->controller(DashboardController::class)->group(function (){
    Route::get('/', 'dashboard')->name('dashboard');
});*/


//Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

