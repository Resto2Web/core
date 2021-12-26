<?php

namespace Resto2web\Core\Settings;

use Spatie\LaravelSettings\Settings;

class MenuSettings extends Settings
{
    public bool $takeaway;
    public bool $delivery;

    public float $minimumOrder;
    public bool $hasFreeDeliveryMinimum;
    public float $freeDeliveryMinimum;
    public float $deliveryPrice;

    public static function group(): string
    {
        return 'menu';
    }

    public function onlyDelivery(): bool
    {
        return $this->delivery && !$this->takeaway;
    }

    public function onlyTakeaway(): bool
    {
        return !$this->delivery && $this->takeaway;
    }
}
