<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CheckModulePermission
{
    public function handle(Request $request, Closure $next)
    {
        $route = $request->route();
        $action = $route->getAction();
        
        // Format: modules/{module}/{controller}/{method}
        $path = $request->path();
        $pathSegments = explode('/', $path);
        
        if (count($pathSegments) >= 3 && $pathSegments[0] === 'modules') {
            $module = $pathSegments[1];
            $controller = $pathSegments[2];
            $method = $pathSegments[3] ?? 'index';
            
            $permissionName = "{$module}.{$controller}.{$method}";
            
            if (!auth()->user()->can($permissionName)) {
                abort(403, 'Unauthorized access to '.$permissionName);
            }
        }

        return $next($request);
    }
}