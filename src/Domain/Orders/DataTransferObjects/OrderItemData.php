<?php


namespace Resto2web\Core\Domain\Orders\DataTransferObjects;


use Spatie\DataTransferObject\DataTransferObject;

class OrderItemData extends DataTransferObject
{
    public float $quantity;
    public int $meal_id;
    public int $order_id;
    public string $name;
    public float $price;
    public array $options;
}
