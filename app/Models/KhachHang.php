<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    use HasFactory;

    protected $table = 'khachhang'; // Tên bảng, nếu không tuân theo quy tắc đặt tên của Laravel
    protected $primaryKey = 'id'; // Khóa chính của bảng, nếu không tuân theo quy tắc mặc định

    // Một khách hàng có nhiều đơn hàng
    public function orders()
    {
        return $this->hasMany(DonHang::class, 'MaKhachHang', 'MaKhachHang');
    }
}
?>