<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Comment;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function allBids()
    {
        $allBids = Cache::remember('all-bids', 2, function () {
            return DB::table('bids')
            ->leftJoin('items', 'items.id', '=', 'bids.item_id')
            ->leftJoin('users', 'users.id', '=', 'bids.user_id')
            ->orderBy('item_id', 'DESC')->orderby('amount', 'DESC')->limit(30)->simplePaginate(10);
        });
        return view('admin.bids', ['allBids' => $allBids]);
    }

    public function allComments()
    {
        $allComments = Cache::remember('all-comments', 2, function () {
            return DB::table('comments')
            ->leftJoin('items', 'items.id', '=', 'comments.item_id')
            ->leftJoin('users', 'users.id', '=', 'comments.user_id')
            ->select('users.username','users.email','items.name','comments.*')
            ->orderBy('comments.id', 'DESC')->limit(30)->simplePaginate(10);
        });
        return view('admin.comments', ['allComments' => $allComments]);
    }
}
