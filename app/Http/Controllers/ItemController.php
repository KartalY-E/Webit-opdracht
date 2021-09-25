<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::latest()->paginate(2);
        return view('items.index', ['items' => $items]);
    }

    public function show(Item $item)
    {
        return view('items.show', ['item' => $item]);
    }

    public function create()
    {
        $this->authorize('item_create');
        return view('items.create');
    }

    public function store(Request $request)
    {
        $this->authorize('item_create');
        $request->validate([
            'name' => 'required|unique:users|max:255',
            'description' => 'required',
            'starting_bid' => 'required|integer'
        ]);

        Item::Create([
            'name' => $request->name,
            'description' => $request->description,
            'starting_bid' => $request->starting_bid,
            'image' => $request->image,
            'slug' => Str::slug($request->name, '-')
        ]);

        return Redirect::route('items.index');
    }

    public function edit(Item $item)
    {
        $this->authorize('item_edit');
        return view('items.edit', ['item' => $item]);
    }

    public function update(Request $request, Item $item)
    {
        $this->authorize('item_update');
        $request->validate([
            'name' => 'required|unique:users|max:255',
            'description' => 'required',
            'starting_bid' => 'required|integer',
            'image' => 'required'
        ]);

        $item->name = $request->name;
        $item->description = $request->description;
        $item->starting_bid = $request->starting_bid;
        $item->image = $request->image;
        $item->slug = Str::slug($request->name, '-');
        $item->save();

        return Redirect::route('items.index');
    }

    public function destroy(Item $item)
    {
        $this->authorize('item_destroy');
        Item::destroy($item->id);

        return Redirect::route('items.index');
    }
}
