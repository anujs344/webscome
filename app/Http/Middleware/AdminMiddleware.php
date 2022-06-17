<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//use Session;
class AdminMiddleware
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
        if (Auth::check() && Auth::user()->role == 1)
            return $next($request);
        else if(Auth::check() && Auth::user()->role == 2) { //teammember trying to access
            return redirect()->to('/dashboard')->with('error','Selected Action Restricted to Super Admin Only');
        }
        if(Auth::check()) {
            Auth::logout();
            return redirect('/login');
        }
        return redirect('/login');
    }
}
