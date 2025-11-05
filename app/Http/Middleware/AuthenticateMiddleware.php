<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

//Thêm đường dẫn vào từ AuthController
use Illuminate\Support\Facades\Auth;
class AuthenticateMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //kHI ĐĂNG nhập thành công sẽ có id
        //ktra id nếu ko có thì trả về trang đăng nhâp và xuất thông báo
        if (Auth::id()==null){
            return redirect()->route('auth.admin')->with('error','Bạn phải đăng nhập để dùng chức năng này');
        }
        

        return $next($request);
    }
}
