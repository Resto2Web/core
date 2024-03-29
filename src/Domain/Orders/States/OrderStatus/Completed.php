<?php


namespace Resto2web\Core\Domain\Orders\States\OrderStatus;


class Completed extends OrderStatus
{
    public static string $name = 'completed';

    public function color(): string
    {
        return 'green';
    }

    public function displayName(): string
    {
        return 'confirmée';
    }
}
