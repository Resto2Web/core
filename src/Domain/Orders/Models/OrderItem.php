<?php


namespace Resto2web\Core\Domain\Orders\Models;


use Illuminate\Database\Eloquent\Model;
use Resto2web\Core\Domain\Users\Models\User;
use Resto2web\Core\Domain\Orders\States\OrderStatus\OrderStatus;
use Spatie\ModelStates\HasStates;

class OrderItem extends Model
{
    protected $guarded = [];

    protected $casts = [
        'options' => 'array'
    ];


    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}
