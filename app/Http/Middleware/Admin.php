<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
{
    
    public function handle($request, Closure $next, $guard = 'admin')
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                if(Auth::guard('admin')->check()){
                }else{
                    return response('Unauthorized.', 401);
                }
            } else {
                 if (Auth::guard('user')->check()) {
                }else{
                    return redirect()->route('login');
                }
            }
        }
        return $next($request);
    }
}
