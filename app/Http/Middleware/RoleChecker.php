<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class RoleChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next , ...$roles)
    {
        if (!Auth::check())
        return redirect('login');
        $user = Auth::user();
        foreach($roles as $role)
        {
            if($user->Role() == $role)
            {
                return $next($request);
            }
        }
        
        return redirect('login');
    }
}
