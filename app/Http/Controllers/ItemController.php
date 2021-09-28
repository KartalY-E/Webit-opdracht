<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Bid;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function index()
    {
        $items = Cache::remember('all-items',60*60 ,function(){
            return Item::latest()->select('name','starting_bid','image','slug')->limit(16)->simplePaginate(4);
        });
        return view('items.index', ['items' => $items]);
    }

    public function show(Item $item)
    {
        $highest_bid = Cache::remember('highest-bid-' . $item->name, 30, function() use ($item) {
            return Bid::where('item_id', $item->id)->orderBy('amount', 'DESC')->first();
        });
        return view('items.show', ['item' => $item, 'highest_bid' => $highest_bid]);
    }

    public function create()
    {
        $this->middleware('admin');
        return view('items.create');
    }

    public function store(Request $request)
    {
        $this->middleware('admin');

        $request->validate([
            'name' => 'required|unique:users|max:255',
            'description' => 'required',
            'starting_bid' => 'required|integer',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:5000',
        ]);

        $newImageName = time() . '-' . str_replace(" ", "-", $request->name) . '.' .  $request->file('image')->guessExtension();
        $request->image->move(public_path('images'), $newImageName);

        Item::Create([
            'name' => $request->name,
            'description' => $request->description,
            'starting_bid' => $request->starting_bid,
            'image' => $newImageName,
            'slug' => Str::slug($request->name, '-')
        ]);

        return Redirect::route('items.index')->with('success', $request->name .' stored ');
    }

    public function edit(Item $item)
    {
        $this->middleware('admin');
        return view('items.edit', ['item' => $item]);
    }

    public function update(Request $request, Item $item)
    {
        $this->middleware('admin');
        $request->validate([
            'name' => 'required|unique:users|max:255',
            'description' => 'required',
            'starting_bid' => 'required|integer',
            'image' => 'image|mimes:jpg,png,jpeg|max:5000',
        ]);

        
        // update image if one is uploaded
        if ($request->file('image')) {

            $newImageName = time() . '-' . str_replace(" ", "-", $request->name) . '.' .  $request->file('image')->guessExtension();
            $request->image->move(public_path('images'), $newImageName);
            $item->image = $newImageName;
        }

        $item->name = $request->name;
        $item->description = $request->description;
        $item->starting_bid = $request->starting_bid;
        $item->slug = Str::slug($request->name, '-');
        $item->save();

        return Redirect::route('items.index')->with('success', $request->name .' updated ');
    }

    public function destroy(Item $item)
    {
        $this->middleware('admin');
        Item::destroy($item->id);
        return Redirect::route('items.index')->with('success', $item->name .' removed ');
    }
}
