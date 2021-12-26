<?php


namespace Resto2web\Core\Domain\Cart\Actions;


use Gloudemans\Shoppingcart\Facades\Cart;
use Resto2web\Core\Domain\Utility\Helpers\CartOrderHelper;
use Resto2web\Core\Settings\MenuSettings;

class GetDeliveryPriceAction
{
    public static function execute()
    {
        if (CartOrderHelper::hasFreeDelivery() || CartOrderHelper::isTakeaway()) {
            return 0;
        } else {
            $settings = app(MenuSettings::class);
            return $settings->deliveryPrice;
        }
    }
}
