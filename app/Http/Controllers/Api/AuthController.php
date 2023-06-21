<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $success['token'] = $user->createToken('user')->plainTextToken;
        $success['name'] = $user->name;

        return $this->sendResponse($success, 'User Created Successfully');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('user')->plainTextToken;
            $success['name'] = $user->name;

            return $this->sendResponse($success, 'Logged In Successfully .');
        } else {
            return $this->sendError('UnAuthorised');
        }
    }
}
