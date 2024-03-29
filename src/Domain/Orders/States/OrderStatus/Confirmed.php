<?php


namespace Resto2web\Core\Domain\Orders\States\OrderStatus;


class Confirmed extends OrderStatus
{
    public static string $name = 'confirmed';

    public function color(): string
    {
        return 'green';
    }

    public function displayName(): string
    {
        return 'confirmée';
    }
}
