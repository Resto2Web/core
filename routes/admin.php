<?php

use Resto2web\Core\Admin\Controllers\HomePageController;
use Resto2web\Core\Admin\Settings\Controllers\GeneralSettingsPageController;
use Resto2web\Core\Admin\Settings\Controllers\SettingsIndexPageController;
use Resto2web\Core\Auth\Controllers\AdminLoginController;
use Resto2web\Core\Auth\Controllers\QrCodeAuthController;
use Illuminate\Support\Facades\Route;


Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['web', 'admin-seo']], function () {
    Route::get('/login', [AdminLoginController::class, 'login'])->name('login');
    Route::middleware('admin')->group(function () {
        Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');

        Route::get('/', HomePageController::class)->name('index');
        Route::get('/settings', [SettingsIndexPageController::class, 'index'])->name('settings.index');
        Route::get('/settings/general', [GeneralSettingsPageController::class, 'show'])->name('settings.general');
        Route::patch('/settings/general', [GeneralSettingsPageController::class, 'update'])->name('settings.general');

        Route::get('qr-code', [QrCodeAuthController::class, 'show'])->name('qrcode');
    });
});

