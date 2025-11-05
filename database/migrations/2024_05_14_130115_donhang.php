<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('donhang', function (Blueprint $table) {
            $table->id();
            $table->string('MaHD')->unique();
            $table->string('MaKhachHang')->nullable();
            $table->foreign('MaKhachHang')->references('MaKhachHang')->on('khachhang')->onDelete('cascade');
            $table->string('TenKhachHang');
            $table->date('NgayDatHang');
            $table->time('GioDatHang');
            $table->string('soDienThoai')->nullable();
            $table->text('diaChi')->nullable();
            $table->decimal('tongtien', 15, 2)->default(0);
            $table->string('PhuongThucThanhToan');
            $table->unsignedBigInteger('MANV');
            $table->foreign('MANV')->references('id')->on('employees')->onDelete('cascade');
            // $table->string('hotendaydu');
            // $table->foreign('hotendaydu')->references('hotendaydu')->on('employees')->onDelete('cascade');
            $table->timestamps();
        });   
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donhang');
    }
};