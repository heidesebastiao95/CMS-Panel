<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class UserActivity
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
            $expires = now()->addMinute(2);

        Cache::put(
            //create a cache
            'user-online'
            .Auth::user()->id,
            true,
            $expires
        );

        User::where('id',Auth::user()->id)
            ->update([
                'last_seen'=> now()
            ]);
        }


        return $next($request);
    }
}
