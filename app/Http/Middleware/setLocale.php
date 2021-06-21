<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class setLocale
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
        $availableLangs  = array('en', 'am');
        $userLangs = $request->language;

    if (in_array($userLangs, $availableLangs))
        {
            App::setLocale($userLangs);

        }
        else {
            App::setLocale('en');

        }
        return $next($request);
    }
}
