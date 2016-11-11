<?php

namespace App\Http\Middleware;

use Closure;

class DetectSelenium
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
        if (isset($_COOKIE['selenium_request']) && app()->isLocal()) {  
            config(['database.default' => 'mysql_testing']);

            if (isset($_COOKIE['selenium_auth'])) {
                \Auth::loginUsingId((int) $_COOKIE['selenium_auth']);
            }
        }

        return $next($request);
    }
}
