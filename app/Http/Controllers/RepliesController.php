<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Reply;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
      public function store(Request $request){
        $reply=new Reply();
        $reply->reply_body=$request->reply_body;
        $reply->user_id=auth()->user()->id;
        $reply->comment_id=$request->commentId;
        $reply->save();

        return redirect()->back();
    }

    public function delete($id){
        $reply=Reply::find($id);
        $reply->delete();

        return redirect()->back();
    }
}
