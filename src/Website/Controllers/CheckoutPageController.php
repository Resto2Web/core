<?php


namespace Resto2web\Core\Website\Controllers;


use Resto2web\Core\Common\Controllers\Controller;
use Resto2web\Core\Domain\Cart\Actions\GetCartTotalWithDeliveryAction;
use Resto2web\Core\Domain\Utility\Helpers\CartOrderHelper;

class CheckoutPageController extends Controller
{
    public function index()
    {
        if(CartOrderHelper::canCheckout())
        {
            return view('resto2web::pages.checkout.checkout');
        }else{
            return redirect(route('menu'));
        }
    }

    public function store()
    {

        dd(request());
    }
}
