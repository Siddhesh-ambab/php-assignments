<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class auth
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
        if(!$request->session()->has('name')){
             $request->session()->flash('error','Access denied');
             return redirect('forms');
         }

        return $next($request);
    }
}
