<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $post=Post::all();
        $latest=Post::orderBy('id','DESC')->take(3)->get();
        $tag=Tag::all();
        return view('home.index',compact('post','latest','tag',));
    }

    public function tags($id){
        $category=Tag::find($id);
        $post=Post::where('tag_id',$id)->get();
        return view('home.category',compact('category','post'));
    }

    public function contact(){
        $user=User::all();
        return view('home.contact_us',compact('user'));
    }

}
