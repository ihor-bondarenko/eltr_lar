<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIfViewerLogin
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
        if (!Auth::guard($guard)->check()) {
          if ($request->expectsJson()) {
              return response()->json(['error' => 'Unauthenticated.'], 401);
          }
          return redirect()->guest(route('login'))->with('url_intended', 'viewer');
        }
        return $next($request);
    }
}
