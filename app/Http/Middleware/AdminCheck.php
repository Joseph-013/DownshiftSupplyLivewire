<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class AdminCheck extends Middleware
{
    public function handle($request, Closure $next, ...$guards)
    {
        $this->authenticate($request, $guards);

        // Additional check for user type 'admin'
        if ($request->user() && $request->user()->usertype !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
