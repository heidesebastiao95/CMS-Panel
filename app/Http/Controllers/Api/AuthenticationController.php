<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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

        $token = $user->createToken('myapptoken')->plainTextToken;

        return response()->json([
            'user'=> $user,
            'token'=> $token
        ]);
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email'=> 'required|email',
            'password'=> 'required|string'
        ]);

        if(User::where('email',$fields['email'])->exists())
        {
            $user = User::where('email',$fields['email'])->first();

            if(Hash::check($fields['password'],$user->password))
            {
                $token = $user->createToken('myapptoken')->plainTextToken;

                return response()->json([
                    'User'=> $user,
                    'Token'=> $token
                ]);
            }

            return response()->json([
                'Message'=> 'incorrect Password!'
            ],401);
        }

        return response()->json([
            'Message'=> 'The email does not exists!'
        ],401);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'Message'=> 'Logged out!',
            // 'user'=> $request->user()
        ]);
    }
}
