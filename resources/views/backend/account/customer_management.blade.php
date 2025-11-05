<link href="{{ asset('css/customer_management.css') }}" rel="stylesheet">
<link href="{{ asset('css/header.css') }}" rel="stylesheet"> 
@extends('layouts.main')

@section('title', 'Thông tin khách hàng')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class=""><h1>Tìm kiếm khách hàng</h1>
                    <form action="/search" method="post">
                        {{ csrf_field() }}
                        <label for="soDienThoai">Số điện thoại:</label>
                        <input type="text" name="soDienThoai" id="soDienThoai">
                        <button type="submit">Tìm kiếm</button>
                    </form>
                </div>
            </div>
            <div class="col-sm-3">
                @if (auth()->user()->vaitro)
                    <a style="float: right;" href="{{ route('dashboard.index') }}"><button class="btn btn-danger">Quay lại</button></a>
                @else 
                    <a style="float: right;" href="{{ route('dashboard.nhanvien') }}"><button class="btn btn-danger">Quay lại</button></a>
                @endif
            </div>
        </div>
    </div>
    <div class="container">
        <h1>Thông tin khách hàng</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã KH</th>
                    <th>Tên khách hàng</th>
                    <th>SĐT</th>
                    <th>Ngày sinh</th>
                    <th>Địa chỉ</th>
                    @if (auth()->user()->vaitro)
                        <td>Thao tác</td>
                    @endif 
                    <th>Lịch sử mua hàng</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $customer->MaKhachHang }}</td>
                        <td>{{ $customer->TenKhachHang }}</td>
                        <td>{{ $customer->soDienThoai }}</td>
                        <td>{{ $customer->ngaysinh}}</td>
                        <td>{{ $customer->diaChi}}</td>
                        @if (auth()->user()->vaitro)
                            <td class="edit_customer">
                                <a href="{{ route('edit_customer', ['id' => $customer->id]) }}" class="btn btn-primary">Sửa thông tin</a>
                            </td>
                        @endif
                        <td class="">
                            <a href="{{ route('history_customer', ['id' => $customer->id]) }}" class="btn xem">Xem</a>
                        </td>                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection


