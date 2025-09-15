<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
// use App\Http\Controllers\Auth\OtpLoginController;
// use App\Http\Controllers\Auth\ExamineeRegistrationController;
// use App\Http\Controllers\UserManagementController;

Route::view('/', 'welcome');

// Password login
Route::get('/login', [AuthController::class, 'show'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// OTP flow for examinees
Route::post('/otp/send', [OtpLoginController::class, 'send'])->name('otp.send');
Route::get('/otp/verify', [OtpLoginController::class, 'showVerify'])->name('otp.verify.show');
Route::post('/otp/verify', [OtpLoginController::class, 'verify'])->name('otp.verify');

// // First-time registration (after OTP verified)
// Route::get('/examinee/register', [ExamineeRegistrationController::class, 'show'])->name('examinee.register.show');
// Route::post('/examinee/register', [ExamineeRegistrationController::class, 'store'])->name('examinee.register.store');

// // Simple role gate via middleware closure (optional, or make a dedicated middleware)
// Route::middleware('auth')->group(function () {
//     Route::get('/users/create', [UserManagementController::class, 'create'])->name('users.create');
//     Route::post('/users', [UserManagementController::class, 'store'])->name('users.store');
// });
