<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateClient
{
    public function handle($request, Closure $next)
    {
        if (Auth::guard('client')->check()) {
            return $next($request);
        }

        return redirect()->route('profile.login')->with([
            'message' => __('message.please_login'),
            'type' => 'error',
        ]);;
    }
}

?>