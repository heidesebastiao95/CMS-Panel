<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name'=> 'required|string',
            'username' => 'required|string',
            'email'=> 'required|email|unique:users,email',
            'password'=> 'required|confirmed|string'
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('myapptoken')->PlainTextToken;

        return response()->json([
            'user'=> $user,
            'token'=> $token
        ]);
    }

    public function login(Request $request)
    {

    }

    public function logout()
    {

    }
}
