<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use App\Models\Employee;
class ProfileController extends Controller
{
    public function update(Request $request, $id){
        $user = User::findOrFail($id);
        
        $user->employee->hotendaydu = $request->hotendaydu;
        $user ->username = $request ->username ;
        $user->employee->sodienthoai = $request->sodienthoai;
        $user->employee->diachi = $request->diachi;
        $user->employee->ngaysinh = $request->ngaysinh;
        $user->employee->ngayvaolam = $request->ngayvaolam;
        $user->trangthaikhoa = $request->trangthaikhoa;
        $user ->email = $request ->email ;
  
        $user->employee->trinhdo = $request->trinhdo;
        
        $user->save();
        $user->employee->save();
      
        return redirect()->back()->with('success', 'Thông tin của bạn đã được cập nhật.');
    }

    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = auth()->user();
        $employee = $user->employee;

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('uploads/employees'), $avatarName);

            // Delete old avatar if exists
            if ($employee->avatar) {
                $oldAvatarPath = public_path('uploads/employees/' . $employee->avatar);
                if (file_exists($oldAvatarPath)) {
                    unlink($oldAvatarPath);
                }
            }

            $employee->avatar = $avatarName;
            $employee->save();

            return response()->json(['success' => true, 'avatarPath' => asset('uploads/employees/' . $avatarName)]);
        }

        return response()->json(['success' => false]);
    }
}
