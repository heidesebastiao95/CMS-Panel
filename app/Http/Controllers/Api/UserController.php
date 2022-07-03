<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        
        return response()->json([
            'data'=> $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        $validate = $request->validated();

        if(!(User::where('email',$request->email)->exists())){

        return User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->role,
            'gender' => $request->gender,
            'phone_namber' => $request->phone,
            'password' => Hash::make($request->password)
        ]);

        }

      return response()->json([
        'error'=>"the email already exists"
      ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $user = User::find($id);

       if(!User::where('id',$id)->exists())
       {
            return response()->json([
                'Error'=> 'User not Found'
            ],204);
       }

       return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersRequest $request, $id)
    {
       // $validated = $request->safe()->only(['password']);
        $request->validated();
        $user = User::find($id);

        if(Hash::check($request->password,$user->password))
        {
          return  User::where('id',$id)
                ->update([
                    'name' => $request->name,
                    'username' => $request->username,
                    'email' => $request->email,
                    'role' => $request->role,
                    'gender' =>$request->gender,
                   // 'img', $request->photo,
                    'phone_namber' => $request->phone,
                    // 'password' => Hash::make($request->newPassword)
                ]);
        }

       return response()->json(['error'=>'incorrect password'],204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id',$id)->delete();
        return response()->json(['success'=>'ok']);
    }
}
