<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận đặt hàng - ANKHANG STORE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .custom-header-bg {
            background-color: #008c28;
        }
        .custom-footer-bg {
            background-color: #008c28;
        }
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
    <header class="custom-header-bg">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container my-3">   
                <div>
                    <a class="navbar-brand fw-bold fs-2 text-light" href="<?php echo e(route('manage_customer')); ?>">ANKHANG STORE</a>
                    <br>
                    <a class="navbar-brand fs-6 text-light">Nhân viên bán hàng</a>
                </div>
            </div>
        </nav>
    </header>

    <!-- Content -->
    <div class="container my-4 col-sm-5">
        <div class="showConfirmOrder">
            <h2 class="text-center fw-bold mb-4 text-success">XÁC NHẬN ĐẶT HÀNG</h2>
            <form action="<?php echo e(route('order.history')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <!-- Display order details from the database -->
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <label for="MaHD" class="form-label">Mã đơn hàng:</label>
                        <input type="text" id="MaHD" name="MaHD" class="form-control" value="<?php echo e($order->MaHD); ?>" readonly>
                    </div>
                    <div class="col-sm-6">
                        <label for="MaKhachHang" class="form-label">Mã khách hàng:</label>
                        <input type="text" id="MaKhachHang" name="MaKhachHang" class="form-control" value="<?php echo e($order->MaKhachHang); ?>" readonly>
                    </div>
                </div>  
                <div class="mb-3">
                    <label for="TenKhachHang" class="form-label">Tên khách hàng:</label>
                    <input type="text" id="TenKhachHang" name="TenKhachHang" class="form-control" value="<?php echo e($order->TenKhachHang); ?>" readonly>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <label for="phoneNumber" class="form-label">Số điện thoại:</label>
                        <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" value="<?php echo e($order->soDienThoai); ?>" readonly>
                    </div>
                    <div class="col-sm-6">
                        <label for="ngaysinh" class="form-label">Ngày sinh:</label>
                        <input type="text" class="form-control" id="ngaysinh" name="ngaysinh" value="" readonly>
                    </div>
                </div>  
                <div class="mb-3">
                    <label for="diaChi" class="form-label">Địa chỉ:</label>
                    <input type="text" id="diaChi" name="diaChi" class="form-control" value="<?php echo e($order->diaChi); ?>" readonly>
                </div>
                <!-- Trong phần hiển thị thông tin đặt hàng của khách hàng -->
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <label for="NgayDatHang" class="form-label">Ngày đặt hàng:</label>
                        <input type="text" id="NgayDatHang" name="NgayDatHang" class="form-control" value="<?php echo e(\Carbon\Carbon::parse($order->NgayDatHang)->format('d/m/Y')); ?>" readonly>
                    </div>
                    <div class="col-sm-6">
                        <label for="GioDatHang" class="form-label">Giờ đặt hàng:</label>
                        <input type="text" id="GioDatHang" name="GioDatHang" class="form-control" value="<?php echo e(\Carbon\Carbon::parse($order->GioDatHang)->format('H:i')); ?>" readonly>
                    </div>
                </div>  
                <div class="mb-3">
                    <label for="danhSachSanPham" class="form-label">Danh sách sản phẩm:</label><br>
                    <div class="row">
                        <div class="col">
                            <table class="table table-bordered text-center border border-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Mã vạch</th>
                                        <th scope="col">Tên sản phẩm</th>
                                        <th scope="col">Số lượng</th>
                                        <th scope="col">Giá bán</th>
                                        <th scope="col">Thành tiền</th>
                                    </tr>
                                </thead>
                                <?php
                                    $orderDetails = App\Models\ChiTietDonHang::where('MaHD', $order->MaHD)->get();
                                ?>
                                <?php $__currentLoopData = $orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tbody>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td>
                                        <?php
                                            $product = App\Models\SanPham::find($detail->MaSP);
                                        ?>
                                        <?php if($product): ?>
                                            <?php echo e($product->MaVach); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php
                                            $product = App\Models\SanPham::find($detail->MaSP);
                                        ?>
                                        <?php if($product): ?>
                                            <?php echo e($product->tensanpham); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php
                                            $product = App\Models\SanPham::find($detail->MaSP);
                                        ?>
                                        <?php if($product): ?>
                                            <?php echo e($detail->soLuong); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php
                                            $product = App\Models\SanPham::find($detail->MaSP);
                                        ?>
                                        <?php if($product): ?>
                                            <?php echo e(number_format($product->giaban, 0, ',', '.')); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php
                                            $product = App\Models\SanPham::find($detail->MaSP);
                                        ?>
                                        <?php if($product): ?>
                                            <?php echo e(number_format($product->giaban * $detail->soLuong, 0, ',', '.')); ?>

                                        <?php endif; ?>
                                    </td>
                                </tbody>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <label for="PhuongThucThanhToan" class="form-label">Phương thức thanh toán:</label>
                        <input type="text" id="PhuongThucThanhToan" name="PhuongThucThanhToan" class="form-control" value="<?php echo e($order->formatted_phuong_thuc_thanh_toan); ?>" readonly>
                    </div>
                    <div class="col-sm-6">
                        <label for="tongtien" class="form-label">Tổng tiền:</label>
                        <input type="text" id="tongtien" name="tongtien" class="form-control" value="<?php echo e(number_format($order->tongtien ?? 0, 0, ',', '.')); ?>" readonly>
                    </div>
                </div>  
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <label for="soTienKhachDua" class="form-label">Số tiền khách đưa:</label>
                        <input type="text" id="soTienKhachDua" name="soTienKhachDua" class="form-control" value="<?php echo e(number_format($detail->soTienKhachDua ?? 0, 0, ',', '.')); ?>" readonly>
                    </div>
                    <div class="col-sm-6">
                        <label for="soTienTraLaiKhach" class="form-label">Số tiền trả lại khách:</label>
                        <input type="text" id="soTienTraLaiKhach" name="soTienTraLaiKhach" class="form-control" value="<?php echo e(number_format($detail->soTienTraLaiKhach ?? 0, 0, ',', '.')); ?>" readonly>
                    </div>
                </div>  
                <div class="mb-3">
                    <label for="TenNhanVien" class="form-label">Tên nhân viên:</label>
                    <?php
                        // Truy vấn thông tin nhân viên từ MaNV
                        $employee = App\Models\Employee::find($order->MANV);
                        // Kiểm tra xem nhân viên có tồn tại không trước khi truy cập thuộc tính
                        $hotendaydu = $employee ? $employee->hotendaydu : 'N/A';
                    ?>
                    <input type="text" id="TenNhanVien" name="TenNhanVien" class="form-control" value="<?php echo e($hotendaydu); ?>" readonly>
                </div>
                
                <!-- Confirmation and cancel buttons -->
                <div class="text-center mt-4">
                    <a href="<?php echo e(route('cancel.order', ['id' => $order->id])); ?>" class="btn btn-danger">Hủy đặt hàng</a>
                    <button type="submit" id="confirmOrderButton" class="btn btn-primary">Xác nhận đặt hàng</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer mt-auto py-3 custom-footer-bg">
        <div class="container d-flex justify-content-center">
            <div class="row mt-3">
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Lấy ngày sinh từ localStorage
        const ngaysinh = localStorage.getItem('ngaysinh');
        if (ngaysinh) {
            const dateOfBirth = new Date(ngaysinh);
            const day = addLeadingZero(dateOfBirth.getDate());
            const month = addLeadingZero(dateOfBirth.getMonth() + 1);
            const year = dateOfBirth.getFullYear();
            const formattedDateOfBirth = `${day}/${month}/${year}`;
            document.getElementById('ngaysinh').value = formattedDateOfBirth;
        }
        function addLeadingZero(number) {
            return number < 10 ? '0' + number : number;
        }
    });
</script>
</html><?php /**PATH C:\Users\lpn31\OneDrive - IT\Desktop\Cuoi_ki\store.com - Backup - 23.05 - 13h37\resources\views/order/confirm_order.blade.php ENDPATH**/ ?>