<link href="{{ asset('css/customer_create.css') }}" rel="stylesheet">
<link href="{{ asset('css/custormize.css') }}" rel="stylesheet">
@extends('layouts.main')

@section('title', 'Sửa thông tin khách hàng')

@section('content')
    <div class="container">
        <h1>Sửa thông tin khách hàng</h1>
        <form action="{{ route('update_customer' , ['id' => $customer->id])}}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="TenKhachHang" class="required">Tên khách hàng:</label>
                <input type="text" name="TenKhachHang" class="form-control" id="TenKhachHang" value="{{ $customer->TenKhachHang }}">
                @error('TenKhachHang')
                <span class="error-message">*{{ $errors->first('TenKhachHang') }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="soDienThoai" class="required">Số điện thoại:</label>
                <input type="text" name="soDienThoai" class="form-control" id="soDienThoai" value="{{ $customer->soDienThoai }}">
                @error('soDienThoai')
                <span class="error-message">*{{ $errors->first('soDienThoai') }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="ngaysinh" class="required">Ngày sinh:</label>
                <input type="date" name="ngaysinh" class="form-control" id="ngaysinh" value="{{ $customer->ngaysinh }}">
                @error('ngaysinh')
                <span class="error-message">*{{ $errors->first('ngaysinh') }}</span>
                @enderror
            </div>   
            <div class="form-group">
                <label for="diaChi" class="required">Địa chỉ:</label>
                <input type="text" name="diaChi" class="form-control" id="diaChi" value="{{ $customer->diaChi }}">
                @error('diaChi')
                <span class="error-message">*{{ $errors->first('diaChi') }}</span>
                @enderror
            </div>  
                   
            <button type="submit" class="btn btn-primary">Lưu thông tin</button>
        </form>
    </div>
@endsection
