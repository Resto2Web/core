<?php


use Illuminate\Support\Facades\Route;
use Resto2web\Core\Common\Controllers\DisabledWebsitePageController;
use Resto2web\Core\Website\Controllers\AboutUsPageController;
use Resto2web\Core\Website\Controllers\CheckoutPageController;
use Resto2web\Core\Website\Controllers\CheckoutThanksPageController;
use Resto2web\Core\Website\Controllers\ContactPageController;
use Resto2web\Core\Website\Controllers\HomePageController;
use Resto2web\Core\Website\Controllers\MenuPageController;

Route::redirect('/home','/');

Route::middleware('web')->group(function () {
    Route::get('/', HomePageController::class)->name('home');

    Route::get('/contact', ContactPageController::class)->name('contact');
    Route::get('/a-propos-de-nous', AboutUsPageController::class)->name('about-us');

    Route::get('/menu', MenuPageController::class)->name('menu');
    Route::get('/commander', [CheckoutPageController::class,'index'])->name('checkout.index');
    Route::post('/commander', [CheckoutPageController::class,'store'])->name('checkout.store');
    Route::get('/commander/merci', CheckoutThanksPageController::class)->name('checkout.thanks');

    Route::get('/site-desactive', DisabledWebsitePageController::class)->name('disabled');
});
