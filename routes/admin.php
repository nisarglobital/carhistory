<?php

use App\Http\Controllers\{SettingController, TransactionController, SubscriptionController};
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{DashboardController,
    PlanController,
    RoleController,
    PermissionController,
    UserController};
use App\Http\Controllers\Admin\Auth\{ConfirmPasswordController, ForgotPasswordController, LoginController, RegisterController, ResetPasswordController};


// Admin Login Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Admin Registration Routes (if needed)
// Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Route::post('register', [RegisterController::class, 'register'])->name('register');

// Admin Password Reset Routes
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

// Admin Password Confirmation Routes
Route::get('password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
Route::post('password/confirm', [ConfirmPasswordController::class, 'confirm']);



Route::group(['middleware' => ['auth', 'CheckRole']], function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('plans', PlanController::class);
    Route::get('transactions', [TransactionController::class, 'listTransactions'])->name('transactions.list');
    Route::get('subscriptions', [SubscriptionController::class, 'listSubscriptions'])->name('subscriptions.list');

    Route::get('user/settings', [SettingController::class, 'editUserSettings'])->name('settings.edit');
    Route::post('user/settings', [SettingController::class, 'updateUserSettings'])->name('settings.update');
});

