<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\RedirectResponse;


class AuthController extends Controller
{
    public function __construct(){

    }
    public function index(){
        //Đã đăng nhập thì ko login lần nữa cho đến khi nhấn logout
 
        return view('backend.auth.login');
    }

    //Kiểm tra mật khẩu
    public function login(AuthRequest $request){
        $credentials =[
            'username' => $request ->input('username'),
            'password' 

            
            => $request ->input('password')
        ];
        
        if (Auth::attempt($credentials) ) {
            $user = Auth::user(); //truy  cập dữ liệu đến bảng user
            if($user->vaitro){
                return redirect()->route('dashboard.index')->with('success','Đăng nhập admin AK Store thành công!');
            }else{
                Auth::logout();
                return redirect()->route('auth.admin')->with('error','Bạn không có quyền truy cập admin');
            }
           
        }
        return redirect()->route('auth.admin')->with('error','Email hoặc mật khẩu không chính xác');
      
    }
//DANG XUAT
//th chưa đăng nhập mà 
public function logout(Request $request)
    {
        Auth::logout();
     
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        // return redirect()->route('auth.admin');
        return view('welcome'); // trả về trang chủ
    }
    
//Tiếp tục đăng nhập cho nhân viên
public function loginEmployeeForm()
{
    //em sẽ tiến hành ktra điều kiện để đăng nhập được nhân viên bằng vai trò phải là False
    //th này em sẽ tiếp tục dùng middleware như trong admin 

    return view('backend.auth.login-employee');
}
public function doipass2(){
    return view('backend.auth.change_password2');

   }
public function doipass(){
    return view('backend.auth.change_password');

   }

public function loginEmployee(AuthRequest $request)
{
    $credentials = [
        // 'email' => $request->input('email'),
        'username' => $request->input('username'),
        'password' => $request->input('password')
    ];

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        if ($user->trangthaikhoa){
            return view('backend/modal/khoataikhoan');
        }
        else if (!$user->vaitro && !$user->first_login && !$user->trangthaikhoa) {
            // Chuyển hướng đến trang đổi mật khẩu và truyền thông báo
            //XUẤT THÔNG BÁO LỖI KHI ĐĂNG NHẬP TRỰC TIẾP QUA LINK ĐĂNG NHẬP
            // return view('error_new_employee');
            return view('backend/modal/error_new_employee');
            
        }
         else if (!$user->vaitro && $user->first_login && !$user->trangthaikhoa) {
            // Chuyển hướng đến trang dashboard của nhân viên
            return redirect()->route('dashboard.nhanvien')->with('success', 'Đăng nhập nhân viên AK Store thành công!');
        }
    }

    // Xác thực không thành công, chuyển hướng lại form đăng nhập cho nhân viên với thông báo lỗi
    return redirect()->route('auth.login.employee')->with('error', 'Email hoặc mật khẩu không chính xác');
}

//logout cho nhân viên
public function logout2(Request $request)
    {
        Auth::logout();
     
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        // return redirect()->route('auth.login.employee');
        return view('welcome');//trả về trang chủ
    }
public function changePassword(Request $request)
{
    $request->validate([
        'newpassword' => 'required|string|min:5|confirmed',
    ]);

    $user = $request->user(); // Lấy người dùng hiện tại
    if (!$user) {
        // Handle the case when user is not authenticated
        return redirect()->back()->with('error', 'Người dùng không hợp lệ.');
    }
    $user->password = Hash::make($request->newpassword); // Mã hóa mật khẩu mới

    $user->first_login = true; // Đánh dấu đã đổi mật khẩu lần đầu

    $user->save(); // Lưu thay đổi vào cơ sở dữ liệu

    return redirect()->route('dashboard.nhanvien')->with('success', 'Đổi mật khẩu thành công.');
}

public function changePassword2(Request $request)
{
    $request->validate([
        'currentpassword' => 'required|string|min:5',
        'newpassword' => 'required|string|min:5|confirmed',
    ]);

    $user = $request->user(); // Lấy người dùng hiện tại
    if (!$user) {
        // Handle the case when user is not authenticated
        return redirect()->back()->with('error', 'Người dùng không hợp lệ.');
    }

    // Kiểm tra mật khẩu hiện tại
    if (Hash::check($request->currentpassword, $user->password)) {
        $user->password = Hash::make($request->newpassword); // Mã hóa mật khẩu mới
        $user->password = Hash::make($request->newpassword); // Mã hóa mật khẩu mới

    $user->save(); // Lưu thay đổi vào cơ sở dữ liệu

    // Chuyển hướng về trang admin hoặc nhân viên tùy vào vai trò của người dùng
    if ($user->vaitro) {
        return redirect()->route('dashboard.index')->with('success', 'Đổi mật khẩu thành công.');
    }else if(!$user->vaitro) {
        return redirect()->route('dashboard.nhanvien')->with('success', 'Đổi mật khẩu thành công.');
    }
        
    }
    return redirect()->back()->with('error', 'Mật khẩu hiện tại không chính xác.');
    // Mật khẩu hiện tại chính xác, cập nhật mật khẩu mới
    
}

public function placeOrder() {
    $user = Auth::user()->id; // Lấy thông tin người dùng đăng nhập
    return view('order.new_order_form', compact('user'));
}

//Xuất lỗi khi đăng nhập form nhân viên


}
