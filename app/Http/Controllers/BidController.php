<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmBid;
use App\Models\Bid;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;

use App\Rules\ValidBid;

class BidController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $bids =  Bid::where('user_id', Auth::id())->simplePaginate(5);
        return view('bids.index', ['bids' => $bids]);
    }

    public function store(Request $request, Item $item)
    {
        $request->validate([
            'amount' => ['required', new ValidBid($item)],
        ]);

        $bid = Bid::updateOrCreate(
            ['user_id' => Auth::id(), 'item_id' => $item->id],
            ['amount' => $request->amount]
        );

        Mail::to(Auth::user()->email)->send(new ConfirmBid($item,$bid));

        return view('bids.thankyou', ['item' => $item, 'bid' => $bid]);
    }

    public function destroy(Item $item)
    {
         $temp = Bid::where('user_id', Auth::id())
            ->where('item_id',$item->id)
            ->first();

        $temp->delete();

        return Redirect::route('bids.index')->with('success', 'Your bid on ' . $item->name .' was removed.');
    }
}
