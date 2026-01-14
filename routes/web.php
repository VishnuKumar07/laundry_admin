<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});

Route::get('/dashboard', [DashboardController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/sms-logs', [LogController::class, 'SmsLogs'])->name('sms.logs');
    Route::get('/email-logs', [LogController::class, 'EmailLogs'])->name('email.logs');

    Route::get('/change-password', [ChangePasswordController::class, 'index'])->name('change.password');
    Route::post('/update-password', [ChangePasswordController::class, 'updatePassword'])->name('update.password');
});

require __DIR__.'/auth.php';
