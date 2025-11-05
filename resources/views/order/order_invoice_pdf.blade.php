{{-- Cập nhật lại bản mới --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice - ANKHANG STORE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
        }
        .table-bordered th, .table-bordered td {
            border: 1px solid #000;
        }
        .text-center {
            text-align: center;
        }
        .form-label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    
    <h1 class="text-center">AN KHANG STORE</h1>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <p>Trụ sở: Tầng 6 - Tòa nhà LandMark81 - Quận 1 - TP.HCM</p>
                <p>Chi nhánh: Tầng 5 - Tòa nhà DEPZAI - Quận 1 - Hà Nội</p>
            </div>
            <div class="col-sm-6">
                <p>Email: 52200214@student.tdtu.edu.vn</p>
                <p>Tổng đài hỗ trợ: 0123456789</p>
                <p>Liên hệ hợp tác: 9876543210</p>
            </div>
        </div>
    </div>
    <div class="container">
        <h2 class="text-center fw-bold mt-2 mb-4">CHI TIẾT ĐƠN HÀNG</h2>
        <div>
            <div>
                <label class="form-label">Mã đơn hàng:</label>
                <span>{{ $order->MaHD }}</span>
            </div>
            <div>
                <label class="form-label">Mã khách hàng:</label>
                <span>{{ $order->MaKhachHang }}</span>
            </div>
        </div>
        <div>
            <label class="form-label">Tên khách hàng:</label>
            <span>{{ $order->TenKhachHang }}</span>
        </div>
        <div>
            <label class="form-label">Số điện thoại:</label>
            <span>{{ $order->soDienThoai }}</span>
        </div>
        <div>
            <label class="form-label">Ngày sinh:</label>
            <span>{{ $order->khachHang ? \Carbon\Carbon::parse($order->khachHang->ngaysinh)->format('d/m/Y') : '' }}</span>
        </div>
        <div>
            <label class="form-label">Địa chỉ:</label>
            <span>{{ $order->diaChi }}</span>
        </div>
        <div>
            <label class="form-label">Ngày đặt hàng:</label>
            <span>{{ \Carbon\Carbon::parse($order->NgayDatHang)->format('d/m/Y') }}</span>
        </div>
        <div>
            <label class="form-label">Giờ đặt hàng:</label>
            <span>{{ \Carbon\Carbon::parse($order->GioDatHang)->format('H:i') }}</span>
        </div>
        <div>
            <label class="form-label">Danh sách sản phẩm:</label>
            <table class="table table-bordered text-center border border-dark">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã vạch</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá bán</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->chiTietDonHangs as $index => $detail)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $detail->sanPham->MaVach }}</td>
                        <td>{{ $detail->sanPham->tensanpham }}</td>
                        <td>{{ $detail->soLuong }}</td>
                        <td>{{ number_format($detail->sanPham->giaban, 0, ',', '.') }}</td>
                        <td>
                            @php
                                $product = App\Models\SanPham::find($detail->MaSP);
                            @endphp
                            @if ($product)
                                {{ number_format($product->giaban * $detail->soLuong, 0, ',', '.') }}
                            @endif    
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div>
            <label class="form-label">Phương thức thanh toán:</label>
            <span>{{ $order->formatted_phuong_thuc_thanh_toan }}</span>
        </div>
        <div>
            <label class="form-label">Tổng tiền:</label>
            <span>{{ number_format($order->tongtien, 0, ',', '.') }}</span>
        </div>
        <div>
            <label class="form-label">Số tiền khách đưa:</label>
            <span>{{ number_format($order->chiTietDonHangs->first()->soTienKhachDua ?? 0, 0, ',', '.') }}</span>
        </div>
        <div>
            <label class="form-label">Số tiền trả lại khách:</label>
            <span>{{ number_format($order->chiTietDonHangs->first()->soTienTraLaiKhach ?? 0, 0, ',', '.') }}</span>
        </div>
        <div>
            <label class="form-label">Tên nhân viên:</label>
            @php
                // Truy vấn thông tin nhân viên từ MaNV
                $employee = App\Models\Employee::find($order->MANV);
                // Kiểm tra xem nhân viên có tồn tại không trước khi truy cập thuộc tính
                $hotendaydu = $employee ? $employee->hotendaydu : 'N/A';
            @endphp
            <span>{{ $hotendaydu }}</span>
        </div>
    </div>
</body>
</html>
