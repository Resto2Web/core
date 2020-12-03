<?php

use Resto2web\Core\Common\Controllers\DisabledWebsitePageController;
use Resto2web\Core\Website\Controllers\ContactPageController;
use Resto2web\Core\Website\Controllers\HomePageController;

Route::middleware('web')->group(function () {
    if (setting()->get('site_active')) {
        Route::get('/', HomePageController::class)->name('home');
        Route::get('/contact', ContactPageController::class)->name('contact');
    } else {
        Route::get('/', DisabledWebsitePageController::class)->name('home');
    }
});



