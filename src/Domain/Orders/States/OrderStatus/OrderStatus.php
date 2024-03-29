<?php


namespace Resto2web\Core\Domain\Orders\States\OrderStatus;


use Spatie\ModelStates\State;
use Spatie\ModelStates\StateConfig;


abstract class OrderStatus extends State
{
    abstract public function color(): string;
    abstract public function displayName(): string;

    public static function config(): StateConfig
    {
        return parent::config()
            ->allowTransitions([
                [Pending::class,Confirmed::class],
                [Pending::class,Refused::class],
                [Confirmed::class,Shipped::class],
                [Pending::class,Canceled::class],
                [Confirmed::class,Canceled::class],
                [Refused::class,Canceled::class],
            ])
            ->default(Pending::class)            ;
    }

}
