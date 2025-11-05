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
        Schema::create('sanpham', function (Blueprint $table) {
            $table->id();
            $table->string('MaVach')->unique();
            $table->string('tensanpham')->nullable(false);
            $table->string('loaisanpham')->nullable();
            $table->string('thuonghieu')->nullable();
            $table->integer('gianhap')->nullable(); 
            $table->integer('giaban')->nullable();
            $table->integer('soLuongNhap')->nullable();
            $table->integer('soLuongConLai')->nullable();
            $table->dateTime('ngaynhaphang')->nullable();
            $table->text('moTaSanPham')->nullable();
            $table->string('anhdaidien')->nullable();
            $table->boolean('trangthai')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sanpham');
    }
};