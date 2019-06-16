<?php

namespace App\Http\Middleware;

use Closure;

class CheckMethodPost
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
        if (!$_POST) {
            echo "oke";
            die();
            // return redirect('login');
        }

        return $next($request);
    }
}
