<?php

use Resto2web\Core\Website\Controllers\ContactPageController;
use Resto2web\Core\Website\Controllers\HomePageController;

Route::get('/', HomePageController::class)->name('home');
Route::get('/contact', ContactPageController::class)->name('contact');
