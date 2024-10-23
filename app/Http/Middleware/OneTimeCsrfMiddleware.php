<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OneTimeCsrfMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->isMethod('post')) {
            $token = $request->input('_token');
            if ($token !== Session::get('one_time_csrf_token')) {
                return response()->json(['message' => 'Invalid CSRF token.'], 403);
            }
            Session::forget('one_time_csrf_token');
        }

        if ($request->isMethod('get')) {
            $oneTimeToken = bin2hex(random_bytes(32));
            Session::put('one_time_csrf_token', $oneTimeToken);
        }

        return $next($request);
    }
}
