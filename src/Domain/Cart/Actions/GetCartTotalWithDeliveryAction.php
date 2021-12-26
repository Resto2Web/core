<?php


namespace Resto2web\Core\Domain\Cart\Actions;


use Gloudemans\Shoppingcart\Facades\Cart;
use Resto2web\Core\Domain\Utility\Helpers\CartOrderHelper;

class GetCartTotalWithDeliveryAction
{
    public static function execute()
    {
        return CartOrderHelper::getDeliveryPrice() + Cart::subtotal();
    }
}
