<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class CheckFirstLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user() && Auth::user()->first_login== false&&Auth::user()->vaitro==false) {
            return redirect()->route('auth.change_password')->with('message', 'Bạn cần đổi mật khẩu lần đầu để tiếp tục sử dụng hệ thống.');
        }
        return $next($request);
    }
}
