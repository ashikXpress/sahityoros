<?php

namespace App\Http\Middleware;

use App\Admin;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard='admin')
    {

        if (!Auth::guard($guard)->check()) {

        return redirect()->route('showAdminLogin');
        }
        $admin=$request->user($guard);

        if ($admin->admin_status!=1){
            Auth::guard($guard)->logout();
            return redirect()->route('showAdminLogin');
        }

        return $next($request);
    }
}
