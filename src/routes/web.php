<?php

use Resto2web\Core\Http\Controllers\ContactPageController;
use Resto2web\Core\Http\Controllers\HomePageController;
use Resto2web\Core\Http\Controllers\MenuPageController;

Route::get('/', HomePageController::class)->name('home');
Route::get('/menu', MenuPageController::class)->name('menu');
Route::get('/contact', ContactPageController::class)->name('contact');
