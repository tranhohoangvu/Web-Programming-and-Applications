<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Employee;
use App\Models\DonHang;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmployeeCreated;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
class UserController extends Controller
{
    public function usershow()
    {
        $users = User::all();
        return view('backend.account.user_show', compact('users'));
    }

    public function user_create()
    {
        return view('backend.account.user_create');
    }

    public function user_store(UserRequest $request)
    {
        $user = new User;
        $user->email = $request->email;
        $user->vaitro = $request->input('vaitro') == '1';
        $user->username = explode('@', $request->email)[0];
        $user->password = bcrypt(explode('@', $request->email)[0]);
        $user->trangthaikhoa = $request->input('trangthaikhoa') == '1';
        $user->save();

        $employee = new Employee();
        $employee->hotendaydu = $request->hotendaydu;
        $employee->sodienthoai = $request->sodienthoai;
        $employee->diachi = $request->diachi;
        $employee->ngayvaolam = $request->ngayvaolam;
        $employee->ngaysinh = $request->ngaysinh;
        $employee->trinhdo = $request->trinhdo;
        $employee->user_id = $user->id;

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $filePath = 'uploads/employees/' . $filename;
            Storage::disk('public')->put($filePath, file_get_contents($file));
            $employee->avatar = $filePath;
        } 
        $employee->save();

        // Tạo link tạm thời
        $changePasswordUrl = URL::temporarySignedRoute(
            'auth.login.employee',
            now()->addMinutes(1),
            ['id' => $user->id]
        );

        // Gửi email với đường dẫn thiết lập mật khẩu
        Mail::to($user->email)->send(new EmployeeCreated($user, $changePasswordUrl));

        return redirect()->route('account.user-show')->with('success', 'Thêm người dùng thành công');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('account.user-show')->with('success', 'Đã xóa tài khoản thành công!');
    }

    public function Lock($id)
    {
        $user = User::findOrFail($id);
        $user->trangthaikhoa = true;
        $user->save();
        return redirect()->route('account.user-show')->with('success', 'Đã khóa tài khoản thành công!');
    }

    public function UnLock($id)
    {
        $user = User::findOrFail($id);
        $user->trangthaikhoa = false;
        $user->save();
        return redirect()->route('account.user-show')->with('success', 'Tài khoản đã được mở khóa.');
    }

    public function Show_profile($id)
    {
        $user = User::with('Employee')->findOrFail($id);
        return view('backend.account.user_profile', ['user' => $user]);
    }

    public function showOrders($id)
    {
        // Lấy thông tin người dùng
        $user = User::findOrFail($id);

        // Lấy danh sách đơn hàng của nhân viên này
        $orders = DonHang::where('MaNV', $user->id) // Assuming MaNV is the field for employee ID
                         ->orderBy('NgayDatHang', 'desc')
                         ->get();

        // Tính tổng số đơn hàng và tổng số tiền
        $totalOrders = $orders->count();
        $totalAmount = $orders->sum('tongtien'); // Assuming tongtien is the field for total amount

        return view('backend.account.user_order', compact('user', 'orders', 'totalOrders', 'totalAmount'));
    }
    
    public function resendEmail(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Kiểm tra nếu trạng thái kích hoạt đã là true, không gửi email lại
        if ($user->trangthaikichhoat) {
            return redirect()->route('account.user-show')->with('error', 'Không thể gửi email lại cho tài khoản đã kích hoạt.');
        }

        // Tạo link tạm thời
        $changePasswordUrl = URL::temporarySignedRoute(
            'auth.login.employee',
            now()->addMinutes(1),
            ['id' => $user->id]
        );

        // Gửi email với đường dẫn thiết lập mật khẩu
        Mail::to($user->email)->send(new EmployeeCreated($user, $changePasswordUrl));

        // Cập nhật trạng thái kích hoạt của người dùng
        $user->trangthaikichhoat = true;
        $user->save();

        if ($request->ajax()) {
            return response()->json(['status' => 'success', 'message' => 'Email kích hoạt đã được gửi lại.', 'trangthaikichhoat' => $user->trangthaikichhoat]);
        }

        return redirect()->route('account.user-show')->with('success', 'Email kích hoạt đã được gửi lại.');
    }


}
