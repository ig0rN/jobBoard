<?php

namespace App\Http\Middleware;

use Closure;

class ModeratorMiddleware
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

        if (!$user->isModerator()){
            $route = $user->redirectRouteBasedOnRole();
            
            return redirect()->route($route);
        }
        
        return $next($request);
    }
}
