@extends('layouts.main')

<link href="{{ asset('css/sanpham.css') }}" rel="stylesheet">
<link href="{{ asset('css/header.css') }}" rel="stylesheet">
{{-- <link href="{{ asset('css/product_show.css') }}" rel="stylesheet"> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> --}}
@section('content')



<div class="container">
    <h1>Danh sách sản phẩm</h1>
    @if(auth()->user()->vaitro)
    <h3> <a href="{{ route('account.addSP') }}" class="btn btn-primary float-end" id="themsp">+ Thêm sản phẩm</a></h3>
    @else
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Ảnh đại diện</th>
                <th>Mã Vạch</th>
                <th>Tên Sản Phẩm</th>
                <th>Loại Sản Phẩm</th>
                <th>Thương Hiệu</th>
                @if(auth()->user()->vaitro)
                <th>Giá Nhập</th>
                @else
                @endif
                <th>Giá Bán</th>
                <th>Số Lượng Nhập</th>
                <th>Số Trong Kho</th>
                @if(auth()->user()->vaitro)
                <th>Ngày Nhập Hàng</th>
                @else
                @endif
                <th>Mô Tả Sản Phẩm</th>
                @if(auth()->user()->vaitro)
                <th>Trạng Thái</th>
                <th>Sửa thông tin</th>
                <th>Xóa sản phẩm</th>
                @else
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($sanphams as $sanpham)
            <tr>
                <td>{{ $sanpham->id }}</td>
                <td>
                    @if ($sanpham->anhdaidien)
                        <img src="{{ asset('uploads/employees/' . $sanpham->anhdaidien) }}" width="70px" height="70px" alt="avatar">
                    @else
                        <span>No Avatar</span>
                    @endif
                </td>
                <td>{{ $sanpham->MaVach }}</td>
                <td>{{ $sanpham->tensanpham }}</td>
                <td>{{ $sanpham->loaisanpham }}</td>
                <td>{{ $sanpham->thuonghieu }}</td>
                @if(auth()->user()->vaitro)
                <td>{{ $sanpham->gianhap }}</td>
                @else
                @endif
                <td>{{ $sanpham->giaban }}</td>
                <td>{{ $sanpham->soLuongNhap}}</td>
                <td>{{ $sanpham->soLuongConLai}}</td>
                @if(auth()->user()->vaitro)
                <td>{{ $sanpham->ngaynhaphang }}</td>
                @else
                @endif
                <td>{{ $sanpham->moTaSanPham }}</td>

                @if(auth()->user()->vaitro)
                <td>{{ $sanpham->trangthai ? 'Đã Bán' : 'Chưa Bán' }}</td>
                <td>
                    <a href="{{ route('account.edit',['id' => $sanpham->id] )}}" class="btn btn-primary ">Sửa</a>
                </td>
                <td>
                    <a href="{{ route('account.delete',['id' => $sanpham->id] )}}" class="btn btn-danger">Xóa</a>
                </td>
                @else
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
