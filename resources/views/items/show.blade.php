<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $item->name }}
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
                        <h3>Starting bid: &euro;{{ $item->starting_bid }}</h3>

                        @isset($highest_bid)
                            <h3>Highest bid: &euro;{{ $highest_bid->amount }} by {{ $highest_bid->user->username }}</h3>
                        @else
                            <h3>No bids made yet</h3>
                        @endisset

                        <form method="POST" action="{{ route('bids.store', $item) }}">
                            @error('amount')
                            <div class="alert alert-danger">
                                Your bid is not high enough
                            </div>
                            @enderror
                            @csrf
                            @method('POST')
    
                            <!-- Amount -->
                            <div> 
                                <x-label for="amount" :value="__('Amount')" />
    
                                <x-input id="amount" class="block mt-1 w-full" type="number" step="1" inputmode="numeric" name="amount"
                                    required autofocus />
                            </div>
    
                            <div class="flex items-center justify-end mt-4">
                                <x-button class="ml-4">
                                    Make a Bid
                                </x-button>
                            </div>
                        </form>
                        
                    </div>
                    <div class="col-span-2 p-12">
                        <img src="{{ asset('images/' . $item->image) }}" alt="" class=" w-full h-100">
                        
                    </div>
                </div>
                @include('items/comments',['item' => $item])
            </div>
        </div>
    </div>
</x-app-layout>
