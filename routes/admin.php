<?php

use Resto2web\Core\Admin\Controllers\HomePageController;
use Resto2web\Core\Admin\Meals\Controllers\MealCategoriesController;
use Resto2web\Core\Admin\Meals\Controllers\MealCategoriesPositionController;
use Resto2web\Core\Admin\Meals\Controllers\MealsController;
use Resto2web\Core\Admin\Meals\Controllers\MealsPositionController;
use Resto2web\Core\Admin\Meals\Controllers\MenuSettingsController;
use Resto2web\Core\Admin\Orders\Controllers\OrdersController;
use Resto2web\Core\Admin\Settings\Controllers\GeneralSettingsPageController;
use Resto2web\Core\Admin\Settings\Controllers\SettingsIndexPageController;
use Resto2web\Core\Admin\Theme\Controllers\ThemeEditorPageController;
use Resto2web\Core\Auth\Controllers\AdminLoginController;
use Resto2web\Core\Auth\Controllers\QrCodeAuthController;
use Illuminate\Support\Facades\Route;


Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['web', 'admin-seo']], function () {
    Route::get('/login', [AdminLoginController::class, 'login'])->name('login');
    Route::middleware('admin')->group(function () {
        Route::get('/', HomePageController::class)->name('index');
        Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');


        Route::patch('meal-categories/position/{mealCategory}', MealCategoriesPositionController::class);
        Route::resource('meal-categories', MealCategoriesController::class);

        Route::patch('meals/position/{meal}', MealsPositionController::class);
        Route::resource('meals', MealsController::class);
        Route::resource('orders', OrdersController::class);

        Route::get('/settings', [SettingsIndexPageController::class, 'index'])->name('settings.index');
        Route::get('/settings/general', [GeneralSettingsPageController::class, 'show'])->name('settings.general');
        Route::patch('/settings/general', [GeneralSettingsPageController::class, 'update'])->name('settings.general');

        Route::get('/settings/menu', [MenuSettingsController::class,'show'])->name('settings.menu');
        Route::patch('/settings/menu', [MenuSettingsController::class,'update'])->name('settings.menu');

        Route::get('qr-code', [QrCodeAuthController::class, 'show'])->name('qrcode');

        Route::get('/theme-editor', ThemeEditorPageController::class)->name('theme.index');
    });
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
});

