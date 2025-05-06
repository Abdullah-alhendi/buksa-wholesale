<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class UserOnly
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && !Auth::user()
        ->is_admin) {
            return $next($request);
        }

        abort(403, 'غير مصرح لك بالدخول.');
    }
}
