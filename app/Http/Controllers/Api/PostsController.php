<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostsResource;
use Symfony\Component\HttpFoundation\RequestStack;

class PostsController extends BaseController
{
    public function index(){
        $posts=Post::all();
        return $this->sendResponse(PostsResource::collection($posts),'Success');
    }

    public function show($id){
        $post= Post::find($id);
        if($post){
            return $this->sendResponse(new PostsResource($post),'Success');
        }
        return $this->sendError('Post Not Found');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $post = new Post;
        $slug = Str::slug($request->title, '-');
        $post->slug = $slug;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = auth()->user()->id;
        $post->save();
        $post->tags()->attach($request->tags);
        $post->update();

        return $this->sendResponse(new PostsResource($post),'Post Created Successfully');
    }

    public function update (Request $request , $id){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $post = Post::find ($id);
        if ($post){
        $slug = Str::slug($request->title , '-');
        $post->slug - $slug;
        $post-> title = $request->title;
        $post->description = $request->description;
        $post->tags()->sync($request->tags);
        $post->user_id =auth()->user()->id;
        $post->save();

        return $this->sendResponse(new PostsResource($post),'Post Updated Successfully');
        }
        return $this->sendError('Post Not Found');
    }

    public function delete($id){
        $post = Post::find ($id);
        if ($post){
        $post->delete();
            return $this ->sendResponse([],'Post Deleted');
        }
        return $this ->  sendError('Post Not Found');
    }
}
