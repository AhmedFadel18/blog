<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function index(){
        $data=Setting::find(1);
        return view('admin.settings.index',compact('data'));
    }

    public function generalEdit(){
        $settings=Setting::find(1);

        return view ('admin.settings.edit',compact('settings'));
    }

    public function generalUpdate(Request $request){
        $settings=Setting::find(1);
        $settings->blog_name=$request->blog_name;
        $settings->owner=$request->owner;
        $settings->description=$request->description;

        $settings->update();
        return redirect()->route('admin.settings')->with('message','The Settings Has Updated Successfully');
    }


}
