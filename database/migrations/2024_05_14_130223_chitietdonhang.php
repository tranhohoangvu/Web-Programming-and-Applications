<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('chitietdonhang')) {
            Schema::create('chitietdonhang', function (Blueprint $table) {
                $table->id();
                $table->string('MaHD');
                $table->unsignedBigInteger('MaSP');
                $table->integer('soLuong');
                $table->integer('soTienKhachDua')->nullable();
                $table->integer('soTienTraLaiKhach')->nullable();
                $table->timestamps();

                // Thêm foreign key
                $table->foreign('MaHD')->references('MaHD')->on('donhang')->onDelete('cascade');
                $table->foreign('MaSP')->references('id')->on('sanpham')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitietdonhang');
    }
};