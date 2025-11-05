<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;
    protected $table = 'sanpham';

    protected $primaryKey = 'id';

    protected $fillable = ['tensanpham', 'loaisanpham', 'thuonghieu', 'gianhap', 'giaban', 'soLuongNhap', 'soLuongConLai', 'ngaynhaphang', 'moTaSanPham', 'anhdaidien', 'trangthai'];

    // Các mối quan hệ có thể được định nghĩa ở đây
    public function chiTietDonHangs()
    {
        return $this->hasMany(ChiTietDonHang::class, 'MaSP', 'id');
    }
}
