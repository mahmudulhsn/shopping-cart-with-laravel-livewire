<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="grid grid-cols-3 grid-rows-3 gap-4">
            @foreach ($products as $product)
            <div class="p-6 bg-white-100 shadow-lg rounded-md">
                <form wire:submit.prevent="addToCart({{ $product->id }})" action="">
                    <h3 class="text-xl font-bold">{{ $product->name }}</h3>
                    <p>Price: {{ $product->price }} </p>
                    <p>Stock    : {{ $product->quantity }}</p>
                    <div class="grid grid-cols-2 grid-rows-1 gap-4">
                        <div>
                            <input wire:model="quantity.{{ $product->id }}" class="border border-gray-600 shadow-lg" type="number">
                        </div>
                        <div>
                            <button class="rounded-md ml-3 bg-green-600 float-right px-2 py-2" {{ $product->quantity <= 1 ? 'disabled' : ''}}>Add to Cart</button>
                        </div>
                    </div>
                </form>
            </div>
            @endforeach
        </div>
    </div>
</div>
