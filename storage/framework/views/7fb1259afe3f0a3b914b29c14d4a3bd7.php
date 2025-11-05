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
                <p class="form-label">Mã đơn hàng:</p>
                <a><?php echo e($order->MaHD); ?></a>
            </div>
            <div>
                <label class="form-label">Mã khách hàng:</label>
                <span><?php echo e($order->MaKhachHang); ?></span>
            </div>
        </div>
        <div>
            <label class="form-label">Tên khách hàng:</label>
            <span><?php echo e($order->TenKhachHang); ?></span>
        </div>
        <div>
            <label class="form-label">Số điện thoại:</label>
            <span><?php echo e($order->soDienThoai); ?></span>
        </div>
        <div>
            <label class="form-label">Ngày sinh:</label>
            <span><?php echo e($order->khachHang ? \Carbon\Carbon::parse($order->khachHang->ngaysinh)->format('d/m/Y') : ''); ?></span>
        </div>
        <div>
            <label class="form-label">Địa chỉ:</label>
            <span><?php echo e($order->diaChi); ?></span>
        </div>
        <div>
            <label class="form-label">Ngày đặt hàng:</label>
            <span><?php echo e(\Carbon\Carbon::parse($order->NgayDatHang)->format('d/m/Y')); ?></span>
        </div>
        <div>
            <label class="form-label">Giờ đặt hàng:</label>
            <span><?php echo e(\Carbon\Carbon::parse($order->GioDatHang)->format('H:i')); ?></span>
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
                    <?php $__currentLoopData = $order->chiTietDonHangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($index + 1); ?></td>
                        <td><?php echo e($detail->sanPham->MaVach); ?></td>
                        <td><?php echo e($detail->sanPham->tensanpham); ?></td>
                        <td><?php echo e($detail->soLuong); ?></td>
                        <td><?php echo e(number_format($detail->sanPham->giaban, 0, ',', '.')); ?></td>
                        <td>
                            <?php
                                $product = App\Models\SanPham::find($detail->MaSP);
                            ?>
                            <?php if($product): ?>
                                <?php echo e(number_format($product->giaban * $detail->soLuong, 0, ',', '.')); ?>

                            <?php endif; ?>    
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <div>
            <label class="form-label">Phương thức thanh toán:</label>
            <span><?php echo e($order->formatted_phuong_thuc_thanh_toan); ?></span>
        </div>
        <div>
            <label class="form-label">Tổng tiền:</label>
            <span><?php echo e(number_format($order->tongtien, 0, ',', '.')); ?></span>
        </div>
        <div>
            <label class="form-label">Số tiền khách đưa:</label>
            <span><?php echo e(number_format($order->chiTietDonHangs->first()->soTienKhachDua ?? 0, 0, ',', '.')); ?></span>
        </div>
        <div>
            <label class="form-label">Số tiền trả lại khách:</label>
            <span><?php echo e(number_format($order->chiTietDonHangs->first()->soTienTraLaiKhach ?? 0, 0, ',', '.')); ?></span>
        </div>
        <div>
            <label class="form-label">Tên nhân viên:</label>
            <?php
                // Truy vấn thông tin nhân viên từ MaNV
                $employee = App\Models\Employee::find($order->MANV);
                // Kiểm tra xem nhân viên có tồn tại không trước khi truy cập thuộc tính
                $hotendaydu = $employee ? $employee->hotendaydu : 'N/A';
            ?>
            <span><?php echo e($hotendaydu); ?></span>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\Users\lpn31\OneDrive - IT\Desktop\Cuoi_ki\store.com - Backup - 23.05 - 13h37\resources\views/order/order_invoice_pdf.blade.php ENDPATH**/ ?>