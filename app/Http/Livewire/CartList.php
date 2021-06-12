<?php

namespace App\Http\Livewire;

use App\Models\Product;
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

    public function removeProduct($rowId, $productID, $qty)
    {
        Cart::remove($rowId);
        $product = Product::findOrFail($productID);

        $product->update([
            'quantity' => $product->quantity + $qty
        ]);

        $this->emit('cart_updated');
        $this->emit('stock_updated');
    }
}
