<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{
    protected $user;
    
    public function index()
    {
        $users = User::select('*')
            //->whereNotNull('last_seen')
            ->where('id','!=',Auth::user()->id)
            ->orderByDesc('last_seen')
            ->simplePaginate(10);

        return view('admin.users.users-online',[
            'users' => $users
        ]);
    }

    public function talk($user)
    {
       $this->user = User::find($user);

       //Mark all messages as seen
       Message::where('transmitter',$this->user->id)
       ->where('receptor',Auth::user()->id)
       ->where('status','unseen')
       ->update([
           'status' => 'seen'
       ]);
       //************************** 
       
        $messages = Message::where('transmitter',Auth::user()->id)->where('receptor',$user)
        //or
        ->orWhere(function($query) {
                    $query->where('transmitter',$this->user->id)
                    ->where('receptor',Auth::user()->id);
                }
            )->get();

        return view('admin.users.chat',[
            'messages' => $messages,
            'receptor'=> $this->user
        ]);

    }

    public function sendMessage(Request $request)
    {
        Message::create([
            'transmitter' => $request->transmitter,
            'receptor' => $request->receptor,
            'content' => $request->message
        ]);

        return response()->json([
            'success' => 'Successfully'
        ]);
    }
}
