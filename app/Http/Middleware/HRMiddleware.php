<?php

namespace App\Http\Middleware;

use Closure;

class HRMiddleware
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
        $user = auth()->user();

        if (!$user->isHR()){
            $route = $user->redirectRouteBasedOnRole();
            
            return redirect()->route($route);
        }
        
        return $next($request);
    }
}
