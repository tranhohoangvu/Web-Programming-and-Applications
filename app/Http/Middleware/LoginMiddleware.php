<?php
//Tạo lun middleware login để ktra tình trạng đăng nhập nếu có đăng nhập khi nhấn về giao diện admin nghĩa là trang đăng nhập thì vẫn trở lại dashboard
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Symfony\Component\HttpFoundation\Response;
//Chèn thêm vị trí AuthController
use Illuminate\Support\Facades\Auth;
class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::id()>0){
            return redirect()->route('dashboard.index');
        }
        return $next($request);
    }
}
