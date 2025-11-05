<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    use HasFactory;
    protected $table = 'chitietdonhang';

    protected $primaryKey = 'id';

    protected $fillable = ['MaHD', 'MaSP', 'soLuong'];

    // Một chi tiết đơn hàng thuộc về một đơn hàng
    public function donHang()
    {
        return $this->belongsTo(DonHang::class, 'MaHD', 'MaHD');
    }

    // Một chi tiết đơn hàng thuộc về một sản phẩm
    public function sanPham()
    {
        return $this->belongsTo(SanPham::class, 'MaSP', 'id');
    }
}
