<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $posts=Post::withCount(['comment'])->orderBy('comment_count', 'DESC')->get();
        $latest=Post::orderBy('id','DESC')->take(3)->get();
        $tag=Tag::all();
        return view('home.index',compact('posts','latest','tag',));
    }

    public function tags($id){
        $tag=Tag::find($id);
        $post=Post::withCount('comment')
        -> whereHas('tags',function($q) use($id){
            $q->where(['tag_id'=>$id]);
        }) ->get();
        return view('home.category',compact('tag','post'));
    }

    public function contact(){
        $user=User::all();
        return view('home.contact_us',compact('user'));
    }

}
