<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {   
        //Thông tin bảng tài khoản gồm các trường cơ bản username,email,vaitro,password,trangthaikichhoat,trangthaikhoa
        Schema::create('users', function (Blueprint $table) {
            $table->id()->nullable();
            
            $table->string('email', 50)->unique()->nullable((false));//bắt buộc phải có'

            
           // $table->string('Avatar')->nullable(); nên để ở nhân viên
            //$table->date('NgayVaoLam')->nullable(); //nên để ở nhân viên
            //$table->date('NgaySinh')->nullable(); //nên để ở nhân viên
            $table->boolean('vaitro')->default(false); //Phân biệt admin với nhân viên:quy định admin là true, nhân viên là false
            $table->string('username')->nullable();
            $table->string('password')->nullable((false));
            $table->boolean('trangthaikichhoat')->default(false);//Để ktra tình trạng tk mới đã được đăng nhập và đổi mật khẩu lần đầu chưa: mặc định mới tạo là false
            $table->boolean('trangthaikhoa')->default(false);//Nghĩa là ko khóa: thì là false còn bị admin khóa thì là true
            $table->timestamps();
            $table->rememberToken();
       
        });
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('first_login')->default(false)->after('trangthaikhoa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('first_login');
        });
    }
};
