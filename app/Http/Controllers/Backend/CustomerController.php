<?php

namespace App\Http\Controllers\backend;

use App\Models\KhachHang;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SearchCustomerRequest;


class CustomerController extends Controller
{
    //
    public function __construct(){

    }
    public function customerManagement()
    {
        $customers = KhachHang::all();
        return view('backend.account.customer_management', compact('customers'));
    }

  
    // public function customer_create(CustomerRequest $request){
    //     $customer = new KhachHang();
    //     $customer->TenKhachHang = $request->TenKhachHang; 
    //     $customer->soDienThoai = $request->soDienThoai;
    //     $customer->ngaysinh = $request->ngaysinh;  
    //     $customer->diaChi = $request->diaChi; 
    //     // Bạn có thể đặt các thuộc tính khác của khách hàng ở đây nếu cần
    //     $customer->save();

    //     return redirect()->route('account.customer')->with('success','Đã thêm thông tin khách hàng thành công!');
    // }

    public function edit($id)
    {
        $customer = KhachHang::findOrFail($id);
        return view('backend.account.customer_edit', ['customer' => $customer]);
    }

    public function update(CustomerRequest $request, $id)
    {
        // Tìm khách hàng cần cập nhật trong cơ sở dữ liệu
        $customer = KhachHang::findOrFail($id);

        // Cập nhật thông tin của khách hàng
        if(!empty($request->TenKhachHang)){
            $customer->TenKhachHang = $request->TenKhachHang;
        }
        if(!empty($request->soDienThoai)){
            $customer->soDienThoai = $request->soDienThoai;
        }
        if(!empty($request->diaChi)){
            $customer->diaChi = $request->diaChi;
        }
        if(!empty($request->ngaysinh)){
            $customer->ngaysinh = $request->ngaysinh;
        }else{
            $customer->ngaysinh = $request->ngaysinh;
        }
        // Cập nhật các thông tin khác nếu cần

        // Lưu thông tin mới vào cơ sở dữ liệu
        $customer->save();

        // Redirect hoặc trả về view tương ứng sau khi cập nhật thành công
        return redirect()->route('account.customer')->with('success', 'Thông tin khách hàng đã được cập nhật thành công!');
    }

    

    public function history($id)
    {
        $customer = KhachHang::find($id);
        $orders = $customer->orders()->get();
        $totalAmount = $orders->sum('tongtien');
        return view('customer_history', compact('customer', 'orders', 'totalAmount'));
    }

}
