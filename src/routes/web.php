<?php

use Resto2web\Core\Website\Controllers\ContactPageController;
use Resto2web\Core\Website\Controllers\HomePageController;

Route::get('/', HomePageController::class)->name('home');
Route::get('/contact', ContactPageController::class)->name('contact');

Route::get('/disabled-website', function () {
    if (setting()->get('site_active')) {
        return redirect(route('home'));
    }
    return view('resto2web::pages.disabled-website');
})->name('disabled-website');
