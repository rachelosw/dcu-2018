<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class IsPending
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
        if(Auth::user()) {
            if (Auth::user()->isAccepted()) {
                return Redirect::to('/dashboard');
                
            }
            return $next($request);
        }
        return redirect('home');
    }
}
