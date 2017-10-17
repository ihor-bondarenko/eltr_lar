<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class TrainerRedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
          if($request->user()->can('create-trainer')){
              return redirect('/trainer');
          } elseif ($request->user()->can('read-viewer')) {
            return redirect('/viewer');
          }else{
            abort(403, 'unauthorized_action');
          }
        }
        return $next($request);
    }
}
