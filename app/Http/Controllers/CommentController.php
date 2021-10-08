<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Item;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function __Construct()
    {
        $this->middleware('auth');
    }

    public function store(StoreCommentRequest $request)
    {
        $validated =  $request->validated();
        
        $item = Item::where('slug', '=', $request->item)->first();

        Comment::Create([
            'comment' => $validated['comment'],
            'user_id' => Auth::id(),
            'item_id' => $item->id
        ]);

        return Redirect::route('items.show',$item);


    }
    public function destroy(Comment $comment)
    {
        $this->middleware('admin');

        $comment->delete();
        return Redirect::route('admins.comments')->with('success', $comment->comment .' was removed.');
    }

}
