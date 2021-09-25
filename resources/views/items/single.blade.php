<h3>
    <a href="{{ route('items.show', $item) }}">{{ $item->name }}</a>
</h3>
<p>{{ $item->description }}</p>
@can('item_edit', Items::class)
<x-button>
    <a href="{{ route('items.edit', $item) }}">Edit</a>
</x-button>
@endcan
@can('item_destroy', Items::class)
<form action="{{ route('items.destroy', $item) }}" method="POST">
    @csrf
    @method('DELETE')

    <x-button type="submit">Delete</x-button>
</form>
@endcan
<hr>