<?php

use Resto2web\Core\API\Controllers\WebsiteStatusController;
use Resto2web\Core\Auth\Controllers\QrCodeAuthController;
use Resto2web\Core\Auth\Controllers\SanctumTokenController;
use Resto2web\Core\Common\Middlewares\CheckWebsiteSecret;

Route::group(['as' => 'api.', 'prefix' => 'api', 'middleware' => CheckWebsiteSecret::class], function () {
    Route::patch('status', WebsiteStatusController::class);
});

Route::group(['middleware' => 'api'], function () {
    Route::get('qr-code/auth/{user}', [QrCodeAuthController::class, 'getToken'])->name('admin.qrcode-auth');
});


Route::post('/sanctum/token/{sso_token}', [SanctumTokenController::class, 'getToken']);
Route::middleware('auth:sanctum')->post('/api/logout', [SanctumTokenController::class, 'logout']);

