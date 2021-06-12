<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <span>Dashboard</span>
            @livewire('cart-counter')
        </h2>
    </x-slot>

    <div class="py-12">
        @livewire('products-table')
    </div>
</x-app-layout>
