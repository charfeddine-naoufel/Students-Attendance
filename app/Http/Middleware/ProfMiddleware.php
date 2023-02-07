<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfMiddleware
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
            if(Auth::user()->role == 'prof')
            {
                return $next($request);

            }
            else {
                
                    return redirect('/admin/home')->with('message',"Vous n'êtes pas autorisés à accéder !!!" );
                
            }
        }
        else {
            {
                return redirect('/login')->with('message',"Vous devez vous identifer !!!" );

            }
        }
    }
}
