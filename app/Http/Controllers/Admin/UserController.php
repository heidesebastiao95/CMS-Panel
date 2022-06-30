<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsersRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::simplePaginate(5);

        return view('admin.users.index',[
            'users'=> $users,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // return view('admin.users.create');
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

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->role,
            'gender' => $request->gender,
            'phone_namber' => $request->phone,
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'success'=> 'Successfuly'
        ]);
        }

      return response()->json([
        'error'=>"the email already exists"
      ],300);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        //$data['id']
        return view('admin.users.edit',[
            'user' => $data
        ]);
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
        $validated = $request->validated();

        $user = User::find($id);

        if(Hash::check($request->password,$user->password))
        {
            User::where('id',$id)
                ->update([
                    'name' => $request->name,
                    'username' => $request->username,
                    'email' => $request->email,
                    'role' => $request->role,
                    'gender' =>$request->gender,
                   // 'img', $request->photo,
                    'phone_namber' => $request->phone,
                     'password' => Hash::make($request->newPassword)
                ]);

        return response()->json(['success'=>"SuccessFuly"]);
        }

       return response()->json(['error'=>'incorrect password'],300);

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
        return response()->json(['succes'=>'ok']);
    }

    public function deleteSelected(Request $request)
    {
        $values = $request->ids;
        User::whereIn('id',$values)->delete();

        return response()->json(['success'=>'ok']);
    }

    public function updatePhoto(Request $request, $id)
    {
        $request->validate([
            'user_photo' => ['required','mimes:png,jpg,jpeg','max:5048']
        ]);

        $newName = time().'-'.$request->user_photo->getClientOriginalName().'.'.$request->user_photo->extension();
        $request->file('user_photo')->move(public_path('images'),$newName);

        User::where('id',$id)->update([
            'img' => $newName
        ]);

        return redirect()->back();

    }
}
