<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PartnerEnsureEmailIsVerified
{
    public function handle($request, Closure $next)
    {
        $guards = array_keys(config('auth.guards'));

        foreach($guards as $guard) {
            if($guard == 'partner') {
                if (Auth::guard($guard)->check()) {
                    if (! Auth::guard($guard)->user() ||
                        (Auth::guard($guard)->user() instanceof MustVerifyEmail &&
                        ! Auth::guard($guard)->user()->hasVerifiedEmail())) {
                        return $request->expectsJson()
                                ? abort(403, 'Your email address is not verified.')
                                : Redirect::route('partner.verification.notice');
                    }  
                }
            }
        }
        return $next($request);
    }
}