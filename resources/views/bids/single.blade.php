
<div class="w-auto p-8 ">
    <img src="{{ asset('images/'.$bid->item->image) }}" alt="" class="w-40 mx-auto">
</div>
<div class="flex p-8 col-span-2 p-8  justify-center items-center ">
    <div class=" justify-center items-center">
        <h3>{{ $bid->item->name  }}</h3>
        <h3>Starting bid: &euro;{{ $bid->item->starting_bid  }}</h3>
        <h3>Your bid: &euro;{{ $bid->amount }} made on {{ $bid->updated_at->isoFormat('D-M-Y H:mm') }}</h3>

        <form action="{{ route('bids.destroy', $bid->item) }}" method="POST">
            @csrf
            @method('delete')   
            <x-button type="submit">Remove</x-button>
        </form>
    </div>
</div>