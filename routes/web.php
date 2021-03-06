<?php


use Resto2web\Core\Common\Controllers\DisabledWebsitePageController;
use Resto2web\Core\Website\Controllers\ContactPageController;
use Resto2web\Core\Website\Controllers\HomePageController;

Route::redirect('/home','/');

Route::middleware('web')->group(function () {
    Route::get('/', HomePageController::class)->name('home');
    Route::get('/contact', ContactPageController::class)->name('contact');
    Route::get('/site-desactive', DisabledWebsitePageController::class)->name('disabled');
});
