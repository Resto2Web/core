<?php


namespace Resto2web\Core\Domain\Orders\Actions;


use Illuminate\Support\Str;
use Resto2web\Core\Domain\Orders\Models\Order;

class GenerateUniqueOrderNumberAction
{
    public static function execute(): string
    {
        do{
            $number = Str::upper(Str::random(8));
        }while(Order::where('number',$number)->count());
        return $number;
    }
}
