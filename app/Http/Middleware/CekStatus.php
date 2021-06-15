<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = \App\User::where('email', $request->email)->first();
        if($user->email == 'penjual@gmail.com')
        {
            return view('penjual.indexpenjual');
        }
        else{
            
        }

        return $next($request);
    }
}
