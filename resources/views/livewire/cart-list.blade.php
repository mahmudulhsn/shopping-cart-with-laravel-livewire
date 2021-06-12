<div>
    <h2><span class="text-2xl font-bold text-green-600">Cart List</span> <span class="float-right font-bold text-red-600 text-xl cursor-pointer" wire:click="clearCart">Clear Cart</span></h2>
    @if ($cartProducts->count() > 0)
        {{-- @foreach ($cartProducts as $product)
        <div class="p-6 bg-white-100 shadow-lg rounded-md">
            <form wire:submit.prevent="addToCart({{ $product->id }})">
                <h3 class="text-xl font-bold">{{ $product->name }}</h3>
                <p>Price: {{ $product->price }} </p>
                <p>Quantity: {{ $product->qty }}</p>
            </form>
        </div>
        @endforeach --}}
        <table class="w-full text-center">
            <thead>
                <tr>
                <th class="py-5">Name</th>
                <th class="py-5">Qty</th>
                <th class="py-5">Price</th>
                <th class="py-5"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartProducts as $product)
                <tr class="bg-white-100 shadow-lg rounded-md">
                <td class="py-5">{{ $product->name }}</td>
                <td class="py-5">
                    <span class="p-2 font-bold text-2xl cursor-pointer" wire:click="removeUpdateCart('{{ $product->rowId }}', {{ $product->id }}, {{ $product->qty }})">-</span>
                    {{ $product->qty }}
                    <span class="p-2 font-bold text-2xl cursor-pointer" wire:click="addUpdateCart('{{ $product->rowId }}', {{ $product->id }}, {{ $product->qty }})">+</span>
                <td class="py-5">{{ number_format($product->price, 2) }}</td>
                <td class="py-5"><span class="text-red-800 text-xl font-bold cursor-pointer" wire:click="removeProduct('{{ $product->rowId }}', {{ $product->id }}, {{ $product->qty }})">X</span></td>
                </tr>
                @endforeach
            </tbody>
            <tfoot class="font-bold">
                <tr class="p-10 bg-white-100 shadow-lg rounded-md">
                <td class="py-5"></td>
                <td class="py-5">Subtotal: </td>
                <td class="py-5">{{ \Cart::subtotal() }}</td>
                <td class="py-5"></td>
                </tr>
                <tr class="p-10 bg-white-100 shadow-lg rounded-md">
                <td class="py-5"></td>
                <td class="py-5">Total: </td>
                <td class="py-5">{{ \Cart::priceTotal() }}</td>
                <td class="py-5"></td>
                </tr>
            </tfoot>
        </table>
    @else
        <h2 class="text-2xl font-bold text-center text-blue-600">Your Cart is empty! Please buy something!</h2>
    @endif
</div>
