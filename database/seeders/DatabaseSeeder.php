<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

     //Tạo dữ liệu ở đây
    public function run(): void
    {   
        DB::transaction(function () {
            // Tạo dữ liệu cho bảng users
            $userId = DB::table('users')->insertGetId([
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
                'vaitro' => true,
                'trangthaikichhoat' => true,
                'trangthaikhoa' => false,
            ]);
        
            // Tạo dữ liệu cho bảng employees
            DB::table('employees')->insert([
                'user_id' => $userId,
                'hotendaydu' => 'Admin AN KHANG STORE',
                // 'avatar' => 'Null', // Đường dẫn ảnh mặc định
                'sodienthoai' => '0389950228',
                'diachi' => 'Tô Hiến Thành, quận 1, Thành phố Hồ Chí Minh',
            ]);
            
            
        });
        // DB::table('sanpham')->insert([
        //     // 'username' => Str::random(10),
        //     'MaVach' => '123456789',
        //     'tensanpham' => 'xiaomi redmi note 13 pro',
        //     'loaisanpham' => 'thiết bị di động',
        //     'thuonghieu' => 'Xiaomi',
        //     'gianhap' => 10000000,
        //     'giaban' => 15000000,
        //     'soLuongNhap' => 100,
        //     'soLuongConLai' => 100,
        //     'ngaynhaphang' => now(),
        //     'moTaSanPham' => 'Mô tả sản phẩm Xiaomi Redmi Note 13 Pro',
        // ]);
        // DB::table('sanpham')->insert([
        //     // 'username' => Str::random(10),
        //     'MaVach' => '123456789HF',
        //     'tensanpham' => 'iphone 12 promax',
        //     'loaisanpham' => 'thiết bị di động',
        //     'thuonghieu' => 'Apple',
        //     'gianhap' => 20000000,
        //     'giaban' => 25000000,
        //     'soLuongNhap' => 50,
        //     'soLuongConLai' => 50,
        //     'ngaynhaphang' => now(),
        //     'moTaSanPham' => 'Mô tả sản phẩm iPhone 12 Pro Max',
        // ]);
        
    }
    }

