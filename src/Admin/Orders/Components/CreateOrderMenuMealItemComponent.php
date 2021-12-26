<?php


namespace Resto2web\Core\Admin\Orders\Components;


use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use Resto2web\Core\Domain\Cart\Actions\GetCartTotalWithDeliveryAction;
use Resto2web\Core\Domain\Meals\Models\Meal;
use Resto2web\Core\Domain\Utility\Helpers\CartOrderHelper;

class CreateOrderMenuMealItemComponent extends Component
{
    public Meal $meal;

    public function render()
    {
        return view('resto2web-admin::pages.orders.components.create-order-menu-meal-item-component');
    }

    public function addToCart()
    {
        CartOrderHelper::addToCart($this->meal);
        $this->emit('updatedCart');
    }

}
