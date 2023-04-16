<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{

    public function store(Request $request){
        $comment=new Comment();
        $comment->comment_body=$request->comment_body;
        $comment->user_id=auth()->user()->id;
        $comment->post_id=$request->postId;
        $comment->save();

        return redirect()->back();
    }

    public function delete($id){
        $comment=Comment::find($id);
        $comment->delete();

        return redirect()->back();
    }
}
