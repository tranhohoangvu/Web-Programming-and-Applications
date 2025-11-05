<link href="{{ asset('css/customer_management.css') }}" rel="stylesheet">
<link href="{{ asset('css/header.css') }}" rel="stylesheet">    
@extends('layouts.main')

@section('title', 'Lịch sử mua hàng')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <h1>Lịch sử mua hàng của {{ $customer->TenKhachHang }}</h1>
            </div>
            <div class="col-sm-3">
                <a style="float: right;" href="{{ route('dashboard.nhanvien') }}"><button class="btn btn-danger">Quay lại</button></a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Mã hóa đơn</th>
                    <th>Ngày mua</th>
                    <th>Tổng số tiền</th>
                    <th>Phương thức thanh toán</th>
                    <th>Chi tiết đơn hàng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->MaHD }}</td>
                        <td>{{ $order->NgayDatHang }}</td>
                        <td>{{ $order->formatted_tongtien }} VNĐ</td>
                        <td>{{ $order->formatted_phuong_thuc_thanh_toan }}</td>
                        <td><a href="{{ route('order.details', ['orderId' => $order->id]) }}" class="btn btn-primary">Xem chi tiết</a></td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="4" style="text-align: right"><strong>Tổng số tiền đã mua:</strong></td>
                    <td><strong>{{ number_format($totalAmount, 0, '', ',') }} VNĐ</strong></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
