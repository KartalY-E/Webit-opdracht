<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My bids') }}
        </h2>
        @include('layouts.succes')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200  grid gap-4 grid-cols-3">
                    @each('bids.single', $bids, 'bid', 'bids.empty')
                    <div class="p-3">
                        {{ $bids->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
