<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function index(){
        $posts=Post::paginate(10);
        $pending_posts=Post::where(['status'=>0])->paginate(10);
        return view ('admin.posts.index',compact('posts','pending_posts'));
    }

    public function showPost($id){
        $post=Post::where('id',$id)->first();
        return view('admin.posts.show-post',compact('post'));
    }

    public function publish($id){
        $post=Post::find($id);
        $post->status=1;
        $post->update();

        return redirect()->back()->with('message','The Post Has Published Successfully');
    }

    public function delete($id){
        $post=Post::find($id);
        $post->delete();

        return redirect()->back()->with('message','The Post Has Deleted Successfully');

    }
}
