<?php

namespace App\Http\Livewire;

use livewire;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartList extends Component
{
    protected $listeners = ['cart_updated' => 'render'];

    public function render()
    {
        $cartProducts = Cart::content();
        return view('livewire.cart-list', compact('cartProducts'));
    }
}
