<div class="w-auto p-8">
    <a href="{{ route('items.show', $item) }}">
        <img src="{{ asset('images/' . $item->image) }}" alt="" class="w-full object-cover h-80 align-middle">
        <h3>{{ $item->name }}</h3>
        <p>
            Starting bid &euro; {{ $item->starting_bid }}
        </p>
    </a>

    @can('admin', Model::class)
    <div class="flex ">
        <div class="m-2">
            <x-button>
                <a href="{{ route('items.edit', $item) }}">Edit</a>
            </x-button>
        </div>
        <div class="m-2">
            <form action="{{ route('items.destroy', $item) }}" method="POST">
                @csrf
                @method('DELETE')

                <x-button type="submit">Delete</x-button>
            </form>
        </div>

    </div>
    @endcan


</div>
