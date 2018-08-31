<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use Closure;

class IsAccepted
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
                if (Auth::user()->seminar_packet == null) {
                    return $next($request);
                } else {
                    return Redirect::to('/dashboard');
                }
            } 
            return Redirect::to('/dashboard/payment');
        }
        return redirect('home');
    }
}
