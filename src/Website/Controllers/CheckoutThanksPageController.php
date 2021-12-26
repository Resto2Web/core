<?php


namespace Resto2web\Core\Website\Controllers;


use Resto2web\Core\Common\Controllers\Controller;
use Resto2web\Core\Domain\Cart\Actions\GetCartTotalWithDeliveryAction;

class CheckoutThanksPageController extends Controller
{
    public function __invoke()
    {
        return view('resto2web::pages.checkout.thanks');
    }
}
