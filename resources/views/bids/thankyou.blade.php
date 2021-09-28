<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Thank you for your bid') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 bg-white border-b border-gray-200 grid gap-4 grid-cols-3">

                    <div class="p-8">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $item->name }}</h2>
                        <p>
                            {{ $item->description }}
                            <br>{{ date('d-m-Y', strtotime($item->created_at)) }}
                        </p>
                        <h3>Starting bid: &euro;{{ $item->starting_bid }}
                            <br>

                            Your bid: &euro;{{ $bid->amount }}
                        </h3>
                        <h4>
                            You can see & remove your made bids <a href="{{ route('bids.index') }}" 
                            class="underline text-blue-600 hover:text-blue-800 visited:text-purple-600">here</a>.
                        </h4>
                        
                    </div>
                    <div class="col-span-2 p-12">
                        <img src="{{ asset('images/' . $item->image) }}" alt="" class=" w-auto">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
