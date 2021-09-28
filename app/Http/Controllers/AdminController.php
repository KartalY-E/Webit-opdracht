<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function index()
    {
        $this->middleware('admin');

        $allBids = Cache::remember('all-bids', 2, function () {
            return DB::table('bids')
            ->leftJoin('items', 'items.id', '=', 'bids.item_id')
            ->leftJoin('users', 'users.id', '=', 'bids.user_id')
            ->orderBy('item_id', 'DESC')->orderby('amount', 'DESC')->limit(30)->simplePaginate(10);
        });
        return view('admin.bids', ['allBids' => $allBids]);
    }
}
