<?php


namespace Resto2web\Core\Domain\Orders\States\OrderStatus;


class Pending extends OrderStatus
{
    public static string $name = 'pending';

    public function color(): string
    {
        return 'pink';
    }

    public function displayName(): string
    {
        return 'en attente';
    }
}
