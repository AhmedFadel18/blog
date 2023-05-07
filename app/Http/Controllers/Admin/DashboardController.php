<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $users=User::count();
        $activeUsers=User::withCount('post','comment')->orderby('post_count','DESC')->take(1)->get();
        $posts=Post::count();
        $popularPosts=Post::withCount('comment')->orderby('comment_count','DESC')->take(1)->get();
        return view('admin.index',compact('users','activeUsers','posts','popularPosts'));
    }
}
