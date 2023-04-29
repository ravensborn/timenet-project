<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckBanned
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

        $user = auth()->user();

        if ($user && $user->isBanned()) {

            auth()->logout();

            return  response()->view('pages.banned');
        }


        return $next($request);
    }
}
