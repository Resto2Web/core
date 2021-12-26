<?php


namespace Resto2web\Core\Domain\Orders\States\OrderType;


class Takeaway extends OrderType
{
    public static  string $name = 'takeaway';

    public function color(): string
    {
        return 'lightblue';
        // TODO: Implement color() method.
    }

    public function displayName(): string
    {
        return 'A emporter';
    }
}
