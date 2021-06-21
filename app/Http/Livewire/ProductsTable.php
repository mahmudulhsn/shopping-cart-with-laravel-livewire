<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductsTable extends Component
{
    public $products;
    public array $quantity = [];

   protected $listeners = ['stock_updated' => 'render'];

    public function mount()
    {
        $this->products = Product::all();
        foreach ($this->products as $product) {
            $this->quantity[$product->id] = 1;
        }
    }

    public function render()
    {
        $cart = Cart::content();
        return view('livewire.products-table', compact('cart'));
    }

    public function addToCart($productID)
    {
        $product = Product::findOrFail($productID);

        Cart::add(
            $product->id,
            $product->name,
            $this->quantity[$productID],
            $product->price,
        );

        $product->update([
            'quantity' => $product->quantity - $this->quantity[$productID]
        ]);

        $this->emit('cart_updated');
        $this->emit('stock_updated');

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Product has ben added to Cart.',
            'timer'=>3000,
            'icon'=>'success',
            'toast'=>true,
            'position'=>'top-right',
            'toast' => true,
            'showConfirmButton' => false,
            'iconColor' => 'blue',
        ]);
    }
}
