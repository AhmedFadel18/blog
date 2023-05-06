<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AdminAuthController extends Controller

    {
        public function index()
        {
            return view('admin.auth.login');
        }

        public function login(Request $request)
        {
            $request->validate([
                'email' => 'required|exists:admins',
                'password' => 'required'
            ], [
                'email.required' => 'Enter your email !',
                'password.required' => 'Enter your password !',
            ]);

            $credentials = $request->only('email', 'password');
            if (auth()->guard('admin')->attempt($credentials)) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->back()->with('fail', 'Sorry, Your Details Are Not Valid');
            }
        }

        public function register()
        {

            return view('admin.auth.register');
        }

        public function createUser(Request $request)
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:admins',
                'password' => 'required|min:8'
            ], [
                'name.required' => 'Enter your name !',
                'email.required' => 'Enter your email !',
                'email.unique' => 'This email is already used !',
                'password.required' => 'Enter your password !',
                'password.unique' => 'The password should be 8 charactares at least !',
            ]);
            $admin = new Admin;
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->password = Hash::make($request->password);

            $admin->save();

            return redirect()->route('admin.dashboard')->with('message', 'You Have Registered Successfully');
        }


        public function logout()
        {
            Session::flush();
            Auth::logout();

            return redirect()->route('home');
        }
        public function showForgetPasswordForm()
        {
            return view('admin.auth.forget_password');
        }

        public function submitForgetPasswordForm(Request $request)
        {
            $request->validate([
                'email' => 'required|email|exists:admins'
            ], [
                'email.required' => 'Enter your email',
                'email.email' => 'Invalid email address',
                'email.exists' => 'This email is not exists'
            ]);
            $token = Str::random(64);
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
            Mail::send('email.forgetPassword', ['token' => $token], function ($message) use ($request) {
                $message->to($request->email);
                $message->subject('Reset Password');
            });

            return back()->with('message', 'Please Check Your Index To Reset Your Password');
        }

        public function showResetPasswordForm($token)
        {
            return view('admin.auth.reset_password',['token'=>$token]);
        }

        public function submitResetPasswordForm(Request $request){
            $request->validate([
                'email' => 'required|email|exists:admins',
                'password' => 'required|min:8',
                'password' => 'required|min:8',
            ]);
            $updatePassword = DB::table('password_resets')->where(['email' => $request->email, 'token' => $request->token])->first();
            if (!$updatePassword) {
                return redirect()->back()->withInput()->with('mesage', 'Invalid Token!');
            }
            $admin = Admin::where('email', $request->email)->update(['password' => Hash::make($request->password)]);

            DB::table('password_resets')->where(['email' => $request->email])->delete();

           return redirect('admin.auth.login')->with('message','Your Password Has Been Changed');
        }
    }

