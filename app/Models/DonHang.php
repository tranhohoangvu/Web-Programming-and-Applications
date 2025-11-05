<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;
    protected $table = 'donhang';

    protected $primaryKey = 'id';

    protected $fillable = ['MaHD', 'TenKhachHang', 'NgayDatHang', 'PhuongThucThanhToan', 'MANV', 'tongtien'];


    // Một đơn hàng thuộc về một khách hàng
    public function khachHang()
    {
        return $this->belongsTo(KhachHang::class, 'MaKhachHang', 'MaKhachHang');
    }

    // Một đơn hàng có nhiều chi tiết đơn hàng
    public function chiTietDonHangs()
    {
        return $this->hasMany(ChiTietDonHang::class, 'MaHD', 'MaHD');
    }

    // Một đơn hàng thuộc về một nhân viên
    public function nhanVien()
    {
        return $this->belongsTo(Employee::class, 'MaNV', 'id');
    }

    public function getFormattedTongtienAttribute()
    {
        return number_format($this->tongtien, 0, '', '.');
    }

    public function getFormattedPhuongThucThanhToanAttribute()
    {
        if ($this->PhuongThucThanhToan == 'TienMat') {
            return 'Tiền mặt';
        }
        else if ($this->PhuongThucThanhToan == 'ChuyenKhoan') {
            return 'Chuyển khoản';
        }
        else if ($this->PhuongThucThanhToan == 'The') {
            return 'Thẻ';
        }

        return $this->PhuongThucThanhToan;
    }
}
