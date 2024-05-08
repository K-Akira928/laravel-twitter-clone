<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if ('verify-email' === explode('/', url()->current())[3]) {
            $request->session()->flash('status', 'alert');
            $request->session()->flash('message', 'メールの有効期限が切れています。ログインから再試行してください。');
            route('login');
        }

        return $request->expectsJson() ? null : route('login');
    }
}
