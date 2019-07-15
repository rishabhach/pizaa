<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::User();
        if(!$user)
            return redirect()->route('login')->with('success','please login first');
        if($user->role->id==1){
            return $next($request);
        }

        return redirect('/');
    }
}
