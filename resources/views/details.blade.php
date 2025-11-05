<link href="{{ asset('css/customer_management.css') }}" rel="stylesheet">
<link href="{{ asset('css/header.css') }}" rel="stylesheet">    
@extends('layouts.main')

@section('content')

<div class="container">
        <div class="row">
            <div class="col-sm-9">
                <h1>Chi tiết đơn hàng</h1>
            </div>
            <div class="col-sm-3">
                <a style="float: right;" href="{{ route('dashboard.nhanvien') }}"><button class="btn btn-danger">Quay lại</button></a>
            </div>
        </div>
        <p><strong>Mã đơn hàng:</strong> {{ $order->MaHD }}</p>
        <p><strong>Khách hàng:</strong> {{ $order->TenKhachHang }}</p>
        <p><strong>Ngày mua:</strong> {{ $order->NgayDatHang }}</p>
        <p><strong>Giờ mua:</strong> {{ $order->GioDatHang }}</p>
        <p><strong>Phương thức thanh toán:</strong> {{ $order->formatted_phuong_thuc_thanh_toan }}</p>
        <p><strong>Tổng tiền:</strong> {{ $order->formatted_tongtien }} VNĐ</p>
</div>
    <div class="container">

        <h1>Chi tiết sản phẩm</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá bán</th>
                    <th>Thành tiền</th>
                    <th>Số tiền khách đưa</th>
                    <th>Số tiền thối</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orderDetails as $detail)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $detail->SanPham->tensanpham }}</td>
                        <td>{{ $detail->soLuong }}</td>
                        <td>{{ number_format($detail->SanPham->giaban, 0, '', ',') }} VNĐ</td>
                        <td>{{ number_format($detail->SanPham->giaban * $detail->soLuong, 0, '', ',') }} VNĐ</td>
                        <td>{{ number_format($detail->soTienKhachDua, 0, '', ',') }} VNĐ</td>
                        <td>{{ number_format($detail->soTienTraLaiKhach, 0, '', ',') }} VNĐ</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
