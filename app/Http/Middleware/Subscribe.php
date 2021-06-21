<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class Subscribe
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
        $response =$next($request);

        if (session()->has('user')) {
            return $response;
        }
        else{
            $backurl= URL::current();
            $request->session()->put('backurl',$backurl);
            return redirect('/');
        }
    }
}
