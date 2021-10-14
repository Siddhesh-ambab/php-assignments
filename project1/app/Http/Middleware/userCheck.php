<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class userCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request,Closure $next)
    {
            if($request->balance>100)
            {
                return redirect('denied');
            }
        return $next($request);
    }
}
