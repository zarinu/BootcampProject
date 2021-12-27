<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Closure;
use Illuminate\Http\Request;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        return app(Authenticate::class)->handle($request, function ($request) use ($next) {
            if(!Admin::isAdmin()) {
                abort(404);
            }
            return $next($request);
        });
    }
}
