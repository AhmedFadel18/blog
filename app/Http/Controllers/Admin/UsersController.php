<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index(){
        $users=User::withCount('post')->paginate(50);
        $admins=Admin::paginate(10);

        return view('admin.users',compact('users','admins'));
    }

    public function showUserPosts($id){
        $posts=Post::where('user_id',$id)->paginate(20);
        $user=User::find($id);
        return view('admin.posts.user-posts',compact('posts','user'));
    }

    public function makeAdmin($id){
        $user=User::find($id);
        $admin=new Admin();
        $admin->name = $user->name;
        $admin->email = $user->email;
        $admin->password = $user->password;

        $admin->save();
        $user->delete();

        return redirect()->back()->with('message','The Admin Has Added Successfully');
    }

    public function deleteAdmin($id){
        $admin=Admin::find($id);
        $user=new User();
        $user->name = $admin->name;
        $user->email = $admin->email;
        $user->password = $admin->password;

        $user->save();
        $admin->delete();

        return redirect()->back()->with('message','The Admin Has Removed Successfully');
    }

    public function blockUser($id){
        $user=User::find($id);
        $user->active_status=0;

        return redirect()->back()->with('message','The User Has Blocked Successfully');
    }
}
