<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthMiddleware
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
        if (Auth::guest()){
            return redirect()->route('showUserLogin');
        }
//        $user = $request->user();
//
//        if ($user->login_status==0) {
//            return redirect()->route('showUserLogin');
//        }
        $user = $request->user();

        if($user->login_status != 1){
            Auth::logout();
            return redirect()->route('showUserLogin');
        }

        return $next($request);
    }
}
