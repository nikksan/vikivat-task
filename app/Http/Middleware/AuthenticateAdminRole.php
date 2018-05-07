<?php

namespace App\Http\Middleware;

use Closure;
use App\Role;
use Auth;

class AuthenticateAdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        if(!Auth::user() || !Auth::user()->hasRole(Role::ADMIN)){
            return redirect('admin/login')->with('error', 'You dont have permission for access');
        }

        return $next($request);
    }
}
