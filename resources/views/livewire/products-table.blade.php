
<div class="col-span-2">
    <h2 class="text-2xl font-bold text-center text-red-600">Product List</h2>
    <div class="grid grid-cols-3 gap-4">
        @foreach ($products as $product)
        <div class="p-6 bg-white-100 shadow-lg rounded-md">
            <form wire:submit.prevent="addToCart({{ $product->id }})">
                <h3 class="text-xl font-bold">{{ $product->name }}</h3>
                <p>Price: {{ $product->price }} </p>
                <p>Stock    : {{ $product->quantity }}</p>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <input wire:model="quantity.{{ $product->id }}" class="border border-gray-600 shadow-lg" type="number" min="1" required>
                    </div>
                    <div class="col-span-2">
                        <button class="rounded-md ml-3 bg-green-600 float-right px-2 py-2" {{ $product->quantity <= 1 ? 'disabled' : ''}}>Add to Cart</button>
                    </div>
                </div>
            </form>
        </div>
        @endforeach
    </div>
</div>

