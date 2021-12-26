<?php


namespace Resto2web\Core\Domain\Orders\Actions;


use Illuminate\Support\Facades\Notification;
use Resto2web\Core\Domain\Orders\Notifications\UserOrderConfirmedNotification;
use Resto2web\Core\Domain\Orders\States\OrderStatus\Canceled;

class CancelOrderAction
{

    public static function execute(\Resto2web\Core\Domain\Orders\Models\Order $order)
    {
        $order->status->transitionTo(Canceled::class);
        Notification::route('mail',$order->email)
            ->notify(new UserOrderConfirmedNotification($order));
    }
}
