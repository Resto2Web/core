<?php

use Resto2web\Core\Admin\Controllers\HomePageController;
use Resto2web\Core\Admin\Settings\Controllers\GeneralSettingsPageController;
use Resto2web\Core\Admin\Settings\Controllers\SettingsIndexPageController;
use Resto2web\Core\Auth\Controllers\AdminLoginController;
use Resto2web\Core\Auth\Controllers\QrCodeAuthController;
use Resto2web\Core\Auth\Controllers\TokenAuthController;
use Resto2web\Core\Domain\Users\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::group(['middleware' => 'web'], function () {
    Route::get('/sso/{sso_token}', [TokenAuthController::class, 'login'])->name('loginWithToken');
});
Route::group(['middleware' => 'api'], function () {
    Route::get('qr-code/auth/{user}', [QrCodeAuthController::class, 'getToken'])->name('admin.qrcode-auth');
});
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

Route::post('/sanctum/token/{sso_token}', function ($sso_token, \Illuminate\Http\Request $request) {
    $request->validate([
        'device_name' => 'required'
    ]);

    $secret = config('resto2web.core.secret');
    if (is_null($secret) || $secret == '') {
        abort(500, "Secret not configured");
    }
    $response = Http::withoutVerifying()->get("https://resto2web.test/ssoCheck/".$sso_token."/".$secret);
    if ($response->successful()) {
        $user = User::where('email', $response->object()->email)->firstOrFail();
        if ($user->type != 'admin') {
            abort(403);
        }

        $token = $user->createToken($request->device_name)->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token,
        ];
        return response($response, 201);
    } else {
        return response($response->body(), 400);
    }

});

Route::middleware('auth:sanctum')->post('/api/logout', function (Request $request) {
    Auth::user()->tokens()->delete();
    return response('Loggedout', 200);
});


