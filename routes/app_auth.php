<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:login')->name('loginPost');

Route::redirect('/logout', '/');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('password/request', [ForgotPasswordController::class, 'showLinkRequestForm'])
    ->middleware('guest')
    ->name('forgotpassword');

Route::post('password/request', [ForgotPasswordController::class, 'sendResetLinkEmail'])
    ->middleware('guest')
    ->name('forgotpasswordPost');

Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('/password/reset/', [ResetPasswordController::class, 'reset'])
    ->middleware('guest')
    ->name('password.update');
