<?php

namespace Maxpro\Role\Http\Middleware;

use Maxpro\Role\Http\Controllers\DynamicRoutes;
use Closure;

class RefreshDynamicMenu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $DynamicRoutes = new DynamicRoutes();
		$DynamicRoutes->refreshMenu();
        return $next($request);
    }
}
