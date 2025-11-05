<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class EmployeeLoginController extends Controller
{
    public function login($id, Request $request)
    {
        // Kiểm tra nếu token hết hạn hoặc không hợp lệ
        if (!$request->hasValidSignature()) {
            abort(403, 'Link has expired or is invalid.');
        }

        $user = User::findOrFail($id);

        // Đăng nhập hoặc chuyển hướng đến trang thiết lập mật khẩu
        auth()->login($user);
        // echo 123;
        // die();
        return redirect()->route('auth.change_password')->with('message', 'Bạn cần thay đổi mật khẩu đầu tiên vì đây là tài khoản mới!');
    }
}
