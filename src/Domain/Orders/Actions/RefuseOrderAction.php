<?php


namespace Resto2web\Core\Domain\Orders\Actions;


use Resto2web\Core\Domain\Orders\States\OrderStatus\Refused;

class RefuseOrderAction
{

    public static function execute(\Resto2web\Core\Domain\Orders\Models\Order $order)
    {
        $order->status->transitionTo(Refused::class);
    }
}
