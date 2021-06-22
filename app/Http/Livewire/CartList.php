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

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Item has been removed.',
            'icon'=>'success',
            'iconColor'=>'blue',
        ]);
    }


    public function clearCart()
    {
        $cartProducts = Cart::content();
        foreach ($cartProducts as $cartProduct) {
            $product = Product::findOrFail($cartProduct->id);

            $product->update([
                'quantity' => $product->quantity + $cartProduct->qty
            ]);
        }
        Cart::destroy();

        $this->emit('cart_updated');
        $this->emit('stock_updated');

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Cart has ben cleared.',
            'icon'=>'success',
            'iconColor' => 'blue',
        ]);
    }

    public function addUpdateCart($rowId, $productID, $qty)
    {
        Cart::update($rowId, $qty+1);

        $product = Product::findOrFail($productID);
        $product->update([
            'quantity' => $product->quantity - 1,
        ]);

        $this->emit('cart_updated');
        $this->emit('stock_updated');


        $this->dispatchBrowserEvent('swal', [
            'title' => 'Cart has ben updated.',
            'icon'=>'success',
            'iconColor' => 'blue',
        ]);
    }

    public function removeUpdateCart($rowId, $productID, $qty)
    {
        Cart::update($rowId, $qty-1);

        $product = Product::findOrFail($productID);
        $product->update([
            'quantity' => $product->quantity + 1,
        ]);

        $this->emit('cart_updated');
        $this->emit('stock_updated');

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Cart has ben removed.',
            'icon'=>'success',
            'iconColor' => 'blue',
        ]);
    }
}
