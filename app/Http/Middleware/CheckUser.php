<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
       // if (\App\Models\User::where('email', $request->input('email'))->first()->email_verified_at != null) {


        if (!Auth::user()->email_verified_at) {
            return redirect('/email/verify')->with('email_not_verified', 'Email not verified, Please check your email to validate it');
        }
    }
}
