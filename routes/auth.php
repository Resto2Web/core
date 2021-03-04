<?php

use Resto2web\Core\Auth\Controllers\ConfirmPasswordController;
use Resto2web\Core\Auth\Controllers\ForgotPasswordController;
use Resto2web\Core\Auth\Controllers\LoginController;
use Resto2web\Core\Auth\Controllers\RegisterController;
use Resto2web\Core\Auth\Controllers\ResetPasswordController;
use Resto2web\Core\Auth\Controllers\SocialLoginController;
use Resto2web\Core\Auth\Controllers\TokenAuthController;
use Resto2web\Core\Auth\Controllers\VerificationController;
use Spatie\Honeypot\ProtectAgainstSpam;

Route::middleware(['web',ProtectAgainstSpam::class])->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);

    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
    Route::get('password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
    Route::post('password/confirm', [ConfirmPasswordController::class, 'confirm']);

    Route::get('/auth/social/{social}', [SocialLoginController::class,'redirectToSocial'])->name('social-login');
    Route::get('/auth/{social}/callback', [SocialLoginController::class,'handleSocialCallback'])->name('social-callback');


    Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
    Route::post('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

    Route::get('/sso/{sso_token}', [TokenAuthController::class, 'login'])->name('loginWithToken');

});
