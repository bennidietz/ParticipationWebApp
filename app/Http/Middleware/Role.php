<?php

namespace App\Http\Middleware;

use Closure;

class Role
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
        $validRoles = array_slice(func_get_args(), 2);

        if (!$request->user() || !$request->user()->role || !in_array($request->user()->role, $validRoles)) {
            return redirect()->route('index');
        }

        return $next($request);
    }
}
