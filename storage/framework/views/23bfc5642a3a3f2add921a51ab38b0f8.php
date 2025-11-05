<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận đặt hàng - ANKHANG STORE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        footer {
            background-color: #060606;
            color: #fff;
            text-align: center;
            padding: 50px 0;
            flex-shrink: 0; /* Không co giãn footer khi nội dung quá ít */
        }
        footer h5 {
            margin-bottom: 20px;
        }
        footer p {
            margin-bottom: 10px;
        }
        .showConfirmOrder {
            background-color: #f4f4f4;
            border: 1px solid #ced4da;
            padding: 20px;
            margin: 20px auto;
            width: 600px;
        }
        .showConfirmOrder h2 {
            margin-bottom: 20px;
        }
        .form-label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-success">
            <div class="container my-3">
                <a class="navbar-brand fw-bold fs-2 text-light" href="#">ANKHANG STORE</a>
                <br>
                <a class="navbar-brand fs-6 text-light">Nhân viên bán hàng</a>
            </div>
        </nav>
    </header>

    <!-- Content -->
    <div class="container my-4">
        <div class="showConfirmOrder">
            <h2>Xác nhận đặt hàng</h2>
            <form action="<?php echo e(route('order.history')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <!-- Hiển thị các thông tin đơn hàng từ database -->
                <div class="mb-3">
                    <label for="MaHD" class="form-label">Mã Hóa Đơn:</label>
                    <input type="text" id="MaHD" name="MaHD" class="form-control" value="<?php echo e($order->MaHD); ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="TenKhachHang" class="form-label">Tên Khách Hàng:</label>
                    <input type="text" id="TenKhachHang" name="TenKhachHang" class="form-control" value="<?php echo e($order->TenKhachHang); ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="phoneNumber" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" value="<?php echo e($order->soDienThoai); ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="NgayDatHang" class="form-label">Ngày Đặt Hàng:</label>
                    <input type="text" id="NgayDatHang" name="NgayDatHang" class="form-control" value="<?php echo e($order->NgayDatHang); ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="diaChi" class="form-label">Địa Chỉ:</label>
                    <input type="text" id="diaChi" name="diaChi" class="form-control" value="<?php echo e($order->diaChi); ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="PhuongThucThanhToan" class="form-label">Phương Thức Thanh Toán:</label>
                    <input type="text" id="PhuongThucThanhToan" name="PhuongThucThanhToan" class="form-control" value="<?php echo e($order->PhuongThucThanhToan); ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="tongtien" class="form-label">Tổng Tiền:</label>
                    <input type="text" id="tongtien" name="tongtien" class="form-control" value="<?php echo e($order->tongtien); ?>" readonly>
                </div>
                
                <div class="mb-3">
                    <label for="TenNhanVien" class="form-label">Tên Nhân Viên:</label>
                    <input type="text" id="TenNhanVien" name="TenNhanVien" class="form-control" value="<?php echo e(optional($order->employee)->hotendaydu); ?>" readonly>
                </div>
                
                <!-- Nút xác nhận và hủy đặt hàng -->
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Xác nhận đặt hàng</button>
                    </div>
                    <div class="col">
                        <a href="<?php echo e(route('cancel.order', ['id' => $order->id])); ?>" class="btn btn-danger">Hủy đặt hàng</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer mt-auto py-3 bg-success">
        <div class="container d-flex justify-content-center">
            <div class="row">
                <div class="col-md-4">
                    <h5>ANKHANG STORE</h5>
                    <p>Trụ sở: Tầng 6 - Tòa nhà LandMark81 - Quận 1 - TP.HCM</p>
                    <p>Chi nhánh: Tầng 5 - Tòa nhà DEPZAI - Quận 1 - Hà Nội</p>
                </div>
                <div class="col-md-4">
                    <h5>Tổng đài hỗ trợ</h5>
                    <p>Tư vấn dịch vụ: 0123456789</p>
                    <p>Hỗ trợ sử dụng: 9876543210</p>
                    <p>Email: 52200214@student.tdtu.edu.vn</p>
                    <p>Từ 7h00 - 22h00 các ngày từ thứ 2 đến chủ nhật</p>
                </div>
                <div class="col-md-4">
                    <h5>Liên hệ hợp tác</h5>
                    <p>Email: 52200214@student.tdtu.edu.vn</p>
                </div>
            </div>
        </div>
    </footer>

</body>
</html><?php /**PATH C:\Users\lpn31\OneDrive - IT\Desktop\store.com\resources\views/order/confirm_order.blade.php ENDPATH**/ ?>