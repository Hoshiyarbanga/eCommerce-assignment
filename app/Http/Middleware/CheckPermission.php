<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $route= \Request::route()->getName(); 
        $roles = Auth::user()->roles;
        foreach ($roles as $role) {
            $role = Role::where('slug', $role->slug)->first();
            $permissions = Permission::where('slug',$route)->first();             
            $abc = $role->permissions;
            foreach ($abc as $permission) {
                if($permission->id == $permissions->id) {
                    return $next($request);
                }
            }
        }
        abort(403, 'You Have Not Permission to Access this Page');
    }
}
