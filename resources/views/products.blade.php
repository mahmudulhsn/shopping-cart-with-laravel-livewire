<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <span>Dashboard</span>
            <span class="float-right">Cart(1)</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="grid grid-flow-col grid-cols-3 grid-rows-3 gap-4">
                    @foreach ($products as $product)
                    <div class="p-6 bg-red-100 shadow-lg rounded-md">
                        <h3>{{ $product->name }}</h3>
                        <p>Price: {{ $product->price }} </p>
                        <p>Quantity: {{ $product->quantity }}</p>
                        <button class="rounded-md px-2 py-1 bg-green-600 hover:bg-blur-700 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50">Add to Cart</button>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
