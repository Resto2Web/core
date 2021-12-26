<?php


namespace Resto2web\Core\Domain\Orders\Actions;


use Illuminate\Support\Facades\Notification;
use Resto2web\Core\Domain\Orders\Models\Order;
use Resto2web\Core\Domain\Orders\Notifications\UserOrderShippedNotification;
use Resto2web\Core\Domain\Orders\States\OrderStatus\Shipped;

class ShipOrderAction
{

    public static function execute(Order $order)
    {
        $order->status->transitionTo(Shipped::class);
        Notification::route('mail',$order->email)
            ->notify(new UserOrderShippedNotification($order));
    }
}
