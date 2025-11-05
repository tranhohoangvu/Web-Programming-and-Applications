<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\sanpham;
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Database\QueryException;


class SanPhamController extends Controller
{
    // Hiển thị danh sách sản phẩm
    public function sanpham()
    {
        // Lấy danh sách sản phẩm từ cơ sở dữ liệu (giả sử bạn có một model Product)
        $sanphams = sanpham::all();
        return view('backend.account.sanpham', compact('sanphams'));
    }

    // Thêm sản phẩm 
    public function addSP(Request $request)
    {   
        return view('backend.account.sanpham_create');
    }

    //Lưu sản phẩm 
    public function store(Request $request){
        try{
            $sanpham = new sanpham();
            $sanpham->MaVach = str_pad(mt_rand(0, 9999999999), 10, '0', STR_PAD_LEFT);
            $sanpham->tensanpham = $request->tensanpham;
            $sanpham->loaisanpham = $request->loaisanpham;
            $sanpham->thuonghieu = $request->thuonghieu;
            $sanpham->gianhap = $request->gianhap;
            $sanpham->giaban = $request->giaban;
            $sanpham->soLuongNhap = $request->soLuongNhap;
            $sanpham->SoLuongConLai = $request->soLuongNhap;
            $sanpham->ngaynhaphang = $request->ngaynhaphang;
            $sanpham->moTaSanPham = $request->motasanpham;
            $sanpham->trangthai = $request->has('trangthai') ? true : false;
            if ($request->hasFile('hinhdaidien')) {
                $file = $request->file('hinhdaidien');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/employees/', $filename);
                $sanpham->anhdaidien = $filename;
            }
            $sanpham->save();
            return redirect()->route('account.sanpham')->with('success', 'Thêm sản phẩm thành công');
        } catch(QueryException $e){
            if ($e->errorInfo[1] == 1062) {
                return redirect()->route('account.sanpham')->with('error', 'Tên sản phẩm đã tồn tại!');
            }
            return redirect()->route('account.sanpham')->with('error', 'Đã xảy ra lỗi khi thêm sản phẩm');
        }
    }
    


    // Sửa thông tin sản phẩm
    public function edit($id)
    {
        $sanpham = sanpham::find($id);
        return view('backend.account.sanpham_edit', compact('sanpham'));
    }

    // Update thông tin sản phẩm 
    public function update(Request $request, $id)
    {
        $sanpham = sanpham::find($id);
        $sanpham->tensanpham = $request->tensanpham;
        $sanpham->loaisanpham = $request->loaisanpham;
        $sanpham->thuonghieu = $request->thuonghieu;
        $sanpham->gianhap = $request->gianhap;
        $sanpham->giaban = $request->giaban;
        $sanpham->soLuongNhap = $request->soLuongNhap;
        $sanpham->SoLuongConLai = $request->soLuongConLai;
        $sanpham->ngaynhaphang = $request->ngaynhaphang;
        $sanpham->moTaSanPham = $request->motasanpham;
        $sanpham->trangthai = $request->has('trangthai') ? true : false;

        if ($request->hasFile('hinhdaidien')) {
            $file = $request->file('hinhdaidien');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/employees/', $filename);

            if ($sanpham->anhdaidien) {
                $oldImagePath = public_path('uploads/employees/' . $sanpham->anhdaidien);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Xóa ảnh cũ
                }
            }

            $sanpham->anhdaidien = $filename;
        }

        $sanpham->save();

        return redirect()->route('account.sanpham')->with('success', 'Sửa thông tin sản phẩm thành công');
    }


    // Xóa sản phẩm
    public function delete($id)
    {
        $sanpham = sanpham::find($id);
        
        if ($sanpham->trangthai) { // Kiểm tra nếu sản phẩm đã bán
            return redirect()->route('account.sanpham')->with('error', 'Sản phẩm đã được bán, không thể xóa!');
        }

        $sanpham->delete();
        return redirect()->route('account.sanpham')->with('success', 'Xóa sản phẩm thành công');
    }
}
