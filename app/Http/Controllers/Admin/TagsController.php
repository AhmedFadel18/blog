<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagsController extends Controller
{
    public function index()
    {
        $tags = Tag::withCount('posts')->with('posts')->get();
        return view('admin.tags.index', compact('tags'));
    }

    public function showTagPosts($id){
        $posts=Post::whereHas('tags',function($q)use($id){
            $q->where('tag_id',$id);
        })->get();

        return view('admin.posts.tag-posts',compact('posts'));
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
        ]);
        $tag = new Tag();
        $tag->name = $request->name;
        $tag->save();

        return redirect()->route('admin.tags.index')->with('message','Tag Added Successfully');
    }

    public function edit($id){
        $tag=Tag::find($id);
        return view('admin.tags.edit',compact('tag'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'name'=>'required',
        ]);
        $tag=Tag::find($id);
        $tag->name=$request->name;
        $tag->update();
        return redirect()->route('admin.tags.index')->with('message','Tag Updated Successfully');
    }

    public function delete($id){
        $tag=Tag::find($id);
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('message','Tag deleted Successfully');

    }
}
