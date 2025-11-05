<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
//Khai bao AuthController neu muon dung
use App\Http\Controllers\Backend\AuthController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Backend\SanPhamController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\ReportController;

//Thêm authenticateMiddleware
use App\Http\Middleware\AuthenticateMiddleware;
use App\Http\Middleware\Authenticate2Middleware;
use App\Http\Middleware\LoginMiddleware;
use App\Http\Middleware\Login2Middleware;
use App\Http\Middleware\CustomValidateSignature;
use Illuminate\Http\Request;

use App\Http\Controllers\Auth\EmployeeLoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::get('login',function(){
//     return view('welcome');
// });
Route::get('dashboard/index',[DashboardController::class,'index'])->name('dashboard.index')->middleware(AuthenticateMiddleware::class); //Khi vào đc giao diện admin nhưng ko có id() buộc phải đăng nhập lại
Route::get('dashboard/nhanvien',[DashboardController::class,'nhanvien'])->name('dashboard.nhanvien')->middleware(Authenticate2Middleware::class); //Khi vào đc giao diện admin nhưng ko có id() buộc phải đăng nhập lại
#Dua duong dan vao controller
Route::get('admin',[AuthController::class,'index'])->name('auth.admin')->middleware(LoginMiddleware::class);
Route::get('logout',[AuthController::class,'logout'])->name('auth.logout');
Route::post('login',[AuthController::class,'login'])->name('auth.login');
#ĐƯA DG dẫn vào nhân viên
Route::get('login-employee', [AuthController::class, 'loginEmployeeForm'])->name('auth.login.employee')->middleware(Login2Middleware::class);
Route::post('login-employee', [AuthController::class, 'loginEmployee'])->name('auth.login.employee.submit');
Route::get('logout2',[AuthController::class,'logout2'])->name('auth.logout2');


//Quản lí user
// Route::get('account/user-show', 'UserController@user_show')->name('account.user-show');
Route::get('account/user-show', [UserController::class,'usershow'])->name('account.user-show');
//Thêm user
Route::get('account/user-create',  [UserController::class,'user_create'])->name('account.user-create');
Route::post('account/user-store', [UserController::class,'user_store'])->name('account.user-store');
//Khóa user 
Route::put('account/user/{id}', [UserController::class,'Lock'])->name('account.user-lock');
//Mở khóa user:
Route::put('account/user/unlock/{id}', [UserController::class, 'UnLock'])->name('account.user-unlock');

// Route::put('account/user/{id}', [UserController::class,'UnLock'])->name('account.user-Unlock');
//Đăng nhập lần đầu

Route::get('auth/change_password',[AuthController::class,'doipass'])->name('auth.change_password');
Route::post('auth/change_password', [AuthController::class,'changePassword'])->name('auth.change_password.submit');

//Hiển thị thông tin chi tiết người dùng
Route::get('/user/{id}',[UserController::class,'Show_profile'])->name('account.user_profile');
Route::put('/profile/{id}', [ProfileController::class,'update'])->name('profile.update');
//Đổi avatar
// Route::post('/update_avatar/{id}', [ProfileController::class,'updateAvatar'])->name('account.update_avatar');
// Route::put('/profile/{id}', [ProfileController::class,'update'])->name('profile.update');
// Route::get('/profile_avatar/{id}',  [ProfileController::class,'showAvatar'])->name('profile.updateAvatar');
// Route::post('/profile_avatar/{id}', [ProfileController::class,'updateAvatar'])->name('profile.updateAvatar.submit');
Route::get('/profile_avatar', [ProfileController::class, 'showAvatar'])->name('profile.showAvatar');
Route::put('/profile_avatar', [ProfileController::class, 'updateAvatar'])->name('profile.updateAvatar.submit');
//đổi mật khẩu có xác nhận
Route::get('auth/change_password2',[AuthController::class,'doipass2'])->name('auth.change_password2');
Route::post('auth/change_password2', [AuthController::class,'changePassword2'])->name('auth.change_password2.submit');

//Quanr lí sản phẩm
Route::get('account/sanpham',[SanPhamController::class,'sanpham'])->name('account.sanpham');
Route::get('account/add-SanPham',[SanPhamController::class,'addSP'])->name('account.addSP');
Route::post('account/add-SanPham',[SanPhamController::class,'store'])->name('account.store');
Route::get('account/edit-SanPham/{id}',[SanPhamController::class,'edit'])->name('account.edit');
Route::post('account/update-SanPham/{id}',[SanPhamController::class,'update'])->name('account.update');
Route::get('account/delete-SanPham/{id}',[SanPhamController::class,'delete'])->name('account.delete');

// Quản lý người dùng
Route::get('/manage-customer', function () {
    return view('order.order');
})->name('manage_customer');

// Xem chi tiết doanh thu nhân viên
Route::get('account/user-orders/{id}', [UserController::class, 'showOrders'])->name('account.user.orders');

// Đơn hàng
Route::any('new-order-form', [OrderController::class, 'showNewOrderForm'])->name('new.order.form');
Route::any('order-history', [OrderController::class, 'showOrderHistory'])->name('order.history');
Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('place.order');
Route::delete('/delete-order/{id}', [OrderController::class, 'deleteOrder'])->name('delete.order');
Route::any('/cancel-order/{id}', [OrderController::class, 'cancelOrder'])->name('cancel.order');
Route::any('/confirm-order', [OrderController::class, 'showConfirmOrder'])->name('confirm.order');

Route::get('/generate-mahd', [OrderController::class, 'generateMaHD'])->name('generate.mahd');
Route::get('/generate-makh', [OrderController::class, 'generateMaKH'])->name('generate.makh');

Route::get('/check-phone-number', [OrderController::class, 'checkPhoneNumber'])->name('check.phone');

Route::get('/search-product', [OrderController::class, 'searchProduct'])->name('search.product');
Route::post('/search-order', [OrderController::class, 'searchOrder'])->name('search.order');
Route::get('/order/detail/{id}', [OrderController::class, 'showOrderDetail'])->name('order.detail');
Route::get('/export-pdf/{orderId}', [OrderController::class, 'exportPDF'])->name('export.invoice');

//Quản lý KH
Route::get('customer_management', [CustomerController::class, 'customerManagement'])->name('account.customer');
Route::any('/search',function(Request $request){
    $sdt = $request->input('soDienThoai');
    $customers = DB::table('khachhang')->where('soDienThoai', $sdt)->get();
    

    if(count($customers) > 0) 
        return view('backend.account.customer_management', ['customers' => $customers]);
    else 
        return redirect()->route('account.customer')->with('error', 'Khách hàng không tồn tại!');;
});
Route::get('edit-customer/{id}', [CustomerController::class, 'edit'])->name('edit_customer');
Route::post('update-customer/{id}', [CustomerController::class, 'update'])->name('update_customer');
//Lịch sử mua 
Route::get('history-customer/{id}', [CustomerController::class, 'history'])->name('history_customer');
Route::get('/order/{orderId}', [OrderController::class, 'details'])->name('order.details');

Route::get('information-member', function () {
    return view('information_member');
})->name('information.member');

Route::get('welcome', function () {
    return view('welcome');
})->name('welcome');

// Báo cáo và phân tích
Route::get('/reports-generate', function () {
    return view('report.report_generate');
})->name('report.report.generate');
Route::get('/report/index', [ReportController::class, 'index'])->name('report.index');
Route::get('/report/generate', [ReportController::class, 'generate'])->name('report.generate');
Route::get('/reports-profit-generate', function () {
    return view('report.report_profit_generate');
})->name('report.report.profit.generate');
Route::get('/report/profit', [ReportController::class, 'showProfit'])->name('report.profit');
Route::post('/search-order-profit', [ReportController::class, 'searchOrderProfit'])->name('search.order.profit');


//Mail 1 phút

Route::get('/auth/login/employee/{id}', [EmployeeLoginController::class, 'login'])
     ->name('auth.login.employee')
     ->middleware('signed');

// Gửi lại email kích hoạt tài khoản
Route::post('account/resend-email/{id}', [UserController::class, 'resendEmail'])->name('account.resend-email');
