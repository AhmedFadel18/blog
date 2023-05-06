<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Reply;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PostsController extends Controller
{
    public function allPosts()
    {

        $post = Post::withCount(['comment'])->orderBy('comment_count', 'DESC')->get();
        return view('home.posts', compact('post'));
    }


    public function create()
    {
        if (Auth::user()) {
            $tags = Tag::all();
            return view('home.create_post', compact('tags'));
        }
        return view('home.auth.login');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg,svg',
        ], [
            'title.required' => 'Enter your post title',
            'description.required' => 'Enter your post description',
            'image.required' => 'Upload your post image',
        ]);

        $post = new Post();
        $image = $request->image;
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move('assets/images/posts/', $imageName);
        $post->image = $imageName;

        $slug = Str::slug($request->title, '-');
        $post->slug = $slug;

        $post->title = $request->title;
        $post->description = $request->description;

        $post->user_id = auth()->user()->id;

        $post->save();
        $post->tags()->attach($request->tags);
        $post->update();

        return redirect('/')->with('message', 'Your post added successfully');
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $comment = Comment::where('post_id', $post->id)->get();
        $commentsCount = $comment->count();

        return view('home.details', compact('post', 'comment', 'commentsCount',));
    }

    public function edit($id)
    {
        $tags = Tag::all();
        $post = Post::find($id);
        return view('home.edit', compact('tags', 'post'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg,svg',
        ], [
            'title.required' => 'Enter your post title',
            'description.required' => 'Enter your post description',
            'image.required' => 'Upload your post image',
        ]);

        $post = Post::find($id);

        if ($request->hasFile('image')) {
            $path = 'assets/images/posts/' . $post->image;
            if (File::exists($path)) {
                File::delete($path);
            }

            $image = $request->image;
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('assets/images/posts/', $imageName);
            $post->image = $imageName;
        }

        $slug = Str::slug($request->title, '-');
        $post->slug = $slug;

        $post->title = $request->title;
        $post->description = $request->description;
        $post->tag_id = $request->tag;
        $post->user_id = auth()->user()->id;

        $post->update();

        return redirect('/')->with('message', 'Your post updated successfully');
    }

    public function delete($id)
    {
        $post = Post::find($id);

        $path = 'assets/images/posts/' . $post->image;
        File::delete($path);

        $post->delete();

        return redirect('/')->with('message', 'Your post deleted successfully');
    }

    public function search(Request $request)
    {
        $searchText = $request->search;
        $post = Post::where('title', 'LIKE', "$searchText%")->paginate(10);

        return view('home.search', compact('post'));
    }
}
