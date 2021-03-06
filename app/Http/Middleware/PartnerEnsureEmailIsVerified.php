<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PartnerEnsureEmailIsVerified
{
    public function handle($request, Closure $next, $guard = null)
    {
        if($guard == 'partner') {
            // signin していない場合
            if (!Auth::guard($guard)->check()) {
                return redirect()->route('/partner/login');
            }

            // メール認証が済んでいない場合
            if (
                !Auth::guard($guard)->user() ||
                (
                    Auth::guard($guard)->user() instanceof MustVerifyEmail &&
                    !Auth::guard($guard)->user()->hasVerifiedEmail()
                )
            ) {
                return $request->expectsJson()
                    ? abort(403, 'Your email address is not verified.')
                    : Redirect::route('partner.register.personal.create', auth()->user()->id);
            }

            // 規約の同意が済んでいない場合
            if (!auth()->user()->is_agree) {
                return redirect()->route('partner.register.terms', auth()->user()->id);
            }

            return $next($request);
        }
    }
}
