<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Items') }}
        </h2>
        @can('admin', Items::class)
            <x-button>
                <a href="{{ route('items.create') }}">Create New Item</a>

            </x-button>
            
        @include('layouts.succes')
        @endcan
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="p-6 bg-white border-b border-gray-200 grid grid-cols-2">
                    
                    @each('items.single', $items, 'item', 'items.empty')
                    <div class="p-3">
                        {{ $items->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
