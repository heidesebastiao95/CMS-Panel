<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Database\Eloquent\Builder;

class ThereIsMessage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check())
        {
            if(Message::where('receptor',Auth::user()->id)->where('status','unseen')->exists())
            {
                  $messages = Message::where('receptor',Auth::user()->id)->where('status','unseen')->get();
                  $total = Message::where('receptor',Auth::user()->id)->where('status','unseen')->count('status');
                
                    View::share([
                        'messagesRecived'=>$messages,
                        'total'=> $total
                    ]);
            }
        }
        return $next($request);
    }
}
